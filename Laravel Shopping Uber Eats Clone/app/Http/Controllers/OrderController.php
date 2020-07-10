<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\Cookie;
use Cookie;
use App\User;
use App\Dish;
use App\Orders;
use Illuminate\Support\Facades\Auth;
use DateTime;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware('auth', ['only'=>'index', 'only'=>'edit']); 
    }

    public function index()
    {
        //
    //    $user = User::all();
    //    dump($user->orders); exit;
        $orders = Orders::all();
        // dump($users[5]->dish);
        // dump($dish);
        // dump($orders);
        // exit;

        // Auth::user()->id == $order->dish->user_id
        return view('orders/index')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id = Cookie::get('id');
        
        

        return view('orders/create_form')->with('id', $id);
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
        $cart = session()->get('cart');
    
        

            
        // $this->validate($request, [
        //     'dishId' => 'required|numeric|min:0|exists:dish,id',
        //     'consumerId' =>'required|numeric|min:0|exists:users,id',
        //     'date' => 'required',
        // ]);
        foreach ($cart as $value){
            
            $order = new Orders(); 
            $order->dish_Id = $value['id']; 
            $order->user_Id = Auth::user()->id; 
            $order->date = new DateTime; 
            $order->save(); 
            // dump($order);
        }
        // dump(Orders::all() );
    //    exit;

        $cart = [];
        session()->put('cart', $cart);
        
        return view('orders/success');
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
        $orders = Orders::find($id); 
        return view('orders/show')->with('orders', $orders);
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
        $orders = Orders::find($id); 
        return view('orders/edit_form')->with('orders', $orders);
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
            'dishId' => 'required|numeric|min:0|exists:dish,id',
            'consumerId' =>'required|numeric|min:0|exists:users,id',
            'date' => 'required',
        ]);

        $order = Orders::find($id); 
        $order->dish_Id = $request->dishId; 
        $order->user_Id = $request->consumerId; 
        $order->date = $request->date; 
        $order->save(); 
        return redirect("orders/$order->id");
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
        $orders = Orders::find($id); 
        $orders->delete();
        return redirect("orders");
    }
}
