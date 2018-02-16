<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">{{config('app.name')}}</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">

                <li class="active"><a href="{{url('/')}}">Aucceil</a></li>
                @if(Route::is('post.*') == false)
                        <li ><a href="{{url('type', 'formation')}}">Formation</a></li>
                        <li ><a href="{{url('type', 'stage')}}">Stage</a></li>
                    <li ><a href="{{url('/contactus')}}">Contact</a></li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li class="nav-item"><a class="nav-link active" href="{{route('post.index')}}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{route('logout')}}"
                                            onclick="event.preventDefault();
                            document.getElementById('logout.form').submit();">Logout</a></li>
                    <form id="logout.form" action="{{route('logout')}}" method="post" style="display: none;">
                        {{csrf_field()}}
                    </form>
                @else
                    <li><a href="{{route('login')}}">Login</a></li>
                @endif
            </ul>

        </div>
    </div>
</nav>