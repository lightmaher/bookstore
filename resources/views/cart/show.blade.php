@extends('layouts.app')

@section('content')

   <div class="container">
       <div class="row">
            @if($cart)
                <div class="col-md-8">
                     @foreach($cart->items as $book)
                        <div class="card mb-2">
                          	<div class="card-body">
                          		<h5 class="card-title">
                          			{{$book['title']}}
                          		</h5>
                                <div class="card-tetx">
<<<<<<< HEAD
                                	
                                    <form action="{{route('book.update' , $book['id'])}}" method="POST">
                                    {{csrf_field()}}
                                    <input type="text" name="qty" id="qty" value="{{$book['qty']}}">

                                    <input name="_method" type="hidden" value="PUT"/>
                                    <input id="submit" type="submit" value="Edit" class="btn btn-default float-right" style="margin-right:5px;">       
                                	${{$book['price']}}

                                    </from>
=======
                                	${{$book['price']}}
	                                <a class="btn btn-danger btn-small ml-4" href="">Delete</a>
	                                <input type="text" name="qty" id="qty" value="{{$book['qty']}}">
	                                <a class="btn btn-secondry btn-sm btn-default" href="">Edit</a>
>>>>>>> 1c72dcaaf73924e78e7661785ffbc588cb57eba6
                                </div>
                            </div>
                        </div>
                        @endforeach
<<<<<<< HEAD
                        <h1><strong>No Items Here</strong></h1>

=======
                        <p><strong>${{$cart->total_price}}</strong></p>
>>>>>>> 1c72dcaaf73924e78e7661785ffbc588cb57eba6
                </div> 
                <div class="col-md-4 r-2">
                   <div class="card bg-info text-white">
                        <h3 class="card-title ml-3"> Your Cart</h3>
                        <div class="card-text ml-3">
                        	<p> Total price is :{{$cart->total_price}}</p>
                        	<p> Total quantities is :{{$cart->total_qty}}</p>
<<<<<<< HEAD
                        	<a href="{{route('cart.confirm')}}" class="btn btn-info">Confirm</a>
                             
                   </div>
                </div> 
                @else
                <p>no items here!</p>
            @endif
=======
                        	<a href="{{ route('cart.checkout' , $cart->total_price)}}" class="btn btn-light mb-3">Checkout</a>
                             
                   </div>
                </div> 
                
>>>>>>> 1c72dcaaf73924e78e7661785ffbc588cb57eba6
        </div>
                    
   </div>

<<<<<<< HEAD
            
=======
            @else
                <p>no items here!</p>
            @endif
>>>>>>> 1c72dcaaf73924e78e7661785ffbc588cb57eba6
            
@endsection