<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use App\Models\Gerant;
use App\Models\Maintenancier;
use App\Notifications\AccountApproved;
use App\Notifications\AccountDisabled;
use Carbon\Carbon;
use Exception;
use Generator;
use Illuminate\Database\Console\Migrations\StatusCommand;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{

//afficher les demandes d'inscriptions
    public function afficherRequests(){
        
            $gerants= DB::table('gerants')->where('status',false)->get()->toArray();
            $fournisseurs=DB::table('fournisseurs')->where('status',false)->get()->toArray();
            $maintenanciers= DB::table('maintenanciers')->where('status',false)->get()->toArray();
    
        return view('admin.requests',[
            'gerants'=>$gerants,
            'fournisseurs'=>$fournisseurs,
            'maintenanciers'=>$maintenanciers,   
        ]);
    }

    //confirmer les requests des gerants
   public function confirmeGerant(Request $request,Gerant $gerant){
       Gate::allows(['update-status','update-updated_at'],$gerant);
       DB::table('gerants')->where('id',$gerant->id)
       ->update(['status'=>true,'updated_at'=>Carbon::now()]);
       try{
        $gerant->notify(new AccountApproved());
        }catch(Exception){
            back()->withErrors([
                'connection' => 'email non envoyé! (connexion au serveur MTP a été échouer',
             ]
             );            }
        return redirect()->back();
   }
   
   //confirmer les requests des gerants

   public function confirmeFournisseur(Fournisseur $fournisseur){
    Gate::allows(['update-status','update-updated_at'],$fournisseur);
    DB::table('fournisseurs')->where('id',$fournisseur->id)
    ->update(['status'=>true,'updated_at'=>Carbon::now()]);
    try{
        $fournisseur->notify(new AccountApproved());
        }catch(Exception){
            back()->withErrors([
                'connection' => 'email non envoyé! (connexion au serveur MTP a été échouer',
             ]
             );            }
    return redirect()->back();
   }

   //confirmer les requests des maintenanciers

   public function confirmeMaintenancier(Maintenancier $maintenancier){
    Gate::allows(['update-status','update-updated_at'], $maintenancier);
    
    DB::table('maintenanciers')->where('id',$maintenancier->id)
    ->update(['status'=>true,'updated_at'=>Carbon::now()]);
    try{
        $maintenancier->notify(new AccountApproved());
        }catch(Exception){
            back()->withErrors([
                'connection' => 'email non envoyé! (connexion au serveur MTP a été échouer',
             ]
             );            }
    return redirect()->back();
   }

   //afficher les utilisateurs de système

   public function afficherCustomers(){
         $gerants= DB::table('gerants')->where('status',true)->get()->toArray();
        $fournisseurs=DB::table('fournisseurs')->where('status',true)->get()->toArray();
        $maintenanciers= DB::table('maintenanciers')->where('status',true)->get()->toArray();
        return view('admin.customers',[
            'gerants'=>$gerants,
            'fournisseurs'=>$fournisseurs,
            'maintenanciers'=>$maintenanciers,   
        ]);
   }

   //suspendre compte Gerant

   public function suspendGerant(Gerant $gerant,Request $request){
        Gate::allows(['update-status','update-updated_at'],$gerant);
        $updated= DB::table('gerants')->where('id',$gerant->id)
        ->update(['status'=>false]);
        if($updated){
            try{
                $gerant->notify(new AccountDisabled());
                }catch(Exception){
                    back()->withErrors([
                        'connection' => 'email non envoyé! (connexion au serveur MTP a été échouer',
                     ]
                     );            }
            
        }
        return redirect()->back();
   }

   //suspendre compte Fournisseur

   public function suspendFournisseur(Fournisseur $fournisseur){
    Gate::allows(['update-status','update-updated_at'],$fournisseur);
    $updated= DB::table('fournisseurs')->where('id',$fournisseur->id)
    ->update(['status'=>false]);
    if($updated){
        try{
            $fournisseur->notify(new AccountDisabled());
            }catch(Exception){
                back()->withErrors([
                    'connection' => 'email non envoyé! (connexion au serveur MTP a été échouer',
                 ]
                 );            }
        
    }
    return redirect()->back();
   }

   //suspendre compte maintenancier

   public function suspendMaintenancier(Maintenancier $maintenancier){
    Gate::allows(['update-status','update-updated_at'],$maintenancier);
        $updated= DB::table('maintenanciers')->where('id',$maintenancier->id)
        ->update(['status'=>false]);
        if($updated){
            try{
            $maintenancier->notify(new AccountDisabled());
            }catch(Exception){
                back()->withErrors([
                    'connection' => 'email non envoyé! (connexion au serveur MTP a été échouer',
                 ]
                 );            }
        }
        return redirect()->back();
   }
}