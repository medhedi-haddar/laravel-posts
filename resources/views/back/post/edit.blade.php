@extends('layouts.master')
@section('content')
    <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <div class="col-md-6">
            <h1>create post : </h1>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" value="{{$post->title}}"  name="title" placeholder="entre title">
                @if($errors->has('title')) <span class="error">{{$errors->first('title')}}</span>@endif
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea type="password" class="form-control"  name="description" id="description" placeholder="Description...">{{$post->description}}
                </textarea>
                @if($errors->has('description')) <span class="error">{{$errors->first('description')}}</span>@endif
            </div>
            <div class="form-group ">
                <label for="inputState">categorie</label>
                <select id="inputState" class="form-control" name="categorie_id">
                    <option {{is_null($post->categorie_id) ? 'selected' : ''}}}  value="">No categorie</option>
                    @foreach($categories as $id => $name)
                        <option  {{(!is_null($post->categorie) and $post->categorie->id == $id) ? 'selected' : ''}} value="{{$id}}">{{$name}}</option>
                    @endforeach
                </select>
                @if($errors->has('categorie_id')) <span class="error">{{$errors->first('categorie_id')}}</span>@endif
            </div>

            <div class="form-group ">
                <label for="inputState">Type</label>
                <select id="inputState" class="form-control" name="post_type">
                    <option {{is_null($post->post_type) ? 'selected' : ''}}} value="">No type</option>
                    <option {{(!is_null($post->post_type) and $post->post_type == 'formation' ) ? 'selected' : ''}} value="formation">formation</option>
                    <option {{(!is_null($post->post_type) and $post->post_type == 'stage' ) ? 'selected' : ''}}  value="stage">stage</option>
                </select>
                @if($errors->has('type')) <span class="error">{{$errors->first('type')}}</span>@endif
            </div>
            <div class="form-group">
                <label for="title">date debut</label>
                <input type="date" class="form-control" id="title" value="{{$post->date_start_fr}}" name="date_start">
                @if($errors->has('date_start')) <span class="error">{{$errors->first('date_start')}}</span>@endif
            </div>

            <div class="form-group">
                <label for="title">date fin</label>
                <input type="date" class="form-control" id="title"  value="{{$post->date_end_fr}}" name="date_end" >
                @if($errors->has('date_end')) <span class="error">{{$errors->first('date_end')}}</span>@endif
            </div>

            <div class="form-group">
                <label for="nbr_students">Nombre des etudiants</label>
                <input type="text" class="form-control" id="nbr_students"  value="{{$post->nbr_students}}" name="nbr_students" >
                @if($errors->has('nbr_students')) <span class="error">{{$errors->first('nbr_students')}}</span>@endif
            </div>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Update Post</button>
            <!-- Status -->
            <div class="form-check">
                <h2>status</h2>
                <input type="radio" {{(!is_null($post->status) and $post->status == 'published' ) ? 'checked' : ''}} class="form-check-input" id="formation" value="published" name="status">
                <label class="form-check-label" for="published">published</label>
            </div>
            <div class="form-check">

                <input type="radio" {{(!is_null($post->status) and $post->status == 'unpublished' ) ? 'checked' : ''}} class="form-check-input" id="stage" value="unpublished" name="status">
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