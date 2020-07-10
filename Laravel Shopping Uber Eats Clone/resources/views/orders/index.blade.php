@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <h1>{{Auth::user()->name}} - Your Orders</h1>

            <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Dish</th>
                    <th scope="col">Date</th>
                    <th scope="col">Completed?</th>
                </tr>
            </thead>
            <tbody>

            
            @if (Auth::check())
            @foreach ($orders as $order)

                @if (Auth::id() == $order->dish[0]['user_id'])
                <tr>
                  

                    <td>{{ !empty($order->user[0]) ? $order->user[0]->name:'' }}</td>
                    <td>{{ !empty($order->dish[0]) ? $order->dish[0]['name']:''}}</td>
                    <td>{{ $order->date }}</td>
                    <td>
                        <form method="POST" action='{{url("orders/$order->id")}}'> 
                            {{csrf_field()}} 
                            {{ method_field('DELETE') }} 
                            <input type="submit" value="Completed"> 
                        </form> 
                    </td>
                </tr>
                @endif
            @endforeach
            @endif
                
                
            </tbody>
            </table>
            
           
            
        </div>
    </div>
</div>
@endsection