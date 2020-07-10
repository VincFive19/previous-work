@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                Your order was successful!

                {{Auth::user()->address}}
               

            </div>
        </div>
    </div>
</div>
@endsection