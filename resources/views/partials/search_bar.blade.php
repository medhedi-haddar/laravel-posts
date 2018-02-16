<form class="form-inline" method="post" action="{{route('search')}}">
    {{ csrf_field() }}
    <h2>Recherche :</h2>
    <div class="form-group ">
        <input type="text" class="form-control" name="search" id="search" placeholder="title, description...">
    </div>
    <button type="submit" class="btn btn-primary "><span class="glyphicon glyphicon-search"></span></button>
</form>