<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cabinet;
use App\Models\Fournisseur;
use App\Models\Gerant;
use App\Models\Maintenancier;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware(('guest:gerant'));
        $this->middleware('guest:fournisseur');
        $this->middleware('guest:maintenancier');
    }


    protected function createMaint(Request $request){
        
        $message = [
            'email.unique' => 'adresse email existante',
            'tel.unique' => 'numéro déja utilisé ou incorrecte',
        ];
        $this->validate($request, Maintenancier::rules(),$message);
        $fileToStore=null;
        $maint=null;

        if ($request->hasFile('file')) {
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileToStore = $filename . '_' . time() . '.' . $extension;
            $request->file('file')->storeAs('public\attachements', $fileToStore);
        }
           
        
        
          $maint=Maintenancier::create([
            'name'=>$request['first_name'] .' '. $request['last_name'],
            'email'=>$request['email'],
            'adress' => $request['adress'],
            'tel' => $request['tel'],
            'password' => Hash::make($request['password']),
            'attachement'=>$fileToStore,
        ]);
        if($maint!=null){
            
        foreach($request->competences as $competence){
           
            $maint->competences()->attach($competence);
        }
        $maint->save();
        }else{
            dd('error while creating maintenancier');
        }
        return redirect()->intended('/login');
        
    }


    protected function createGerant(Request $request){
        $message = [
            'email.unique' => 'adresse email existante',
            'email.email' => 'not valid',
            'tel.unique' => 'numéro déja utilisé ou incorrecte',
        ];
        $fileToStore=null;
        $gerant=null;
        $this->validate($request, Gerant::rules(),$message);
        if ($request->hasFile('file')) {
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileToStore = $filename . '_' . time() . '.' . $extension;
            $request->file('file')->storeAs('public\attachements', $fileToStore);
        }
            
         
            $gerant=Gerant::create([
            'name'=>$request['first_name'] .' '. $request['last_name'],
            'email'=>$request['email'],
            'tel'=>$request['tel'],
            'attachement' => $fileToStore,
            'password' => Hash::make($request['password']),
            

        ]);

        if($gerant!=null){
            $cabinet= new Cabinet();
            $cabinet->name=$request->cabinet_name;
            $cabinet->adress=$request->adress;
            $cabinet->gerant()->associate($gerant);
            $cabinet->save();
        }else{
        
            dd('error ! gérant non crée !');
    }

        return redirect()->intended('/login');
    }

    protected function createFournisseur(Request $request){
        $message = [
            'email.unique' => 'adresse email existante',
            'email.email' => 'not valid',
            'tel.unique' => 'numéro déja utilisé ou incorrecte',
        ];
        $fileToStore=null;
        
        $this->validate($request, Fournisseur::rules(),$message);
        if ($request->hasFile('file')) {
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileToStore = $filename . '_' . time() . '.' . $extension;
            $request->file('file')->storeAs('public\attachements', $fileToStore);
        }
            
         
        Fournisseur::create([
            'name'=>$request['first_name'] .' '. $request['last_name'],
            'email'=>$request['email'],
            'tel'=>$request['tel'],
            'attachement' => $fileToStore,
            'adress'=>$request->adress,
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('/login');
    }
}
