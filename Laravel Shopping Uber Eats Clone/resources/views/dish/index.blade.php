@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 card-columns">
            @if (Auth::check())
               
                @if (Auth::user()->restaurant == 'True')
                @if (Auth::user()->accepted == 'True')
                    <a href="{{url("dishes/create")}}">Create New</a>
                @endif
                @endif
            @endif
            @foreach ($dishes as $dish) 
                <a href="{{url("dishes/$dish->id")}}">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $dish->image }}" class="card-img-top" >
                            <div class="card-body">
                                <h5 class="card-title">{{ $dish->name }}</h5>
                                <p class="card-text">{{ $dish->price }}</p>
                                <p class="card-text">{{ $dish->user->name }}</p>
                                <a href="{{url("setcookie/$dish->id")}}"></a>
                            </div>    
                    </div>
                </a> 
            @endforeach
            {{ $dishes->links()}}
        </div>
    </div>
</div>
@endsection