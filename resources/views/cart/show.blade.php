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
                                  
                                   <form action="{{route('book.remove' , $book['id'])}}" method="POST" class="pull-right">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <input id="submit" type="submit" value="Delete" class="btn btn-danger">       
                                    </form> 
                                	
                                    <form action="{{route('book.update' , $book['id'])}}" method="POST">
                                    {{csrf_field()}}
                                    <input type="text" name="qty" id="qty" value="{{$book['qty']}}">

                                    <input name="_method" type="hidden" value="PUT"/>
                                    <input id="submit" type="submit" value="Edit" class="btn btn-default float-right" style="margin-right:5px;">       
                                	${{$book['price']}}

                                    </from>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <p><strong>${{$cart->total_price}}</strong></p>

                </div> 
                <div class="col-md-4 r-2">
                   <div class="card bg-info text-white">
                        <h3 class="card-title ml-3"> Your Cart</h3>
                        <div class="card-text ml-3">
                        	<p> Total price is :{{$cart->total_price}}</p>
                        	<p> Total quantities is :{{$cart->total_qty}}</p>
                        	<a href="{{route('cart.confirm')}}" class="btn btn-info">Confirm</a>
                             
                   </div>
                </div> 
                @else
                <p>no items here!</p>
            @endif
        </div>
                    
   </div>

            
            
@endsection