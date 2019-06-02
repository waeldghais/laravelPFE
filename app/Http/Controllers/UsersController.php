<?php

namespace App\Http\Controllers;

use App\Paiement;
use App\Payer;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Session;
use App\User;
use App\Denseigant;
use Illuminate\Support\Facades\DB;

use App\Etudiant;


use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{
    
    public function __construct(){
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function indexetudiant()
    {
        return view('Etudiant.index')->with('etudiants',Etudiant::all());
    }
    public function index()
    {
        return view('users.index')->with('users',User::all());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('users.create');
          
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            
            
        ]);
            User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['name']),
        ]);
         return redirect()->route('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Virement()
    {
    $etudiant=Etudiant::all();
    $payer=Payer::all();
    $paiement=Paiement::all();
    return view('payement.virement')->with('etuds',$etudiant)->with('payer',$payer)->with('paiement',$paiement);
    }
    public function Consulter($etud_id ,$pai_id)
    {
        $etud=Etudiant::find($etud_id);
        $pai=Paiement::find($pai_id);
        return view('payement.consulter')->with('etud',$etud)->with('pai',$pai);
    }


    public function valider(Request $request,$etud_id ,$pai_id)
    {
        $etud=Etudiant::find($etud_id);
        $pai=Paiement::find($pai_id);
        $etud->solde=$etud->solde+$request->solde;
        $etud->save();
        $pai->destroy($pai_id);
        DB::table('payers')->where('id_paiement',$pai_id)->delete();
        Session::flash('virement_valider');
        return redirect()->route('payement.virement');
    }

    public function Annuler($pai_id){
        $pai=Paiement::find($pai_id);
        $pai->destroy($pai_id);
        DB::table('payers')->where('id_paiement',$pai_id)->delete();
        Session::flash('annuler_valider');
        return redirect()->route('payement.virement');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
         
        $user->destroy($id);
        return redirect()->back();
    }


     public function admin($id)
    {
        $user =User::find($id);
        $user->admin =1;
        $user->save();
         return redirect()->route('users');
    }

      public function notAdmin($id)
    {
        $user =User::find($id);
        $user->admin =0;
        $user->save();
         return redirect()->route('users');
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function rufse($id)
    {
         $ens = Denseigant::find($id);
         $name=$ens->name;
         $prenom=$ens->prenom;
        $ens->destroy($id);

        Session::flash('ruf');
        return redirect()->route('demande_enseigants.Nvens')->with($name)->with($prenom);
    }
     public function accepter($id)
    {
        $ens = Denseigant::find($id);
        $decrypted=$ens->name.$ens->phone;
      
 User::create([
            'name' => $ens->name,
            'prenom' => $ens->prenom,
            'email' => $ens->email,
            'password' => Hash::make($decrypted),
            'matiere' => $ens->matiere
        ]);
 $to=[$ens->email];
 
 Mail::send('emails.email',['name' => $ens->name,'email' => $ens->email,'password' => $decrypted],function($message) use ($to){
        
        $message->to($to,'Eya chabbouh')->subject('Bienvenue notre nouveau enseignant!');
        
    });
        
   
        Session::flash('accepter');
       // $ens->destroy($id);
         return redirect()->back();
         //dd($ens->all());
    }

}
