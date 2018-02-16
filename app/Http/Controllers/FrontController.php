<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Cache;

class FrontController extends Controller
{

    public  function index(){


        $stage = Cache::remember('posts', 60*40, function () {
            return  Post::with('categorie', 'picture')->where('post_type', 'like', 'stage')
                ->orderBy('date_start', 'desc')->first();
        });
        $formation = Cache::remember('posts', 60*40, function () {
            return Post::with('categorie', 'picture')->where('post_type', 'like', 'formation')
                ->orderBy('date_start', 'desc')->first();
        });

        return view('front.index',['formation' => $formation, 'stage' => $stage]);
    }

    public function postByType($type){

        $posts = Cache::remember('posts', 60*40, function () use ($type) {
            return Post::with('categorie','picture')->where('post_type','like',$type)->paginate(5);
        });

        return view('front.post_type', ['posts'=>$posts]);
    }

    public function search(Request $request){

        $posts = Post::with('categorie','picture')->where('title', 'like', '%'.$request->search.'%')
                        ->orWhere('description', 'like', '%'.$request->search.'%' )->get();

        return view('front.searchresult', ['posts'=>$posts, 'search_word' => $request->search]);
    }

    public function show($id){

        $post = Cache::remember('sposts', 60*40, function () use ($id) {
            return post::findOrFail($id);
        });

        return view('front.show', ['post' => $post]);

    }
}
