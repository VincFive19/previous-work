@extends('layouts.master')
@section('title') 
    Unique Users - Lynch.com
@endsection
@section('content') 
    
<div class="card-columns">
    @forelse($users as $user)
        <!-- <?= var_dump($user)?> -->
        <!-- TEST -->
        @if($user->postCount >= 1)
        <div class="card">
            <img class="card-img-top" src="{{url('/images/avatar.png')}}" alt="Card image">

            <div class="card-body">
                <h4 class="card-title">{{$user->Name}}</h4>
                @if($user->lynch = 0)
                    <p><span class="badge badge-danger">LYNCHED</span></p>
                @else
                @endif
                
                <!-- <form action="method="post" action="{{ url("edit_post") }}"></form> -->
                <a href="{{ url("userpost/$user->Id") }}" class="btn btn-primary">See Posts</a>
            </div>
        </div>
        
    @endif
    @empty
        No users :(
    @endforelse

</div>

@endsection