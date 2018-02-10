<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('picture','categorie')->paginate(5);
        return view('back.post.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::pluck('name','id')->all();

        return view('back.post.create', ['categories' => $categories ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description'   => 'required|string',
            'categorie_id'  => 'required|integer',
            'post_type'     => 'required',
            'status'        => 'in:published,unpublished',
            'picture'       => 'required',
            'nbr_students'  => 'required|integer'
        ]);

        $post = Post::create($request->all());


        $im = $request->file('picture');
        if (!empty($im)){
            $link = $request->file('picture')->store('images');
            $post->picture()->create([
                'link' => $link,
                'title' => $request->title
            ]);
        }

        return redirect()->route('post.index')->with('message', 'post ajpouté avec succée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('back.post.show', ['post' => $post]);
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
        $categories = Categorie::pluck('name','id')->all();
        return view('Back.post.edit',compact('categories','post'));
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
        $this->validate($request, [
            'title' => 'required',
            'description'   => 'required|string',
            'categorie_id'  => 'required|integer',
            'post_type'     => 'required',
            'status'        => 'in:published,unpublished',
            'nbr_students'  => 'required|integer'
        ]);

        $post = Post::find($id);
        $post->update($request->all());


        $im = $request->file('picture');
        if (!empty($im)){
            if(isset($post->picture)){
                Storage::disk('local')->delete($post->picture->link);
                $post->picture()->delete();
            }
            $link = $request->file('picture')->store('images');
            $post->picture()->create([
                'link' => $link,
                'title' => $request->title
            ]);
        }

        return redirect()->route('post.index')->with('message', 'post ajpouté avec succée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('post.index')->with('message', 'post supprimé avec succée');
    }
}
