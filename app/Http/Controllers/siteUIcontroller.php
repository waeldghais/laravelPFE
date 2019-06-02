<?php

namespace App\Http\Controllers;

use App\Message;
use App\Pack;
use Illuminate\Http\Request;
use \App\Setting;
use \App\Category;
use Illuminate\Support\Facades\DB;
use \App\Post;
use \App\User;
use \App\VidCours;

class siteUIcontroller extends Controller
{
    public function index(Request $request)
    {   
        $etud= $request->session()->get('etudiant');
        $techer=User::all();
        return view('index')->with('techers',$techer)->with('Settings',Setting::find(1))->with('etuds',$etud)->with('categories',Category::all());
    }

    public function utilisation(Request $request)
    {$paks=Pack::all();
        $cours=Post::all();
        $etud= $request->session()->get('etudiant');
        //dd($etud);
        return view('SiteWeb.utilisation')->with('cours',$cours)->with('packs',$paks)->with('Settings',Setting::find(1))->with('etuds',$etud)->with('categories',Category::all());
    }

     public function matiere(Request $request,$matiere_id)
    {   //$cour=Post::find($matiere_id);
        $vids=VidCours::all();
        $cour = DB::table('cours')->where('matiere_id', $matiere_id )->get();
        $etud= $request->session()->get('etudiant');
        $mat=Category::find($matiere_id);
        $user=User::all();
        $paks=Pack::all();
        return view('SiteWeb.matiere')->with('paks',$paks)->with('Settings',Setting::find(1))->with('categories',Category::all())
            ->with('cours',$cour)->with('etuds',$etud)->with('mats',$mat)->with('users',$user)->with('vids',$vids);
    }

     public function Contact(Request $request)
    {$etud= $request->session()->get('etudiant');

        return view('SiteWeb.contact')->with('Settings',Setting::find(1))->with('etuds',$etud)->with('categories',Category::all());
    }

    public function pack(Request $request)
    {   $packs=Pack::all();
    $cours=Post::all();
        $etud= $request->session()->get('etudiant');
        return view('SiteWeb.Nos_pack')->with('cours',$cours)->with('Settings',Setting::find(1))->with('etuds',$etud)->with('packs',$packs)->with('categories',Category::all());
    }
public function live(Request $request)
{
    $packs=Pack::all();
    $cours=Post::all();
    $etud= $request->session()->get('etudiant');
    return view('SiteWeb.live')->with('cours',$cours)->with('Settings',Setting::find(1))->with('etuds',$etud)->with('packs',$packs)->with('categories',Category::all());;
}

}
