@extends('layouts.master')

@section('content')

    <div class="row">
        <h2>Dernier Stage</h2>

        <div class="row">
            <div class="col-md-3">

                    <a href="{{url('post', $stage->id)}}" class="thumbnail">
                        <img class="img-thumbnail" src="{{asset('images/'.$stage->picture->link)}}" alt="{{$stage->title}}">
                    </a>
                    <p><span>Type : </span>{{$stage->post_type}}</p>
                    <p><span>Categorie : </span>{{$stage->categorie->name}}</p>
            </div>
            <div class="col-md-9">
                <h2>{{$stage->title}}</h2>
                <p>{{$stage->description}}</p>
                <a href="{{url('post', $stage->id)}}" class="btn btn-primary">en savoir plus</a>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <h2>Derniere formation </h2>

        <div class="row">
            <div class="col-md-3">

                    <a href="{{url('post', $formation->id)}}" class="thumbnail">
                        <img  class="img-thumbnail" src="{{asset('images/'.$formation->picture->link)}}" alt="{{$formation->title}}">
                    </a>
                    <p><span>Type : </span>{{$formation->post_type}}</p>
                    <p><span>Categorie : </span>{{$formation->categorie->name}}</p>
            </div>
            <div class="col-md-9">
                <h2>{{$formation->title}}</h2>
                <p>{{$formation->description}}</p>
                <a href="{{url('post', $formation->id)}}" class="btn btn-primary">en savoir plus</a>
            </div>
        </div>
    </div>

@endsection

