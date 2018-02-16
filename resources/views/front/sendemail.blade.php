@extends('layouts.master')
@section('content')
    <h2>Contactez nous :</h2>
    <ul>
        <form action="{{route('contactus.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{Session::get('flash_message')}}
                </div>
            @endif
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email"  name="email" placeholder="Votre email">
                    @if($errors->has('email')) <span class="error">{{$errors->first('email')}}</span>@endif
                </div>
                <div class="form-group">
                    <label for="subject">Sujet</label>
                    <input type="input" class="form-control" id="subject"  name="subject" placeholder="Sujet">
                    @if($errors->has('email')) <span class="error">{{$errors->first('email')}}</span>@endif
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea type="password" class="form-control" name="message" id="message" placeholder="Message..."></textarea>
                    @if($errors->has('message')) <span class="error">{{$errors->first('message')}}</span>@endif
                </div>
                <button type="submit"  class="btn btn-primary">Envoyer <span class="glyphicon glyphicon-send"></span></button>
            </div>
        </form>
@endsection