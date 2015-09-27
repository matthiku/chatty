<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <a href="/" class="navbar-brand">Chatty</a>
    </div>
    
    <div class="collapse navbar-collapse">
      <!-- @if (Auth::check()) -->
      <ul class="nav navbar-nav">
        <li><a href="#">Timeline</a></li>
        <li><a href="#">Friends</a></li>
      </ul>
      
      <form action="#" role="search" class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" name="query" class="form-control" 
          placeholder="Find people"/>
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form>
      <!-- @endif -->
      <ul class="nav navbar-nav navbar-right">
        <!--@if(Auth::check()) -->
        <li><a href="#">Dayle<!-- {{Auth::user()->getNameOrUsername() }}
        --></a></li>
        <li><a href="#">Update profile</a></li>
        <li><a href="{{ route('auth.signout') }}">Sign out</a></li>
        <!-- @else -->
        <li><a href="{{ route('auth.signup') }}">Sign up</a></li>
        <li><a href="{{ route('auth.signin') }}">Sign in</a></li>
        <!-- @endif -->
      </ul>
    </div>
  </div>
</nav>