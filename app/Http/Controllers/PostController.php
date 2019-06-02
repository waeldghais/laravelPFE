<?php
namespace App\Http\Controllers;
use App\Pack;
use App\Setting;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\User;
use App\VidCours;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::find(auth()->id());
        return view('cours.index')->with('cours',Post::all())->with('users',User::all())
            ->with('userr',$user);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('cours.create')->with('matieres',$categories);
    }
    public function create_payent()
    {
        $categories = Category::all();
        return view('cours.create_payent')->with('matieres',$categories);
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
            "category_id"=>"required",
            "image" =>"required",
            "video" =>"required",
        ]);

        //$image = $this->addImage($request,'file','uploads/posts');
        Post::create( [
            "titel"=>$request->titel,
            "content"=>$request->conten,
            "matiere_id"=>$request->category_id,
            "user_id"=>auth()->id(),
            "photo" =>'uploads/posts/'.$request->image,
            "slug"=>str_slug($request->titel)
        ]);
        $myField = Post::where('titel', $request->titel)->first();
        $vid_array =$request->video;
        $array_len =count($vid_array);
        for($i=0; $i<$array_len; $i++)
        {
            VidCours::create([
                "cour_id" => $myField->id,
                "name" => substr($vid_array[$i], 0, strpos($vid_array[$i], ".mp4")),
                "video" => 'uploads/'.$vid_array[$i]
            ]);
        }
        Session::flash('creatmatiere');
        return redirect()->back();
    }
    public function store_payent(Request $request)
    {
        $this->validate($request,[
            "titel"=>"required",
            "conten"=>"required",
            "category_id"=>"required",
            "prix"=>"required",
            "image" =>"required|max:20000",
            "video" =>"required",
        ]);
        //$image = $this->addImage($request,'photo','uploads/posts');
        Post::create( [
            "titel"=>$request->titel,
            "content"=>$request->conten,
            "matiere_id"=>$request->category_id,
            "user_id"=>auth()->id(),
            "prix"=>$request->prix,
            "gratuit"=>0,
            "photo" =>'uploads/posts/'.$request->image,
            "slug"=>str_slug($request->titel)
        ]);
        $myField = Post::where('titel', $request->titel)->first();
        $vid_array =$request->video;
        $array_len =count($vid_array);
        for($i=0; $i<$array_len; $i++)
        {
            //$destination_path = public_path('/uploads');
            //$vid_array[$i]->move($destination_path,$vid_array[$i]);
            VidCours::create([
                "cour_id" => $myField->id,
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
        $post = Post::find($id);
        return view('cours.edit')->with('cours',$post)
            ->with('matieres',Category::all())->with('vids',VidCours::all());
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {//$image = $this->addImage($request,'file','uploads/posts');
        $post=Post::find($id);
        $image = $this->addImage($request,'file','uploads/posts',$id);
        $post->titel =$request->titel;
        $post->content =$request->content;
        $post->matiere_id= $request->matiere_id;
        $post->photo ='uploads/posts/'.$image;
        $post->save();
        Session::flash('creatmatiere');
        return redirect()->back();
    }
    public function ajouter_video(Request $request, $id)
    {
        $vid_array =$request->video;
        $array_len =count($vid_array);
        for($i=0; $i<$array_len; $i++)
        {
            VidCours::create([
                "cour_id" => $id,
                "name" => substr($vid_array[$i], 0, strpos($vid_array[$i], ".")),
                "video" => 'uploads/'.$vid_array[$i]
            ]);
        }
        Session::flash('ajouter_video');
        return redirect()->back();
    }
    public function supprimer_video($id_vid){
        $vid=VidCours::find($id_vid);
        $vid->destroy($id_vid);
        Session::flash('supprimer_video');
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {$myField = DB::table('vid_cours')->where('cour_id', $id )->first();
        $vid=VidCours::find($myField->id);
        $vid->destroy($id);
        $post=  Post::find($id);
        $post->destroy($id);
        return redirect()->route('cours');
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
    public function live(Request $request)
    {

        return view('cours.livecours');
    }
}
