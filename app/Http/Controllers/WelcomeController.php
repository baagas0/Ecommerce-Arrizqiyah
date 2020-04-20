<?php

namespace App\Http\Controllers;
use App\Site;
use App\Payment;
use App\Product;
use App\Blog;
use App\Banner;
use App\Users;
use Auth;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function frontend()
    {
        $data['auth'] = Auth::user();
        $data['best_item'] = Product::where('best_item','=', '1')
                            ->limit(4)
                            ->get();
        $data['newproduct'] = Product::orderBy('create_at', 'DESC')->get();
        $data['site'] = Site::find('1');
        $data['payment'] = Payment::where('status','=','1')->get();
        $data['blog'] = Blog::orderBy('create_at', 'DESC')->limit(4)->get();
        $data['banner'] = Banner::find('1')->first();
        // dd($data);
        return view('frontend.index', $data);
    }
    public function admin()
    {
        $time = date("H");

        /* Set the $timezone variable to become the current timezone */
        $timezone = date("e");

        /* If the time is less than 1200 hours, show good morning */
        if ($time < "12") {
            $data['greeting'] = "Good morning";
        } else

        /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
        if ($time >= "12" && $time < "17") {
            $data['greeting'] = "Good afternoon";
        } else

        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
        if ($time >= "17" && $time < "19") {
            $data['greeting'] = "Good evening";
        } else

        /* Finally, show good night if the time is greater than or equal to 1900 hours */
        if ($time >= "19") {
            $data['greeting'] = "Good night";
        }

        $data['users'] = Users::count();
        $data['users_deleted'] = Users::whereRaw('deleted_at is not null')->count();
        $data['product'] = Product::count();
        $data['blog'] = Blog::count();
        $data['site1'] = Site::get();

        $data['site'] = Site::find('1');
        return view('backend.index', $data);
    }
}
