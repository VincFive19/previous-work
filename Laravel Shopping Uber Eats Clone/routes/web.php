<?php

use App\User;
use App\Dish;
use App\Orders;
// use Cookie;
use App\Http\Controllers\Cookie;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('documentation', function() {
    return view('documentation');
});

Route::resource('users', 'UserController');

Route::resource('dishes', 'DishController');

Route::resource('orders', 'OrderController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/restaurant', function() {
    $restaurants = User::all();
    return view('restaurants/restaurants')->with('restaurants', $restaurants);
});

Route::get('/restaurant/{id}', function($id) {
    $dishes = Dish::where('user_id', '=', $id)->paginate(10);
    return view('dish/index')->with('dishes', $dishes);
});

Route::post('/setcookie/{id}', function($id) {
    // $cookie = Cookie::make('id', $id);

    $dish = Dish::find($id);
    $cart = session()->get('cart');

    // If cart not exist
    if(!$cart) {
        $cart = [
            $id => [
                "id" => intval($id),
                "quantity" => 1
            ]
            ];

        session()->put('cart', $cart);
        return redirect()->back()->with('success');
    };
    if (isset($card[$id])) {
        $cart[$id]['quantity'] += 1;


        session()->put('cart', $cart);
        return redirect()->back()->with('success');
    } ;
    
        $cart[$id] = [
                "id" => intval($id),
                "quantity" => 1
            ];

        session()->put('cart', $cart);
        return redirect()->back()->with('success');
    


    // $minutes = 60;
    // $response = new Response('Set Cookie');
    // $response->withCookie(cookie('id', $id, $minutes));
    // return $cookie;
});

Route::get('/cart', function() {
    $cart = session()->get('cart');
    $dishes = Dish::all();
    if(!$cart) {
        $cart = [];
        return view('cart')->with('carts', $cart)->with('dishes',$dishes);
    };
    

    
    // for ($x = 1; $x <= sizeof($cart); $x++) {
    //     $dish = Dish::find($cart[$x]['id']);
    //     $newCart[$x] = [$dish, $cart[$x]['quantity']];
    // };

    return view('cart')->with('carts', $cart)->with('dishes',$dishes);
});

Route::get('/statistics', function() {
    $id = Auth::user()->id;
    // $total = Orders::with('dish')->where('dish->user_id', '=', $id)->sum('price');
    $orders = Orders::all();
    // $total = $orders
    $total = 0;
    foreach ($orders as $order) {
        if ($order->dish[0]['user_id'] == $id) {
            $total += $order->dish[0]['price'];
        } 
        // ->dish->where('user_Id', '=', $id)->sum('price')
    };

    $date = \Carbon\Carbon::today();
    $previousDate = \Carbon\Carbon::today();
    $weekArray = [];
    foreach (range(1, 12) as $order) {
        $weekly = 0;
        $date = $date->subDays(7);
        
        $week = Orders::whereBetween('date', [ $date, $previousDate])->get();
        
        foreach ($week as $order) {
            
            
            if ($order->dish[0]['user_id'] == $id) {
                $weekly += $order->dish[0]['price'];
            } 
        };

        array_push($weekArray, $weekly);

        $previousDate = $date;
        // ->dish->where('user_Id', '=', $id)->sum('price')
    };

    // $total = DB::table('orders')->join('dish', 'dish.id', '=', 'orders.dish_Id')->where('dish.user_id', '=', $id)->sum('price');
    // $weekly = Orders::where('dish_Id->user_id=', $id)->where('')->sum('price');
    return view('restaurants/statistics')->with('total', $total)->with('weekArray', $weekArray);
});

Route::post('/cart/{id}', function($id) {
    $cart = session()->get('cart');
    
    unset($cart[$id]);

    session()->put('cart', $cart);
    return redirect()->back()->with('success');
});

Route::get('/top', function() {
    $date = \Carbon\Carbon::today()->subDays(30);
    $today = \Carbon\Carbon::today();
    $dishes = Orders::whereBetween('date', [$today, $date])->withCount('dish_Id')->orderBy('dish_id_count', 'desc')->take(5);
    return view('dish/index')->with('dishes', $dishes);
});

Route::get('/admin', function(){
    $users = User::orderBy('accepted')->get();;
    return view('admin')->with('users', $users);
});

Route::post('/admin/{id}', function($id){
    if (Auth::id() == 1) {
        $user = User::find($id); 
        $user->accepted = 'True';
        $user->save(); 
    };
    
    return redirect("/admin");
});