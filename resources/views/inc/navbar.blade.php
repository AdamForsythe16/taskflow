<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <div class="menu-icon pr-3">
    <a href="#" id="menu-toggle"><div class="navbar-toggler-icon nav-link"></div></a>
  </div>
  <a class="navbar-brand" href="/">Taskflow</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    </ul>
  </div>
  <ul class="nav navbar-nav navbar-right">
    @if(Auth::guest())
      <li><a href="/login" class="nav-link">Login</a></li>
      <li><a href="/register" class="nav-link">Register</a></li>
    @else
      <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"><i class="fas fa-user-circle fa-lg mr-1"></i>
          {{Auth::user()->name}}<span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
          <li>
            <a class="dropdown-item" href="/profile">Profile</a>
          </li>
          <li>
            <a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
          </li>
        </ul>
      </li>
    @endif
  </ul>
</nav>
