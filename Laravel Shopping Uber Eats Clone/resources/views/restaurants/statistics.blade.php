@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <h1>{{Auth::user()->name}} - Statistics</h1>


            <h2>Total Sales</h2>
            <p>{{$total}}</p>

            <?php $weekNumber = 0 ?>
            @foreach ($weekArray as $weekly)
                
                <h2>Weekly Sales Total for week {{$weekNumber += 1}}</h2>
                <p>{{$weekly}}</p>
            @endforeach

        </div>
    </div>
</div>


@endsection