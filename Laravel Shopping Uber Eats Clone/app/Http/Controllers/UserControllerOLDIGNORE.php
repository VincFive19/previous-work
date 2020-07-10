<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Dish;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = Users::all();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' =>'required|max:255',
            'address' =>'required|max:255',
            'restaurant' => 'required|boolean',
        ]);

        $user = new User(); 
        $user->name = $request->name; 
        $user->email = $request->email; 
        $user->password = $request->password; 
        $user->address = $request->address; 
        $user->restaurant = $request->restaurant; 
        $user->save(); 

        return redirect("user/$user->id");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = Users::find($id); 
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::find($id); 
        return view('products/edit_form')->with('product', $product);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' =>'required|max:255',
            'address' =>'required|max:255',
            'restaurant' => 'required|boolean',
        ]);

        $user = User::find($id); 
        $user->name = $request->name; 
        $user->email = $request->email; 
        $user->password = $request->password; 
        $user->address = $request->address; 
        $user->restaurant = $request->restaurant; 
        $user->save(); 

        return redirect("user/$user->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
