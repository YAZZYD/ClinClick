<?php

namespace App\Http\Controllers;

use App\Models\Cabinet;
use App\Models\Categorie;
use App\Models\Equipement;
use App\Models\Gerant;
use App\Models\Fournisseur;
use App\Models\Marque;
use App\Models\NotificationGerant;
use App\Models\NotificationMaint;
use App\Models\Panne;
use App\Models\Produit;
use App\Models\Type;
use App\Notifications\Commande;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Ramsey\Uuid\Type\Integer;

class GerantController extends Controller
{
    
   public function afficherCabinet(Request $request){
    $gerant = auth('gerant')->user();
    $cabinet = Cabinet::where('gerant_id',$gerant->id)->first();
    return view('gerant.mon_cabinet')->with('cabinet',$cabinet);
 }

    public function afficherModificationForm(Request $request,Cabinet $cabinet){
        return view('gerant.modifier_cabinet',['cabinet'=>$cabinet]);
    }

    public function modifierCabinet(Request $request,Cabinet $cabinet){
       DB::table('cabinets')->where('id',$cabinet->id)
       ->update([
        'name'=>$request->name,
        'adress'=>$request->adress]);
        return redirect()->intended('/gerant/moncabinet');
    }

    public function ajouterEquipement(Request $request,Cabinet $cabinet){
      $type=Type::where('name',$request->typeEquip)->first();
      $marque=Marque::where('name',$request->marqueEquip)->first();
      
      if($marque && $type){
      $equipement = Equipement::where('name', $request->nomEquip)
      ->where('type_id',$type->id)
      ->where('marque_id',$marque->id)
      ->first();

      if($equipement){
         //associer equipement au cabinet
         $cabinet->equipements()->attach($equipement->id);
      }else{
         //ajouter l'equipement au base de données
         $equipement=new Equipement();
         $equipement->name=$request->nomEquip;
         $equipement->type_id=$type->id;
         $equipement->marque_id=$marque->id;
         $equipement->save();
         //assoscier l'equipement
         $equipement->cabinet()->attach($cabinet);
      }
         
      }else{
         dd('type ou marque introuvable');
      }
      return redirect()->intended('/gerant/moncabinet/');
    }

    public function getAllFournisseurs(Request $request){
        // $produits= DB::table('produits')->where("type","!=","piece")->get();
         $produits= Produit::where("type","!=","piece")->get();
         $cabinet=$request->cabinet;
        if($cabinet == null){
         $gerant= auth('gerant')->user();
         $cabinet=Cabinet::where('gerant_id',$gerant->id)->first();
         $cabinet= $cabinet->id;
        }
        
         return view('gerant.market',['produits'=>$produits,
                                       'cabinet'=>$cabinet]);
    }


    public function ajouterAchat(Request $request){

      $gerant= auth('gerant')->user();
      //$cabinet=DB::table('cabinets')->where('gerant_id',$gerant->id)->first();
      $produit= DB::table('produit_fournisseur')->where('produit_id',$request->produit)
                  ->where('fournisseur_id',$request->fournisseur)->first();
      
      if($gerant && $produit){

         $achat=DB::table('paniers')->where('produit_id',$request->produit)
                     ->where('fournisseur_id',$request->fournisseur)
                     ->where('cabinet_id',$request->cabinet)
                     ->first();
                     
         if($achat){
            if($achat->qte < $produit->qte){
            DB::table('paniers')->where('id',$achat->id)
            ->increment('qte',$request->qte);
            }
         }else{
             if($request->qte<=$produit->qte){
            DB::table('paniers')->insert(
               ['produit_id'=>$produit->produit_id,
               'fournisseur_id'=>$produit->fournisseur_id,
               'cabinet_id'=>$request->cabinet,
               'qte'=>$request->qte,
               ]
              );
            }
         }
      }else{
        return new Exception("cannot perform operation ! ");
      }
      return redirect()->back();
      
    }


    public function supprimerAchat(Request $request,String $id){
      
      DB::delete('DELETE FROM paniers WHERE id = ?', [$id]);
        
         return redirect()->intended('/gerant/market/panier');
    }

    public function viderPanier(Request $request){
      Gate::allows(['delete'],'paniers');
      $deleted=DB::table('paniers')->where('cabinet_id',$request->input("cabinet"))
      ->delete();
      
      return redirect()->back();
    }

