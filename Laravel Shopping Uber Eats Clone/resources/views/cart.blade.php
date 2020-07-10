@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Cart</h1>
            <h2>Your Delivey Address - {{Auth::user()->address}} </h2>
            <?php $total = 0 ?>
            @foreach ($carts as $cart) 
            <?php $total += $dishes[$cart['id']-1]->price;?>
            <div class="card">
                {{$cart['quantity']}}
                {{$dishes[$cart['id']-1]->name}}
                {{$dishes[$cart['id']-1]->price}}
                
                <form class="form-control" method="POST" action='{{url("/cart/$cart[id]")}}'> 
                    {{csrf_field()}} 
                    <input type="submit" value="Delete"> 
                </form>
            </div>
                
            @endforeach
            
            <h4>Total - {{$total}}</h4>
            
            <form method="POST" action='{{url("/orders")}}'> 
                    {{csrf_field()}} 
                    <input type="submit" value="Purchase"> 
            </form>
        </div>
    </div>
</div>
@endsection