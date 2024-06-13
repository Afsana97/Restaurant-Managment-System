<div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="{{route('login')}}"><i class="fa fa-user"></i> Login</a></li>
                            <li><a href="{{route('register')}}"><i class="fa fa-user"></i> Register</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./">
                            <i class="fa-solid fa-kitchen-set" style="color: #242367;">
                                <h1>O<span>ur's Dining</span></h1>
                                
                            </a>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="{{(Route::is('home') ? 'active' : '')}}"><a href="{{route('home')}}">Home</a></li>
                        {{-- <li class=""><a href="">About</a></li> --}}
                        <li class="{{(Route::is('menu') ? 'active' : '')}}"><a href="{{route('menu')}}">Menu</a></li>
                        <li class="{{(Route::is('chefs') ? 'active' : '')}}"><a href="{{route('chefs')}}">Chefs</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
  