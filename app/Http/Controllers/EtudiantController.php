<?php

namespace App\Http\Controllers;
use App\Cour_Etudiant;
use App\Cours_En_Linge;
use App\Cours_Linge_etud;
use App\Etudiant;
use App\Pack;
use App\Pack_Etudiant;
use App\Paiement;
use App\Payer;
use App\Post;
use App\VidCours;
use App\VidPack;
use Illuminate\Http\Request;
use App\Category;
use \App\Setting;
use \App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
class EtudiantController extends Controller
{

       public function __construct()
    {
        $this->middleware('auth:etudiant',['only' => 'index','edit'])->except('logout');
    }

    public function request()
    {
        return view('Etudiant.request');
    }

    public function send_mail(Request $request)
    {
        $this->validate($request,[
            "email"=>"required",
            ]);
        $users = DB::table('etudiants')->where('email', $request['email'] )->count();

        if($users == 0){
            Session::flash('Incorrect');
            return redirect()->back();
        }else{
        $to=$request->email;

        Mail::send('emails.reset_pass',[],function($message) use ($to){

            $message->to($to)->subject('réinitialiser Mot de passe!');

        });
            Session::flash('correct');
            return redirect()->back();
        }
    }

    public  function reinitialisation(){
           return view('Etudiant.reinitialisation');
    }
    public function Updateprofil(Request $request,$id)
    {
        $etud=  Etudiant::find($id);
        $etud->name=$request->name;
        $etud->prenom=$request->prenom;
        $etud->email=$request->email;
        $etud->phone=$request->Numero;
        $etud->save();
        return redirect()->back()->with(['info_modfier' => 'Information Modfier ']);

    }
public function password_etud_update(Request $request)
{
    $this->validate($request, [
        "email" => "required|email",
        "password" => "required",
        "password_confirmation" => "required",
    ]);
    $etud = DB::table('etudiants')->where('email', $request['email'])->first();
    $etuds = Etudiant::find($etud->id);
    if (Auth::guard('etudiant') && $request['email'] == $etuds->email && $request->password == $request->password_confirmation) {
        $etuds->password = $request->password;
        $etuds->save();
        $request->session()->put('etudiant',$etuds);
        return redirect()->route('index');
    }else
    {return redirect()->back()->with(['nouveau' => 'verifier votre nouveau mot de passe']);}
}


    public function Updatepass(Request $request,$id)
    {
        $etud=  Etudiant::find($id);
        if(($request->actuel == $etud->password) && ($request->Nouveau == $request->Confirmation)){
                $etud->password=$request->Nouveau;
                $etud->save();
                return redirect()->back()->with(['modfier' => 'mot de passe modfier ']);
            }else if (($request->actuel == $etud->password) && ($request->Nouveau != $request->Confirmation)){
                return redirect()->back()->with(['nouveau' => 'verifier votre nouveau mot de passe']);

        }else{
            return redirect()->back()->with(['actuel' => 'mot de passe actuel incorrecte']);
        }

    }
    public function Message(Request $request)
    {

        $this->validate($request,[
            "nom"=>"required",
            "prenom"=>"required",
            "email"=>"required|email",
            "subject" =>"required",
            "comment" =>"required",
            "matiere"=>"required"
        ]);
        $etud= DB::table('etudiants')->where('email', $request['email'])->first();
        //$matiere = Input::get('matiere');
        Message::create( [

            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "email"=>$request->email,
            "subject" =>$request->subject,
            "comment"=>$request->comment,
            "matiere"=>$request->matiere,
            "etudiant_id"=>$etud->id,
        ]);

        return redirect()->back()->with(['Envoyer' => 'Message envoyer']);

    }




    public function Updateimage(Request $request,$id)
    {
        $etud = Etudiant::find($id);
        //dd($request->file('file'));
        if(strpos($etud->photo,'1.png') === false){
            File::delete(public_path().'/'.$etud->photo);
        }
        $image = $this->addImage($request,'file','uploads/posts',$id);
        $etud->photo = 'uploads/posts/'.$image;
        $etud->save();
        return redirect()->back();

    }

	 public function index()
    {
        
       
    }
    /**public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }*/

    public function updatename()
    {
        return view('Etudiant.profil')->with('Settings',Setting::find(1))->with('categories',Category::all())->with('etuds',$etud);

    }


