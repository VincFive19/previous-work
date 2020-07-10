<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Dish;
use Illuminate\Validation\Rule;

class DishController extends Controller
{

    public function __construct() {
        $this->middleware('auth', ['only'=>'create', 'only'=>'edit']); 
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dishes = Dish::paginate(5);
        // dump($dishes);
        return view('dish/index')->with('dishes', $dishes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dish/create_form');
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
            'price' => 'required|numeric|min:0',
            'user_id' =>'exists:users,id',
            'image' => 'required',
         
        ]);

        $image_store = request()->file('image')->store('dish_images', 'public');

        $dish = new Dish(); 
        $dish->name = $request->name; 
        $dish->price = $request->price; 
        $dish->user_id = $request->user_Id; 
        $dish->image = $image_store;
        $dish->save(); 
        return redirect("dishes/$dish->id");

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
        $dish = Dish::find($id); 
        return view('dish/show')->with('dish', $dish);
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
        $dish = Dish::find($id); 
        return view('dish/edit_form')->with('dish', $dish);

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
            'price' => 'required|numeric',
            'user_Id' =>'exists:users,id',
            'image' => 'required',
        ]);
        $image_store = request()->file('image')->store('dish_images', 'public');
        $dish = Dish::find($id); 
        $dish->name = $request->name; 
        $dish->price = $request->price; 
        $dish->user_id = $request->user_Id; 
        $dish->image = $image_store;
        $dish->save(); 



        return redirect("dishes/$dish->id");
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
        $dish = Dish::find($id); 
        $dish->delete();
        return redirect("dishes");
    }
}
