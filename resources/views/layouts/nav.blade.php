<div class="blog-masthead">
  <div class="container">
    <nav class="nav blog-nav">
      <a class="nav-link active" href="/">Home</a>

      @if (Auth::check())
        <a class="nav-link" href="/task">Task</a>
      	<a class="nav-link ml-auto" href="/profile">Profile</a>
        <a class="nav-link" href="/logout">Logout</a>
      @else 
        <a class="nav-link ml-auto" style="position: right" href="/signup">Sign Up</a>
        <a class="nav-link" href="/login">Login</a>
      @endif
    </nav>
  </div>
</div>