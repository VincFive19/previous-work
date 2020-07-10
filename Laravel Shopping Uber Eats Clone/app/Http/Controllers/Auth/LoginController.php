<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    // protected $redirectTo = intended();
    
    public function redirectTo(){
        // return redirect()->back();
        // dump(url()->previous(1));
        // exit;

        if ($this->request->has('previous')) {
            $this->redirectTo = $this->request->get('previous');
        }

        return $this->redirectTo ?? '/';
        // return url()->previous();
    }
    

    /**
     * Create a new controller instance.
     *
     * @param Request $request
     * @return void
     */
    public function __construct(Request $request)
    {
        // $this->middleware('authorize')->only('login');
        $this->middleware('guest')->except('logout');
        $this->request = $request;
        // $this->redirectTo = url()->previous();
        // return redirect()
        // ->back();
        // $this->middleware('guest', ['except' => 'logout']);
        // $this->middleware('guest')->except('logout');
    }
}
