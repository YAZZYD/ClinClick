<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use App\Models\Maintenancier;
use App\Models\NotificationGerant;
use App\Models\NotificationMaint;
use App\Models\Panne;
use App\Models\Produit;
use App\Notifications\CommandeMaint;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use PhpParser\Node\Expr\Cast\String_;

class MaintenancierController extends Controller
{ 
    public function getAllFournisseurs(Request $request){
        // $produits= DB::table('produits')->where("type","!=","piece")->get();
        $maint= auth('maintenancier')->user(); 
        $produits= Produit::where("type","=","piece")->get();
                 return view('maintenancier.market',['produits'=>$produits,
                                      'maint'=>$maint]);
    }

    public function affNotifications(Request $request){
      $notifications = NotificationMaint::all();
      return view('maintenancier.notificationM',['notifications'=>$notifications]);
    }

    public function rechercher(Request $request){
      // $produits= DB::table('produits')->where("type","!=","piece")->get();
      $maint= auth('maintenancier')->user(); 
      $produits= Produit::where("type","=","piece")
      ->where('name',$request->search)
      ->get();
               return view('maintenancier.market',['produits'=>$produits,
                                    'maint'=>$maint]);
  }


    public function afficherPanier(Request $request){
      $id_maint=$request->input("maint");
         if($id_maint==null){
            $maint= auth('maintenancier')->user();
            $id_maint=$maint->id;
         }
      $maint= Maintenancier::find($id_maint);;
         
      $achats= DB::table('panier_maint')->where('maintenancier_id',$maint->id)
      ->get()->toArray();
      if($maint || $achats){
         
         return view('maintenancier.mon_panier',[
            'achats'=> $achats,
            'maint'=>$maint,
         ]);
      }
      
      return back()->withErrors([
         "maint" => "Erreur! veuillez réssayez",
      ]);
    }


    public function ajouterAchat(Request $request){
     
        
        $produit= DB::table('produit_fournisseur')->where('produit_id',$request->produit)
                    ->where('fournisseur_id',$request->fournisseur)->first();
        
        if($produit){
  
           $achat=DB::table('panier_maint')->where('produit_id',$request->produit)
                       ->where('fournisseur_id',$request->fournisseur)
                       ->where('maintenancier_id',$request->maint)
                       ->first();
                       
           if($achat){
              if($achat->qte <= $produit->qte){
              DB::table('panier_maint')->where('id',$achat->id)
              ->increment('qte',1);
              }
           }else{
               if($request->qte <= $produit->qte){
              DB::table('panier_maint')->insert(
                 ['produit_id'=>$produit->produit_id,
                 'fournisseur_id'=>$produit->fournisseur_id,
                 'maintenancier_id'=>$request->maint,
                 'qte'=>1,
                 ]
                );
              }
           }
        }else{
          return new Exception("cannot perform operation ! ");
        }
        return redirect()->back();
        
      }
  

      //suppression de ligne d'achat

      public function supprimerAchat(Request $request,String $id){
      
         DB::delete('DELETE FROM panier_maint WHERE id = ?', [$id]);
           
            return redirect()->intended('/maintenancier/market/panier');
       }
  
       public function viderPanier(Request $request){
         Gate::allows(['delete'],'paniers');
         $id_maint=$request->input("maint");
         if($id_maint==null){
            $maint= auth('maintenancier')->user();
            $id_maint=$maint->id;
         }
         
         $deleted=DB::table('panier_maint')->where('maintenancier_id',$id_maint)
         ->delete();
         
         return redirect()->back();
       }
   
       public function commander(Request $request){
         $id_maint=$request->input("maint");
         if($id_maint==null){
            $maint= auth('maintenancier')->user();
            $id_maint=$maint->id;
         }
         $achats=DB::table('panier_maint')->where("maintenancier_id",$id_maint)
         ->get()->toArray();
         $maint=Maintenancier::find($request->input('maint'));
         
         foreach($achats as $achat){
            $fournisseur=Fournisseur::find($achat->fournisseur_id);
            $produit=Produit::find($achat->produit_id);
            DB::transaction(function()use($achat,$produit,$fournisseur){
               DB::table('produit_fournisseur')
               ->where('produit_id',$produit->id)
               ->where('fournisseur_id',$fournisseur->id)
               ->decrement('qte',$achat->qte);
               DB::table('commande_maint')->insert([
                  'produit_id'=> $achat->produit_id,
                  'fournisseur_id'=>$achat->fournisseur_id,
                  'maintenancier_id'=>$achat->maintenancier_id,
                  'qte'=>$achat->qte,
                  'totale'=>($produit->prix * $achat->qte),
               ]);
               DB::table('panier_maint')->where('id',$achat->id)->delete();
            });
               $notified=array();
               if(!in_array($fournisseur->id,$notified)){
                  try{
                  $fournisseur->notify(new CommandeMaint($fournisseur,$maint));
                  }catch(Exception){
                     back()->withErrors([
                        'connection' => 'email non envoyé! (connexion au serveur MTP a été échouer',
                     ]
                     );
                  }
                  array_push($notified,$fournisseur->id);
               }
         }
         return redirect()->back();
       }

         public function getPanne(Request $request,string $id){
               $panne= Panne::where('id',$id)->first();
               return view('maintenancier.panne',['panne'=>$panne]);
         }
       public function supprimerNotif(Request $request,string $notif){
       
         NotificationMaint::destroy($notif);
         return redirect()->back();
       }
       public function envoyerOffre(Request $request){
         $maint= auth('maintenancier')->user();
         $panne= Panne::find($request->panne);
        
         $message=[
            'date'=>'date incorrecte !',
         ];
         $this->validate($request,[ 
            'date' => 'required|date|after_or_equal:'.Carbon::now()->format('Y-m-d'),
         ],$message);

         $panne->maints()->attach($maint->id,array(
            'prix'=>$request->prix,
            'date'=>$request->date,
            'updated_at'=>Carbon::now(),
         ));
            return redirect()->back();
       }
       public function getAllPanne(Request $request){
         $pannes= Panne::all();
         return view('maintenancier.liste_panne',['pannes'=>$pannes]);
       }

}
