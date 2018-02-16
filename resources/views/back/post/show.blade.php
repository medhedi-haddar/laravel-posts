@extends('layouts.master')

@section('content')
    <h2><span class="text-info">{{strtoupper($post->post_type)}} : </span>{{$post->title}}</h2>
        <a href="{{url('post', $post->id)}}" class="thumbnail">
            <img src="{{asset('images/'.$post->picture->link)}}" alt="{{$post->title}}">
        </a>

    <h2>Description</h2>
    <p>{{$post->description}}</p>
    <p>
        <span><b>categorie : </b>{{$post->categorie->name}}</span>

    </p>
@endsection
