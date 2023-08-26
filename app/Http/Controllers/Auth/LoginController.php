<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Maintenancier;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:gerant')->except('logout');
        $this->middleware('guest:fournisseur')->except('logout');
        $this->middleware('guest:maintenancier')->except('logout');
    }

    public function login(Request $request){
        
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);
        
        $credentials= $request->only(['email','password']);

        if (Auth::guard('admin')->attempt($credentials)) {
        
            return redirect()->intended('/admin/dashboard');
        }
        
        else if(Auth::guard('gerant')->attempt($credentials)){
            if(DB::table('gerants')->where('email',$credentials['email'])->value('status')==true){
                Gate::allows('update-last_active','gerants');
                DB::table('gerants')->where('email',$credentials['email'])
                ->update(['last_active'=>Carbon::now()]);
                return redirect()->intended('/gerant/dashboard');
            }else{
                $request->session()->invalidate();
                return back()->withInput($request->only('email'))->withErrors([
                    'email' => 'votre compte n\'est pas activé',
                ]);
            }
        }
        else if(Auth::guard('fournisseur')->attempt($credentials)){
           
            if(DB::table('fournisseurs')->where('email',$credentials['email'])->value('status')==true){
                Gate::allows('update-last_active','fournisseurs');
                DB::table('fournisseurs')->where('email',$credentials['email'])
                ->update(['last_active'=>Carbon::now()]);
            return redirect()->intended('/fournisseur/dashboard');
            }else{
                $request->session()->invalidate();
                return back()->withInput($request->only('email'))->withErrors([
                    'email' => 'votre compte n\'est pas activé',
                ]);
                
            }
        }
        else if(Auth::guard('maintenancier')->attempt($credentials)){

            if(DB::table('maintenanciers')->where('email',$credentials['email'])->value('status')==true){
                Gate::allows('update-last_active','maintenaciers');
                DB::table('maintenanciers')->where('email',$credentials['email'])
                ->update(['last_active'=>Carbon::now()]);
            return redirect()->intended('/maintenancier/dashboard');
            }else{
                $request->session()->invalidate();
                return back()->withInput($request->only('email'))->withErrors([
                    'email' => 'votre compte n\'est pas activé',
                ]);
                
            }

        }else {
            $request->session()->invalidate();
            // Authentication failed, either email doesn't exist or password is incorrect
            return back()->withErrors([
                'email' => 'Invalide adresse password ou mot de passe',
                'password' => 'Invalide adresse password ou mot de passe',
            ]);
        }
       
        return back()->withInput($request->only('email'));
    }


    public function logout(Request $request){
     
   Auth::guard('fournisseur')->logout();
   Auth::guard('maintenancier')->logout();
   Auth::guard('gerant')->logout();
    Auth::guard('admin')->logout();
    $request->session()->invalidate();
    
        return redirect()->intended('/login');
    }
}
