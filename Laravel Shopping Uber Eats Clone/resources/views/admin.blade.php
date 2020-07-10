@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
        <h1>Admin Page</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Accepted?</th>
                    <th scope="col">Accept</th>
                </tr>
            </thead>
            <tbody>

            
            @if (Auth::check())
            @if (Auth::id() == 1)
            @foreach ($users as $user)

            @if ($user->restaurant == "True")
                <tr>
                  

                    <td>{{$user->name}}</td>
                    <td>{{$user->accepted}}</td>
                    <td>
                    @if ($user->accepted == 'False')
                        <form method="POST" action='{{url("admin/$user->id")}}'> 
                            {{csrf_field()}} 
                            <input type="submit" value="Accept"> 
                        </form> 
                    
                    @else

                        <p>Accepted</p>

                    @endif
                    </td>
                </tr>
                @endif
            @endforeach
            @endif
            @endif
                
                
            </tbody>
            </table>
        </div>
    </div>
</div>

@endsection