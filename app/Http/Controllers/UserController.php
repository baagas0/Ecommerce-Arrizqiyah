<?php

namespace App\Http\Controllers;

use Auth;
use App\Site;
use App\Payment;
use App\Product;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        // dd($user);
        if ($user->isAdmin()) {
        // dd($data);
            return redirect('ip-admin');
        }

        return redirect('/');
    }
}