    public function commander(Request $request){
      $achats=DB::table('paniers')->where("cabinet_id",$request->input('cabinet'))
      ->get()->toArray();
      $cabinet=Cabinet::find($request->input('cabinet'));
      
      foreach($achats as $achat){
         $fournisseur=Fournisseur::find($achat->fournisseur_id);
         $produit=Produit::find($achat->produit_id);
         DB::transaction(function()use($achat,$produit,$fournisseur){
            $qte=DB::table('produit_fournisseur')
            ->where('produit_id',$produit->id)
            ->where('fournisseur_id',$fournisseur->id)
            ->value('qte');

            if($achat->qte <= $qte){

            DB::table('produit_fournisseur')
            ->where('produit_id',$produit->id)
            ->where('fournisseur_id',$fournisseur->id)
            ->decrement('qte',$achat->qte);

            DB::table('commandes')->insert([
               'produit_id'=> $achat->produit_id,
               'fournisseur_id'=>$achat->fournisseur_id,
               'cabinet_id'=>$achat->cabinet_id,
               'qte'=>$achat->qte,
               'totale'=>($produit->prix * $achat->qte),
            ]);
            DB::table('paniers')->where('id',$achat->id)->delete();
         }else{
            dd("quantité insatisfaisante !"); 
         }
         });
            $notified=array();
            if(!in_array($fournisseur->id,$notified)){
               try{
               $fournisseur->notify(new Commande($fournisseur,$cabinet));
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


    public function afficherPanier(Request $request){
    
      $cabinet=$request->cabinet;
      if($cabinet == null){
       $gerant= auth('gerant')->user();
       $cabinet=Cabinet::where('gerant_id',$gerant->id)->first();
     
      }else{
      
         $cabinet= Cabinet::find($cabinet);
      
      }

      $achats= DB::table('paniers')->where('cabinet_id',$cabinet->id)
      ->get()->toArray();
      
      return view('gerant.mon_panier',[
         'achats'=> $achats,
         'cabinet'=>$cabinet,
      ]);
    }

    public function rechercher(Request $request){

      // $produits= DB::table('produits')->where("type","!=","piece")->get();
       $produits= Produit::where("type","!=","piece")
      ->where('name',$request->search)
       ->get();
       
       $cabinet=$request->cabinet;
      if($cabinet == null){
       $gerant= auth('gerant')->user();
       $cabinet=Cabinet::where('gerant_id',$gerant->id)->first();
       $cabinet= $cabinet->id;
      }
      
       return view('gerant.market',['produits'=>$produits,
                                     'cabinet'=>$cabinet]);
  }
    public function affNotifications(Request $request){
      $notifications = NotificationGerant::all();
      return view('gerant.notificationG',['notifications'=>$notifications]);
    }
 public function signalerPanne(Request $request){

     $message=['equipement_id' => 'panne a été signalé déjà',];
   
    $this->validate($request,['equipement_id'=>'unique:pannes'],$message);
    
       DB::transaction(function()use($request){
         
         Panne::create([
            'cabinet_id'=>$request->cabinet,
            'equipement_id'=>$request->equipement_id,
            'desc'=>$request->desc,
         ]);
            DB::table('equipement_cabinet')->where('cabinet_id',$request->cabinet)
            ->where('equipement_id',$request->equipement_id)
            ->update(['etat'=>'en panne']);
      });
         return redirect()->back();   
 }

 public function rechercheCat(Request $request,string $cat){
   $cat=Categorie::find($cat)->first();
   // $produits= DB::table('produits')->where("type","!=","piece")->get();
    $produits= Produit::where("type","!=","piece")
   ->where('categorie_id',$cat->id)
    ->get();
    
    $cabinet=$request->cabinet;
   if($cabinet == null){
    $gerant= auth('gerant')->user();
    $cabinet=Cabinet::where('gerant_id',$gerant->id)->first();
    $cabinet= $cabinet->id;
   }
   
    return view('gerant.market',['produits'=>$produits,
                                  'cabinet'=>$cabinet]);
}

public function getAllCommandes(Request $request){
   return view('gerant.mesCommandes');
}

public function getOffre(Request $request,string $offre){
 $offre=DB::table('offres')->where('id',$offre)
 ->first();
 
 return view('gerant.offre',['offre'=>$offre]);
}

public function validerOffre(Request $request,string $offre){
   
   $gerant=auth('gerant')->user();
   $cabinet= Cabinet::where('gerant_id',$gerant->id)->first();
   $equipement= Equipement::where('id',$request->equip)->first();
   // Gate::allows('update','equipement_cabinet');
   // DB::table('equipement_cabinet')->where('equipement_id',$request->equip)
   // ->where('cabinet_id',$cabinet->id)->update(['etat'=>'en marche']);
  DB::transaction(function()use($request,$offre,$cabinet,$equipement){
   
   $cabinet->equipements()->updateExistingPivot($equipement->id, array(
      'etat' => 'en marche',  
  ), false);
  DB::table('pannes')->where('id',$request->panne)->delete();
   NotificationMaint::where('panne_id',$request->panne)->delete();
   NotificationGerant::where('offre_id',$offre)->delete();
  }
);
   return redirect()->intended('/gerant/moncabinet');
}


}
