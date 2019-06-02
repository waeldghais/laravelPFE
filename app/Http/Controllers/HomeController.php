<?php

namespace App\Http\Controllers;
use App\Denseigant;
use App\Etudiant;
use App\Pack;
use App\Paiement;
use App\User;
use App\Post;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Courgratuit = Post::where('gratuit', '1')->count();
        $Courpayant = Post::where('gratuit', '0')->count();

        return view('home')->with('etudiants',Etudiant::all())->with('ens',User::all())->with('coursg',$Courgratuit)
            ->with('coursp',$Courpayant)->with('pack',Pack::all())->with('demandeEns',Denseigant::all())->with('vir',Paiement::all());
    }
}
