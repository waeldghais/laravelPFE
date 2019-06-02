<?php

namespace App\Http\Controllers\Auth;
use \App\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Etudiant;
use App\Category;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
  
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:etudiant')->except('logout');
    }
 public function logins()
    {
        $etudiant=Etudiant::all();
        return view('Etudiant.LoginEtudiant')->with('Etu',$etudiant);
    }
 public function Etudiantlogin(Request $request)

    {   $this->validate($request,[
            
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'=> ['required', 'string','min:6'],
            
        ]);
       $user = DB::table('etudiants')->where('email', $request['email'] )->first();
        $vermail = DB::table('etudiants')->where('email', $request['email'])->count();

        if($vermail == 0){
            Session::flash('Email');
            return redirect()->back();
        }
    elseif (Auth::guard('etudiant') && $request['email'] == $user->email &&  $request['password'] == $user->password){
        $etud =Etudiant::find($user->id);
        $request->session()->put('etudiant',$etud);
        return redirect()->route('index');
        //dd($request->session()->get('etudiant'));
        //$etud->connecter=1;
        //$etud->save();
        //return view('index')->with('etuds',$value)->with('Settings',Setting::find(1))->with('categories',Category::all());
    }else{
            Session::flash('password');
            return redirect()->back();
        }
    
    }

   public function logouts(Request $request)
    {
        $request->session()->forget('etudiant');
        return redirect()->route('index');
    }



}
