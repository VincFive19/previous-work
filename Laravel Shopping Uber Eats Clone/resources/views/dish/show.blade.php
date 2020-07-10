@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card container">
                <div class='card-img-top embed-responsive-21by9' style='height: 20%'>
                    <img src='{{url($dish->image)}}'  class='embed-responsive-item' style="width: 100%;">
                </div>
                
                
                <h1>{{$dish->name}}</h1> 
                <p>{{$dish->price}}</p> 
                <p>{{$dish->user->name}}</p> 



                @if (Auth::check())

                    <p> 
                        <form method="POST" action='{{url("/setcookie/$dish->id")}}'> 
                        {{csrf_field()}} 
                            <input type="submit" value="Add To Cart"> 
                        </form> 
                    </p>

                    @if (Auth::id() == $dish->user_id) 
                        <p><a href='{{url("dishes/$dish->id/edit")}}'>Edit</a></p> 
                        <p> 
                            <form method="POST" action='{{url("dishes/$dish->id")}}'> 
                                {{csrf_field()}} 
                                {{ method_field('DELETE') }} 
                                <input type="submit" value="Delete"> 
                            </form> 
                        </p> 


                    @endif
              
                @endif
               

            </div>
        </div>
    </div>
</div>
@endsection