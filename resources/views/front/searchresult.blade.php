@extends('layouts.master')

@section('content')

        <h2>resultat de recherche pour <b class="text-info">{{$search_word}}</b> </h2>

        @forelse($posts as $post)
        <div class="row">
            <div class="col-md-3">

                <a href="{{url('post', $post->id)}}" class="thumbnail">
                    <img class="img-thumbnail" src="{{asset('images/'.$post->picture->link)}}" alt="{{$post->title}}">
                </a>
                <p><span>Type : </span>{{$post->post_type}}</p>
                <p><span>Categorie : </span>{{$post->categorie->name}}</p>
            </div>
            <div class="col-md-9">
                <h2>{{$post->title}}</h2>
                <p>{{$post->description}}</p>
                <a href="{{url('post', $post->id)}}" class="btn btn-primary">en savoir plus</a>
            </div>
        </div>
            @empty
            <span>Aucun post est disponible pour le moment !</span>
        @endforelse

@endsection

