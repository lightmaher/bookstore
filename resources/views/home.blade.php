@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @if(auth()->user()->id == 1)
                     <a href='/books/create' class='btn btn-primary'>Add Book</a>
                @endif
                <div class="card-body">
                   

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
