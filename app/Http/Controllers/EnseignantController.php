<?php

namespace App\Http\Controllers;



use Session;
use App\Message;
use Illuminate\Http\Request;
use App\Denseigant;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('demande_enseigants.index')->with('last_ins' , Denseigant::orderBy('created_at','desc')->first());
    }
    public function Nven()
    {
        return view('demande_enseigants.Nven')->with('demande_enseigants',Denseigant::all());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Plusinfo($id)
    {$enseigant = Denseigant::find($id);
        return view('demande_enseigants.Plusinfo')->with('demande_enseigants',$enseigant);
    }
    public function create()
    {
        return view('demande_enseigants.Denseigant');
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
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:demande_enseigants'],
            'matiere'=> 'required',
            'phone' => ['required', 'string', 'max:20'],
            'cv' => 'required',
            
        ]);
       if($request->hasFile('cv')){
        $nom=$request->file('cv')->getClientOriginalName();
           $request->file('cv')->move('storage/upload', $nom);
 Denseigant::create([
            'name' => $request['name'],
            'prenom' => $request['prenom'],
            'email' => $request['email'],
            'matiere'=>$request['matiere'],
            'phone' =>$request['phone'],
            'cv'=>'public/upload/'.$nom

        ]);

        return redirect()->route('demande_enseigants');
         }else{
           return redirect()->back()->with(['nofile' => 'Ajouter votre CV']);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function pdf($id)
    {
        $tags = Denseigant::find($id);
        return Storage::download($tags->cv);
    }
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
    public function edit($id)
    {
        //
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

    public function goprofil($id)
    {   $user=User::find($id);
        return view('users.profil')->with('users',$user);
    }
    public function gomessage($id)
    {   $user=User::find($id);

        return view('users.message')->with('users',$user)->with('msgs',Message::all());
    }

    public function Updateuserpass(Request $request,$id)
    {
        $user=  User::find($id);
        if (Hash::check($request->actuel, $user->password) && ($request->Nouveau == $request->Confirmation))  {

                $user->password = Hash::make($request->Nouveau);
                $user->save();
                return redirect()->back()->with(['modfier' => 'mot de passe modfier ']);
        }else if (Hash::check($request->actuel, $user->password) && ($request->Nouveau != $request->Confirmation)){
            return redirect()->back()->with(['nouveau' => 'verifier votre nouveau mot de passe']);
        }else{
            return redirect()->back()->with(['actuel' => 'mot de passe actuel incorrecte']);
        }

    }

    public function Updateuserimage(Request $request,$id)
    {
//        dd($request);
        $user = User::find($id);
//        dd(strpos($user->photo,'1.png') === false,$user->photo, public_path().'/'.$user->photo );
        if(strpos($user->photo,'1.png') === false){
            File::delete(public_path().'/'.$user->photo);
        }
        $image = $this->addImage($request,'file','uploads/posts',$id);
        $user->photo = 'uploads/posts/'.$image;
        $user->save();
        return redirect()->back();

    }

    public function Updateuserprofil(Request $request,$id)
    {
        $user=  User::find($id);
        $user->name=$request->name;
        $user->prenom=$request->prenom;
        $user->email=$request->email;
        $user->phone=$request->Numero;
        $user->facebook=$request->facebook;
        $user->save();
        return redirect()->back();

    }
 public function sendmessage($user_id,$id){
     $user = User::find($user_id);
     $message= Message::find($id);
     return view('users.send')->with('users',$user)->with('msgs',$message);
}
    public function destroy($user_id,$id)
    {   $user = User::find($user_id);
        $message=  Message::find($id);
        $message->destroy($id);
        return redirect()->back()->with('users',$user);
    }


    public function envoyer(Request $request,$user_id,$id)
    {$user = User::find($user_id);
    $this->validate($request,[

            'message' => ['required', 'string', 'max:255'],
        ]);
        $msg = Message::find($id);
        $to=[$msg->email];

        Mail::send('emails.reponde',['bodymessage' => $request->get('message')],function($message) use ($to){

            $message->to($to,'CLV')->subject('Nous avons répondu à votre message');

        });
        Session::flash('Envoyerr');
        return redirect()->back()->with('users',$user);
        //dd($ens->all());
    }
    /**
     * Save image files
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $input
     * @param  string  $path
     * @param  string  $filename
     * @return string
     */
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
