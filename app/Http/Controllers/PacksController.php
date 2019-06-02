<?php

namespace App\Http\Controllers;

use App\Category;
use App\Pack;

use App\User;
use App\VidPack;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
class PacksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::find(auth()->id());
        return view('pack.index')->with('cours',Pack::all())->with('users',User::all())
            ->with('userr',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('pack.create_pack');
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
            "titel"=>"required",
            "conten"=>"required",
            "photo" =>"required|max:20000",
            "video" =>"required",
            "prix" => "required",
        ]);

        Pack::create( [

            "titel"=>$request->titel,
            "content"=>$request->conten,
            "user_id"=>auth()->id(),
            "prix"=>$request->prix,
            "photo" =>'uploads/posts/'.$request->photo,
            "slug"=>str_slug($request->titel)
        ]);
        $myField = Pack::where('titel', $request->titel)->first();
        $vid_array =$request->video;
        $array_len =count($vid_array);
        for($i=0; $i<$array_len; $i++)
        {
            //$destination_path = public_path('/uploads');
            //$vid_array[$i]->move($destination_path,$vid_array[$i]);

            VidPack::create([
                "pack_id" => $myField->id,
                "name" => substr($vid_array[$i], 0, strpos($vid_array[$i], ".mp4")),
                "video" => 'uploads/'.$vid_array[$i]
            ]);
        }
        Session::flash('creatmatiere');
        return redirect()->back();
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
    public function edit($id)
    {
        $post = Pack::find($id);

        return view('pack.edit')->with('cours',$post)->with('vids',VidPack::all());
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
        $post=Pack::find($id);
        $image = $this->addImage($request,'photo','uploads/posts',$id);
        $post->titel =$request->titel;
        $post->content =$request->content;
        $post->photo ='uploads/posts/'.$image;
        $post->save();



        Session::flash('creatmatiere');
        return redirect()->back();
    }

    public function supprimer_video($id_vid){
        $vid=VidPack::find($id_vid);
        $vid->destroy($id_vid);
        Session::flash('supprimer_video');
        return redirect()->back();
    }
    public function ajouter_video(Request $request, $id)
    {
        $vid_array =$request->video;
        $array_len =count($vid_array);
        for($i=0; $i<$array_len; $i++)
        {
            VidPack::create([
                "pack_id" => $id,
                "name" => substr($vid_array[$i], 0, strpos($vid_array[$i], ".")),
                "video" => 'uploads/'.$vid_array[$i]
            ]);
        }
        Session::flash('ajouter_video');
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $myField = DB::table('vid_packs')->where('pack_id', $id )->first();
        $vid=VidPack::find($myField->id);
        $vid->destroy($id);
        $pack=  Pack::find($id);
        $pack->destroy($id);
        return redirect()->back();
    }
    private function addImage($request, $input, $path) :string {
        if($request->hasFile($input)){
            $name = $request->file($input)->getClientOriginalName();
            // Filename unique name generate
            $outputName=$name;
            // Upload Image
            $path = $request->file($input)->move($path,  $name);
        } else {
            $outputName = '1.png';
        }
        return $outputName;
    }
}