    public function goprofil($id)
    { $etud =Etudiant::find($id);
        return view('Etudiant.profil')->with('Settings',Setting::find(1))->with('categories',Category::all())->with('etuds',$etud);

    }
    public function Mes_cours($id)
    { $etud =Etudiant::find($id);
        $cours_etudiant=Cour_Etudiant::all();
        $cour=Post::all();
        $vid_cours=VidCours::all();
        $packs_etudiant=Pack_Etudiant::all();
        $pack=Pack::all();
        $vid_packs=VidPack::all();
        $cour_live_etudiant=Cours_Linge_etud::all();
        $live=Cours_En_Linge::all();
        return view('Etudiant.Mes_cours')->with('lives',$live)->with('cour_live_etudiant',$cour_live_etudiant)->with('packs_etudiant',$packs_etudiant)->with('packs',$pack)->with( 'vid_packs',$vid_packs)->with('vid_cours',$vid_cours)->with('cours',$cour)->with('cours_etudiant',$cours_etudiant)
            ->with('Settings',Setting::find(1))->with('categories',Category::all())->with('etuds',$etud);

    }
    public function go_live($id)
    {
        $etud =Etudiant::find($id);
        return view('Etudiant.go_live')->with('etuds',$etud)->with('Settings',Setting::find(1));
    }
    public function create()
    {
         return view('Etudiant.registeretudiant');
          
    }
//Hash::make($request['password'])
    public function store(Request $request)
    {   
         $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password'=> ['required', 'string','min:6'],
            'password_confirmation'=> ['required', 'string','min:6']
        ]);
        $existe = DB::table('etudiants')->where('email', $request['email'] )->count();

        if($existe == 1)
        {
            Session::flash('Incorrect');
            return redirect()->back();
        }
            else{
            if($request['password'] !== $request['password_confirmation'])
            {
                Session::flash('pass');
                return redirect()->back();
            }
        Etudiant::create([
            'name' => $request['name'],
            'prenom' => $request['prenom'],
            'email' => $request['email'],
            'password' => $request['password'],
        ]);
        $user = DB::table('etudiants')->where('email', $request['email'] )->first();
        $etud =Etudiant::find($user->id);
        $request->session()->put('etudiant',$etud);
        return redirect()->route('index');
            }
        //$etud->connecter=1;
        //$etud->save();
        // return view('SiteWeb.Aceuil')->with('etuds',$etud)->with('Settings',Setting::find(1))->with('categories',Category::all());
           
    }

    public function index_code(Request $request)

    {
        if (session('etudiant'))
        {$etud = $request->session()->get('etudiant');
        return view('payement.code')->with('Settings', Setting::find(1))->with('etuds', $etud)->with('categories', Category::all());
    }else
        {
            $etudiant=Etudiant::all();
            return view('Etudiant.LoginEtudiant')->with('Etu',$etudiant);
        }
    }
    public function code(Request $request,$id)
    {
        $etudiant=Etudiant::find($id);

        $this->validate($request,[
            'virement' => 'required',
            ]);
//dd($request->file('virement'));
        $name =time().$request->file('virement')->getClientOriginalName();
        $request->file('virement')->move('uploads/virement/', $name);
        Paiement::create([
            'photo' => 'uploads/virement/'.$name,
        ]);
        $vir = Paiement::where('photo', 'uploads/virement/'.$name)->first();
        Payer::create([
            'id_paiement' =>$vir->id,
            'id_etudiant'=>$etudiant->id
        ]);
        Session::flash('validation');
        return redirect()->back();
    }

        public function acheter(Request $request,$id_etud,$id_cour)
        {
            $etuds=Etudiant::find($id_etud);
            $cours=Post::find($id_cour);
            if($etuds->solde >= $cours->prix)
            {
                DB::table('cour_etudiant')->insert(
                    ['id_cour' =>$cours->id , 'id_etudiant' => $etuds->id]
                );
                $etuds->solde=$etuds->solde-$cours->prix;
                $etuds->save();
                Session::flash('Cour_acheter');
                return redirect()->back();
            }else{
                $etud = $request->session()->get('etudiant');
                Session::flash('Solde_insuffisant');
                return redirect()->back();
            }
        }
    public function acheter_pack(Request $request,$id_etud,$id_pack)
    {
        $etuds=Etudiant::find($id_etud);
        $packs=Pack::find($id_pack);

        if($etuds->solde >= $packs->prix)
        {
            DB::table('pack_etudiant')->insert(
                ['id_pack' =>$packs->id , 'id_etudiant' => $etuds->id]
            );
            $etuds->solde=$etuds->solde-$packs->prix;
            $etuds->save();
            Session::flash('pack_acheter');
            return redirect()->back();
        }else{
            $etud = $request->session()->get('etudiant');
            Session::flash('Solde_insuffisant');
            return redirect()->back();
        }
    }

    public function detaille(Request $request,$id)
    {
        $cour=Post::find($id);
        $paks=Pack::all();
        $cours_ligne=Cours_En_Linge::all();

        $etud = $request->session()->get('etudiant');
        return view('SiteWeb.detaille')->with('courslive',$cours_ligne)->with('paks',$paks)->with('cours',$cour)->with('Settings', Setting::find(1))->with('etuds', $etud)->with('categories', Category::all());
    }

    public function detaille_pack(Request $request,$id)
    {
        $paks=Pack::find($id);
        $cour=Post::all();
        $cours_ligne=Cours_En_Linge::all();
        $etud = $request->session()->get('etudiant');
        return view('SiteWeb.detaille_pk')->with('courslive',$cours_ligne)->with('paks',$paks)->with('cours',$cour)->with('Settings', Setting::find(1))->with('etuds', $etud)->with('categories', Category::all());
    }


    public function destroy($id)
    {
        $etudiant = Etudiant::find($id);

        $etudiant->destroy($id);
        return redirect()->back();
    }

    public function acheter_live(Request $request,$id_etud,$id_live)
    {
        $etuds=Etudiant::find($id_etud);
        $live=Cours_En_Linge::find($id_live);

        if($etuds->solde >= $live->prix)
        {
            DB::table('cour_linge_etudiant')->insert(
                ['id_cour_l' =>$live->id , 'id_etudiant' => $etuds->id]
            );
            $etuds->solde=$etuds->solde-$live->prix;
            $etuds->save();
            Session::flash('pack_acheter');
            return redirect()->back();
        }else{
            $etud = $request->session()->get('etudiant');
            Session::flash('Solde_insuffisant');
            return redirect()->back();
        }
    }
    private function addImage($request, $input, $path, $filename) :string {
        if($request->hasFile($input)){
            $extension = $request->file($input)->getClientOriginalName();
            // Filename unique name generate
            $outputName= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file($input)->move($path, $outputName);
        } else {
            $outputName = '1.png';
        }
        return $outputName;
    }

}
