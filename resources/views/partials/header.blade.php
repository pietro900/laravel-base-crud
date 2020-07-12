<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">HQ</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      {{-- request the name of the route. if it matches the current one, write active --}}
      <a class="nav-item nav-link {{ Request::route()->getName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
      {{-- request the name of the route. if it begins with 'students', write active --}}
      <a class="nav-item nav-link {{ strpos(Request::route()->getName(),'students') !== false ? 'active' : '' }}" href="{{ route('students.index') }}">Studenti</a>
    </div>
  </div>
</nav>
