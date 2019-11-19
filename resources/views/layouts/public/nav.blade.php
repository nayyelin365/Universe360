<header>
        <div class="main-menu" style="background: green;">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="#"><img src="images/logo1.png" width="70" height="30" alt="logo"></a>

                      <h1 style="color: white;">Add New Language</h1>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="navbar-item active">
                                <a style="color: white;" href="#" class="nav-link">Home</a>
                            </li>
                           @if(Auth::id())
                                      <li class="navbar-item">
                                      <form method="POST" action="{{ route('logout') }}">

                                      @csrf
                                    
                                      <button style="background: none;,border: none;color: white;" type="submit">Logout out</button>
                                      </form>    
                                      </li>
                          @else
                                      <li class="navbar-item">
                                          <a style="color: white;" href="{{ url('/login')}}" class="nav-link">Login</a>
                                      </li>
                          @endif   


                           
                        </ul>
                      
                </nav>
            </div>
        </div>
    </header>