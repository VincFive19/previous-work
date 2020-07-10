@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

            @if (Auth::check())
            
                <!-- @if (count($errors) > 0)
                    <div class="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif -->
                <form method="POST" action='{{url("dishes")}}'> 
                    {{csrf_field()}} 
                    <p>
                        <label>Name: </label>
                      
                        <p>{{ Auth::user()->name}}</p>
                        <input type="text" name="userId"  value="{{ Auth::user()->id}}"> 
                        
                    </p> 
                    
                    <p>
                        <label>Dish name: </label>
                        <input type="text" name="dishId"  value="{{$id}}">
                    </p> 
                    
                    

                    <input type="submit" value="Create">  
                </form>

            @endif
            </div>
        </div>
    </div>
</div>
@endsection
