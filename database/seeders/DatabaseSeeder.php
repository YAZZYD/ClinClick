<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cabinet;
use App\Models\Categorie;
use App\Models\Equipement;
use App\Models\Gerant;
use App\Models\Marque;
use App\Models\Produit;
use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use function GuzzleHttp\Promise\each;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

    
        $cats=array(
            'équipements d’urgence',
            'équipements de laboratoire',
            'équipements à vocation thérapeutique',
            'équipements de diagnostic médical',
            'fournitures médicales consommables',
        );
        for($i = 1; $i<=5; $i++){

            DB::table('gerants')->insert([
                'name' => 'gerant'.$i,
                'email' => 'gerant'.$i.'@gmail.com',
                'password' => Hash::make('laravel00'),
                'tel'=>'065435345'.$i,
                
            ]);

            DB::table('fournisseurs')->insert([
                'name' => 'fournisseur'.$i,
                'email' => 'fournisseur'.$i.'@gmail.com',
                'password' => Hash::make('laravel00'),
                'adress' => 'adress '.$i,
                'tel' => '054353436'. $i,
            ]);

            DB::table('maintenanciers')->insert([
                'name' => 'maintenancier'.$i,
                'email' => 'maintenancier'.$i.'@gmail.com',
                'password' => Hash::make('laravel00'),
                'adress' => 'adress '.$i,
                'tel' => '054353436'. $i,
            ]);
            // DB::table('cabinets')->insert([
            //     'name'=> 'cabinet'.$i,
            //     'adress' => 'random adress',
            //     'gerant_id' => $i,
            // ]);

            DB::table('categories')->insert([
                'name'=> $cats[$i-1],
            ]);
        }
        
        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('laravel00'),
        ]);
        $types=array(
            "scanner",
            "respirateur artificiel",
            "appareil dentaire",
            "IRM",
        );
        foreach($types as $type){
        DB::table('types')->insert([
            'name'=>$type,
        ]);
    }

     $marques=array(
        "Philips Healthcare",
        "General Electric (GE) Healthcare",
        "Siemens Healthineers",
        "Medtronic",
        "Abbott Laboratories",
        "Johnson & Johnson",
        "Roche Diagnostics",
        "Stryker Corporation",
        "Baxter International",
        "Olympus Corporation",
        "Carl Zeiss Meditec",
        "Boston Scientific Corporation",
        "Mindray",
        "FUJIFILM Medical Systems",
        "Hitachi Medical Systems"
     );
     foreach($marques as $marque){
        DB::table('marques')->insert([
            'name'=>$marque,
        ]);
     }
    $types = Type::all();
    $marques=Marque::all();
    foreach($types as $type){
        $i=1;
        $j=0;
        while($i<=6){
            $equippement= new Equipement();
            $equippement->name= 'equipement'.$i+$j;
            $equippement->type()->associate($type);
            $equippement->marque()->associate($marques[$i]);
            $equippement->save();
          //  $type->equipements()->save($equippement);
            $i++;
        }
        $j++;
    }

    $categories = Categorie::all();
    foreach($categories as $categorie){
        $i=1;
        while($i<=6){
            $produit= new Produit();
            $produit->name= 'produit '.$i;
            if($i<=2){
                $produit->type='piece';
            }elseif($i>2 && $i<=4){
            $produit->type='consommable';
            }elseif($i>4 && $i<=6){
                $produit->type='non consommable';
            }
           
            $categorie->produits()->save($produit);
            $i++;
        }
        $i++;
    }

    $gerants= Gerant::all();
    $k=1;
    foreach($gerants as $gerant){
        $cabinet = new Cabinet();
        $cabinet->name= 'cabinet'.$k;
        $cabinet->adress='random adress '.$k;
        $gerant->cabinet()->save($cabinet);
        $k++;
    }
    }
}
