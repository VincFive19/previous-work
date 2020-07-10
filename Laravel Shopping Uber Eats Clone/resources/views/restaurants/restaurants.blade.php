@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-columns">

            @foreach ($restaurants as $restaurant) 
            @if ($restaurant->restaurant == 'True')
                <a href="{{url("restaurant/$restaurant->id")}}">
                    <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $restaurant->name }}</h5>
                                <p class="card-text">{{ $restaurant->address }}</p>
                            </div>    
                    </div>
                </a> 
            @else
            @endif
            @endforeach
        </div>
    </div>
</div>
@endsection