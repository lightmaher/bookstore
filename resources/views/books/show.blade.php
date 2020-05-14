@extends('layouts.app')

@section('content')
<head>
<link href="{{ asset('css/siderbar.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body style="background-color :FloralWhite">


<div class="sidenav" >
<img class="background" src="/book14.jpg" >
<div class="login-main-text" >

  <h1 style="text-shadow: 2px 2px 8px"> " Reading is to the mind what exercise is to the body " </h1>
  <h5>- Joseph Addison</h5>

</div>
</div>
<div class="container mt-3">
<div class="row">
    <div class="col-md-8"> 
   <div class="card border-dark" style="width: 70rem; hight:70rem;">
  
   <img class="card-img-top" src="/storage/images/{{$book->image}}" alt=" book image " width="150" height="450">
    <div class="card-body">
    <h1 class="card-title" > {{$book->title}} </h2>
  
    <h5 class="card-title"> By : {{$book->author}}</h4>
    <hr> 
    <p class="card-text"> {{$book->body}} </p>
       <hr>
       @if(!Auth::guest())
       <div class="btn-group" role="group" aria-label="Basic example">
        
        <form action="/books/{{$book->id}}" method="POST" >
        <a href="/books/{{$book->id}}/edit" class="btn btn-primary">Edit</a>

        {{csrf_field()}}
        <input name="_method" type="hidden" value="DELETE">
        <input id="submit" type="submit" value="Delete" class="btn btn-danger">       
        </form>
        </div>
    @endif
  
    </div>
   </div>
   </div>
   
   <div class="col-md-4">
   <br>
   <br>
   <div class="card bg-light mb-3">
   <div class="card-body">
   <h2 class="card-title"> {{$book->price}}$ </h2>
   <hr>
   
  <h3 >Free delivery worldwide <i class="fa fa-rocket" style="font-size:36px;color:green"></i>
</h3>
  <hr>
  <button type="button" class="btn btn-primary btn-lg">Add to card </button>


   </div>
   </div>
   </div>
   </div>
   </div>
@endsection