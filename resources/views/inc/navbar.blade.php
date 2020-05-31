<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Starter Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/starter-template/">

    <!-- Bootstrap core CSS -->
<link href="/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <i class="fa fa-book" aria-hidden="true"></i>
                  <a class="navbar-brand" href="{{ url('/') }}">
                      
                  </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                      <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                     @guest 
                      <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/about">About</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/services">Services</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/books">Books</a>
                          </li>
                          
                            <li class="nav-item">
                              <a class="nav-link" href="{{route('cart.show')}}">My cart({{session()->has('cart') ? session()->get('cart')->total_qty: '0'}})</a>
                            </li>
                      @endguest
                          @auth
                          @if(auth()->user()->is_admin())
                          <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/about">About</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/services">Services</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/books">Books</a>
                          </li>
                          
                            @else
                            <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/about">About</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/services">Services</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/books">Books</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{route('cart.show')}}">My cart({{session()->has('cart') ? session()->get('cart')->total_qty: '0'}})</a>
                            </li>
                          @endif
                          @endauth
                      </ul>
                      <!-- Right Side Of Navbar -->
                      <ul class="navbar-nav navbar-right">
                          <!-- Authentication Links -->
                          @guest
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                              </li>
                              @if (Route::has('register'))
                                  <li class="nav-item">
                                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                  </li>
                              @endif
                          @else
                              
                          <li class="nav-item dropdown">
                                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                      {{ Auth::user()->name }} 
                                  </a>

                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                          {{ __('Logout') }}
                                      </a>
                                      <a class="dropdown-item" href="/dashboard">
                                        DashBoard
                                      </a>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          @csrf
                                      </form>
                                  </div>
                              </li>
                          @endguest
                      </ul>    
                 
              </div>
          </nav>
    </body>

