@extends('layouts.master')
@section('content')
    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-6">
            <h1>create post : </h1>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title"  name="title" placeholder="entre title">
                @if($errors->has('title')) <span class="error">{{$errors->first('title')}}</span>@endif
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea type="password" class="form-control" name="description" id="description" placeholder="Description..."></textarea>
                @if($errors->has('description')) <span class="error">{{$errors->first('description')}}</span>@endif
            </div>
            <div class="form-group ">
                <label for="inputState">categorie</label>
                <select id="inputState" class="form-control" name="categorie_id">
                    <option selected value="">No categorie</option>
                    @foreach($categories as $id => $name)
                        <option value="{{$id}}">{{$name}}</option>
                    @endforeach
                </select>
                @if($errors->has('categorie_id')) <span class="error">{{$errors->first('categorie_id')}}</span>@endif
            </div>

            <div class="form-group ">
                <label for="inputState">Type</label>
                <select id="inputState" class="form-control" name="post_type">
                    <option selected value="">No type</option>
                    <option value="formation">formation</option>
                    <option value="stage">stage</option>
                </select>
                @if($errors->has('type')) <span class="error">{{$errors->first('type')}}</span>@endif
            </div>

            <div class="form-group">
                <label for="title">date debut</label>
                <input type="date" class="form-control" id="title"  name="date_start" placeholder="entre title">
            </div>

            <div class="form-group">
                <label for="title">date fin</label>
                <input type="date" class="form-control" id="title"  name="date_end" placeholder="entre title">
            </div>


            <div class="form-group">
                <label for="title">Nombre des etudiants</label>
                <input type="text" class="form-control" id="nbr_students"   name="nbr_students" >
            </div>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Ajouter Post</button>
            <div class="form-check">
                <h2>status</h2>
                <input type="radio" class="form-check-input" id="formation" value="published" name="status">
                <label class="form-check-label" for="published">published</label>
            </div>
                <div class="form-check">

                    <input type="radio" class="form-check-input" id="stage" value="unpublished" name="status">
                    <label class="form-check-label" for="unpublished">unpublished</label>
            </div>

            <div class="custom-file">
                <h2>Picture :</h2>
                <input type="file" class="custom-file-input" id="customFile" name="picture">
                <label class="custom-file-label" for="customFile"><small>Format: jpg</small></label>
            </div>
        </div>
    </form>
@endsection