<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Fournisseur;
use App\Models\NotificationFournisseur;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class FournisseurController extends Controller
{


    //Afficher Liste des Produits

    public function afficherProduit(Request $request)
    {
        $fournisseur = auth('fournisseur')->user();

        return view('fournisseur.produits', ['fournisseur' => $fournisseur]);
    }

    public function affNotifications(Request $request){
        $notifications = NotificationFournisseur::all();
        return view('fournisseur.notificationF',['notifications'=>$notifications]);
      }



    //Ajouter Produit
    public function ajoutProduit(Request $request)
    {

        $fournisseur = auth('fournisseur')->user();

        // $validatedData = $request->validate([
        //     'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        //  ]);
        $produit = Produit::where('name', $request->name)
            ->where('type', $request->type)
            ->first();

        $categorie =  Categorie::where('name', $request->categorie)
            ->first();

        if ($categorie == null){

            DB::table('categories')->insert(['name' => $request->categorie]);
            $categorie =  Categorie::where('name', $request->categorie)
            ->first();
        }
         if ($produit == null) {
          
            $produit = new Produit();
            $produit->name = $request->name;
            $produit->type = $request->type;
            $produit->categorie()->associate($categorie);
            $produit->save();
        }
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileToStore = $filename . '_' . time() . '.' . $extension;

            $request->file('image')->storeAs('public\produit_uploads', $fileToStore);
            $produit->fournisseurs()->attach($fournisseur->id, array(
                'image' => $fileToStore,
                'prix' => $request->prix,
                'qte' => $request->qte,
            ));
        }
        return redirect()->back()->with('message', 'Operation Successful !');
    }

    //Modifer produit
    public function modifierProduit(Request $request, Produit $produit)
    {
        $fournisseur = auth('fournisseur')->user();
        //DB::table('produit_fournisseur)->where('produit_id',$produit->id)
        // ->where('fournisseur_id',$fournisseur->id)
        // ->update([
        //     'prix'=>$request->prix,
        //     'qte' =>$request->qte,
        // ]);

        $produit->fournisseurs()->updateExistingPivot($fournisseur->id, array(
            'prix' => $request->prix,
            'qte' => $request->qte,
        ), false);

        return redirect()->back()->with('message', 'Operation Successful !');
    }

    //afficher forum de modification
    public function afficherModificationForum(Request $request, Produit $produit)
    {

        $fournisseur = auth('fournisseur')->user();
        return view('fournisseur.modifier', [
            'produit' => $produit,
            'fournisseur' => $fournisseur
        ]);
    }

    //Supprimer produit

    public function supprimerProduit(Request $request, Produit $produit)
    {
        $fournisseur = auth('fournisseur')->user();

        $produit->fournisseurs()->detach($fournisseur);
        //File::delete(public_path('storage/produit_uploads/'.$produit->image));
        //Storage::delete('storage/produit_uploads/'.$produit->image);
        return redirect()->back()->with('message', 'Operation Successful !');
    }


    //afficher les commandes
    public function afficherCommandes(Request $request){
        $fournisseur = auth('fournisseur')->user();
        $commandes= DB::table('commandes')->where('fournisseur_id',$fournisseur->id)
        ->where('status',false)
        ->orderBy('cabinet_id')
        ->get()->toArray();
        
        $commandesMaint = DB::table('commande_maint')->where('fournisseur_id',$fournisseur->id)
        ->where('status',false)
        ->orderBy('maintenancier_id')
        ->get()->toArray();
        return view('fournisseur.commandes',['commandes'=>$commandes,
                                             'commandesMaint'=>$commandesMaint,
                                             'fournisseur'=>$fournisseur]);
    }

    //valider les commandes de gerant

    public function validerCommande(Request $request){
        Gate::allows(['update-status'],'commandes');
        $fournisseur=auth('fournisseur')->user();
        DB::table('commandes')->where('cabinet_id',$request->cabinet)
                ->where('fournisseur_id',$fournisseur->id)
                ->update(['status'=>true]);
                return redirect()->back();
    }
    
    //supprimer une commande de gerant

    public function supprimerCommande(Request $request){
       
        $fournisseur=auth('fournisseur')->user();
        DB::table('commandes')->where('cabinet_id',$request->cabinet)
        ->where('fournisseur_id',$fournisseur->id)
        ->delete();
        return redirect()->back();
    }
    //valider commande maintenancier
    public function validerCommandeMaint(Request $request){
        Gate::allows(['update-status'],'commande_maint');
        $fournisseur=auth('fournisseur')->user();
        DB::table('commande_maint')->where('maintenancier_id',$request->maint)
                ->where('fournisseur_id',$fournisseur->id)
                ->update(['status'=>true]);
                return redirect()->back();
    }

    //supprimer commande maintenancier
    public function supprimerCommandeMaint(Request $request){
       
        $fournisseur=auth('fournisseur')->user();
        DB::table('commande_maint')->where('maintenancier_id',$request->maint)
        ->where('fournisseur_id',$fournisseur->id)
        ->delete();
        return redirect()->back();
    }
}
