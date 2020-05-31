
@extends('layouts.app')

@section('content')
<head>
<link href="{{ asset('css/siderbar.css') }}" rel="stylesheet">
</head>
<body >
<img class="background" src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80">


<div class="container">
<div class="d-flex justify-content-center">
<div class="card w-70">
<div class="card-header text-white bg-secondary ">
    Edit book 
  </div>
  <div class="card-body">
<form action="/books/{{$book->id}}" method="POST" enctype="multipart/form-data">
{{csrf_field()}}

<div class="form-group">
    <label name="image">Image</label>
    <input name="image" type="file" class="form-control">
</div>
<div class="form-group">
    <label name="title">Title</label>
    <input name="title" type="text" value="{{$book->title}}" class="form-control">
</div>
<div class="form-group">
    <label name="author">Author</label>
    <input name="author" type="text" value="{{$book->author}}" class="form-control">
</div>
<div class="form-group">
    <label name="body">Body</label>
    <textarea name="body" class="form-control">{{$book->body}}</textarea>
</div>
<div class="col-md-6">
<div class="form-group">
    <label name="price">price</label>
    <input name="price" value="{{$book->price}}" type="number" class="form-control">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
    <label name="num">num_of_Books</label>
    <input name="num_of_books" value="{{$book->num_of_books}}" type="number" class="form-control"> 
</div>
</div>

<div class="form-group">
    <label name="ISBN">ISBN</label>
    <input name="ISBN" value="{{$book->ISBN}}" type="number" class="form-control"> 
</div>

<input id="submit" type="submit" value="submit" class="btn btn-primary">

<input name="_method" value="PUT" type="hidden">
</form> 
</div> 
</div>  
</div>  
</div>     
@endsection