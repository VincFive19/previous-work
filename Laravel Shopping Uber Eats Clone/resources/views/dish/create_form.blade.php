@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (count($errors) > 0)
                    <div class="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action='{{url("dishes")}}' enctype="multipart/form-data"> 
                    {{csrf_field()}} 
                    <p>
                        <label>Name: </label>
                        <input type="text" name="name"  value="{{old('name') }}"> 
                    </p> 
                    <p>
                        <label>Price: </label>
                        <input type="text" name="price"  value="{{ old('price')}}">
                    </p> 
                    <p>
                        <label>Image: </label>
                        <input type="file" name="image">
                        <input hidden type="text" name="user_Id" value="{{Auth::User()->id}}">
                    </p>
                   
                    <input type="submit" value="Create">  
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
