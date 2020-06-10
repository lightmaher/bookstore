@extends('layouts.app')

@section('content')
<head>
<style>
img.background {
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0px;
  top: 0px;
  z-index: -1;
  filter: blur(10px);
}

body {
    font-family: "Lato", sans-serif;
  
  
    

    background-size: 100% ;
    
}

.main-head{
    height: 150px;
    background: #FFF;
   
}

.sidenav {
    height: 100%;
    background-color: black;



;
    overflow-x: hidden;
    padding-top: 20px;
}


.main {
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
}

@media screen and (max-width: 450px) {
    .login-form{
        margin-top: 10%;
    }

    .register-form{
        margin-top: 10%;
    }
}

@media screen and (min-width: 768px){
    .main{
        margin-left: 40%; 
    }

    .sidenav{
        margin-top:62px;
        width: 20%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
    }

    .login-form{
        margin-top: 80%;
    }

    .register-form{
        margin-top: 20%;
    }
}


.login-main-text{
    margin-top: 20%;
    padding: 60px;
    color: #fff;
}

.login-main-text h2{
    font-weight: 300;
}

.btn-black{
    background-color: #000 !important;
    color: #fff;
}


</style>
</head>
<body >
<img class="background" src="book14.jpg" >

<div class="sidenav" >

<div class="login-main-text" >
   <h2 >Book Store<br> Login Page</h2>

</div>
</div>
      <div class="main"  >
         <div class="col-md-6 col-sm-12 text-white">
       
            <div class="login-form">
             
             <form method="POST" action="{{ route('login') }}">
                        @csrf
                  <div class="form-group">
                     <label>E-Mail</label>
                     <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                 <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

              @error('password')
              <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
              </span>
            @enderror
                  </div>
                  <button type="submit" class="btn btn-black">Login</button>
               
                  <a class="btn btn-secondary" href="{{ route('register') }}">{{ __('Register') }}</a>
               </form>
            </div>
         </div>
      </div>
      </body>
      @endsection