<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
  <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="{{ URL::to('./home') }}">Dashboard Gyuto</a>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ URL::to('./home') }}">Home <span class="sr-only">(current)</span></a>
      </li>
      @auth
        <li class="nav-item">
          <a id="logout" class="nav-link" href="{{ route('logout') }}">@lang('Déconnexion')</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hide">
             {{ csrf_field() }}
          </form>
        </li>
      @endauth
    </ul>

    <form class="form-inline mt-2 mt-md-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Rechercher">
      <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Rechercher</button>
    </form>
  </div>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <h3><a class="nav-link" href="{{ URL::to('./home') }}">Gyuto <hr/> {{ Auth::user()->name}} </a></h3>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ URL::to('./intros') }}">Page Introduction</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ URL::to('./videos') }}">Page Vidéo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ URL::to('./albums') }}">Page Images</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ URL::to('./musics') }}">Page Musique</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ URL::to('./events') }}">Page Evènements</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ URL::to('./infos') }}">Page Info</a>
        </li>
      </ul>
    </nav>
  </div>
</div>