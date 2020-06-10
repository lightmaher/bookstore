@extends('layouts.app')

@section('content')
<head>
<link href="{{ asset('css/siderbar.css') }}" rel="stylesheet">
</head>
<body>
@guest
    @if(count($books) > 0)
    <img class="background" src="/book14.jpg" >

    <div class="container mt-3 ">
        <div class="row ">
       
         @foreach($books as $book)
        
         <div class="card col-lg-3 mt-1 border-dark mb-3" style="width: 70rem; hight:30rem;" >
       <img class="card-img-top" src="/storage/Images/{{$book->image}}" alt="Card image cap" width="150" height="350">
       <div class="card-body">
        <h1 class="dard-title"><a href='books/{{$book->id}}'>{{$book->title}}</a></h1>
       <p class="card-text">by : {{$book->author}}</p>
   </div>
   </div>
         
        @endforeach
    @else
        <p>No Books Here!</p>
    @endif
@else
    @if(count($books) > 0)
    <img class="background" src="/book14.jpg" >

    <div class="container mt-3 ">
        <div class="row ">
       
         @foreach($books as $book)
        
         <div class="card col-lg-3 mt-1 border-dark mb-3" style="width: 70rem; hight:30rem;" >
       <img class="card-img-top" src="/storage/Images/{{$book->image}}" alt="Card image cap" width="150" height="350">
       <div class="card-body">
        <h1 class="dard-title"><a href='books/{{$book->id}}'>{{$book->title}}</a></h1>
       <p class="card-text">by : {{$book->author}}</p>
       @if(Auth::user()->id !=1)
            <a href="{{route('cart.add',$book->id)}}" class="btn btn-primary">Add to cart</a>
       @endif
   </div>
   </div>
         
        @endforeach
    @else
        <p>No Books Here!</p>
    @endif
         </body>
         @endguest
@endsection