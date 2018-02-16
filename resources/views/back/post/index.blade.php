@extends('layouts.master')

@section('content')
    <p><a class="btn btn-primary btn-sm" href="{{route('post.create')}}">ajouter post</a></p>
    {{$posts->links("pagination::bootstrap-4")}}
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-sm table-striped">
        <thead>
        <tr>
            <th scope="col">@sortablelink('title')</th>
            <th scope="col">@sortablelink('description')</th>
            <th style="min-width:60px" scope="col">@sortablelink('post_type','type')</th>
            <th scope="col">@sortablelink('status')</th>
            <th scope="col">Edit</th>
            <th scope="col">Show</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @forelse($posts as $post)
            <tr>
                <th scope="row">{{$post->title}}</th>
                <td>{{substr($post->description,0, 80)}}... </td>
                <td>{{$post->post_type}}</td>
                <td>
                    <form class="" action="{{url('admin/post/update', $post->id)}}" method="post">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <button type="submit" class="btn btn-sm {{($post->status === 'published')? 'btn-success':'btn-outline-danger'}}">{{$post->status}}
                            <span class="glyphicon  {{($post->status === 'published')? 'glyphicon-ok-circle' :'glyphicon-ban-circle'}}"></span>
                        </button>
                    </form>
                </td>
                <td><a class="btn btn-warning btn-sm" href="{{route('post.edit', $post->id)}}">
                        <span class="glyphicon glyphicon-edit "></span>
                    </a></td>
                <td><a class="btn btn-info btn-sm" href="{{route('post.show', $post->id)}}">
                        <span class="glyphicon glyphicon-eye-open"></span>
                    </a></td>

                <td>
                    <form class="delete" action="{{route('post.destroy', $post->id)}}" method="post">
                        {{ csrf_field() }}
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger btn-sm" >delete
                            <span class="glyphicon glyphicon-trash"></span>

                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <li>Désolé pour l'instant aucun livre n'est publié sur notre site</li>
        @endforelse

        </tbody>
    </table>
    <div>{{$posts->links("pagination::bootstrap-4")}}</div>


@endsection

