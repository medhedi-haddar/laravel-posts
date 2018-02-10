<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class FrontController extends Controller
{

    public  function index(){

        $stage = Post::where('post_type','like','stage')->orderBy('date_start', 'desc')->first();
        $formation = Post::where('post_type','like','formation')->orderBy('date_start','desc')->first();

        return view('front.index',['formation' => $formation, 'stage' => $stage]);
    }
}
