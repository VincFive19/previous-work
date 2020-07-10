@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form method="POST" action= '{{url("dishes/$dish->id")}}'> 
                    {{csrf_field()}} 
                    {{ method_field('PUT') }} 
                    <p>
                        <label>Name</label> 
                        <input type="text" name="name" value="{{$errors->all() ? old('name') : $dish->name}}">
                        {{$errors->first('name')}}
                    </p> 
                    <p>
                        <label>Price</label> 
                        <input type="text" name="price" value="{{$errors->all() ? old('price') : $dish->price}}">{{$errors->first('price')}}<br>
                    </p> 
                    
                    <input type="submit" value="Update"> 
                </form>
                <form method="POST" action='{{url("dishes/$dish->id")}}' enctype="multipart/form-data"> 
                    {{csrf_field()}} 
                    {{ method_field('PUT') }} 
                    <p>
                        <label>Name: </label>
                        <input type="text" name="name"  value="{{$errors->all() ? old('name') : $dish->name}}"> 
                        {{$errors->first('name')}}
                    </p> 
                    <p>
                        <label>Price: </label>
                        <input type="text" name="price"  value="{{$errors->all() ? old('price') : $dish->price}}">
                        {{$errors->first('price')}}
                    </p> 
                    <p>
                        <label>Image: </label>
                        <input type="file" name="image"  value="{{$errors->all() ? old('image') : $dish->image}}">
                        <input hidden type="text" name="user_Id" value="{{Auth::User()->id}}">
                        {{$errors->first('image')}}
                    </p>
                   
                    <input type="submit" value="Update">  
                </form>
            </div>
        </div>
    </div>
</div>
@endsection