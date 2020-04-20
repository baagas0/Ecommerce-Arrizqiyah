<?php

namespace App\Http\Controllers;

use Request;
use App\Mail\Subscription;
use Mail;

use App\Product;
use App\Site;
use App\Payment;
use App\Category;
use App\Contact;
use App\Faq;
use App\Blog;
use DB;
use Auth;

class FrontendController extends Controller
{

    public function list()
    {
        $data['auth'] = Auth::user();
        $data['product'] = Product::orderBy('create_at','DESC')->paginate(12);
        $data['site'] = Site::find('1');
        $data['payment'] = Payment::where('status','=','1')->get();
        return view('frontend.product_list.main', $data);
    }

    public function product_find(Request $request)
    {
        $data['product'] = Product::where('name', 'like', '%'.Request::get('keyword').'%')->paginate(12);


        $data['auth'] = Auth::user();
        $data['site'] = Site::find('1');
        $data['payment'] = Payment::where('status','=','1')->get();
        // dd($data);
        return view('frontend.product_list.main', $data);
    }

    public function product_detail($id)
    {
        $data['auth'] = Auth::user();
        $data['site'] = Site::find('1');
        $data['payment'] = Payment::where('status','=','1')->get();
        // $data['contact'] = DB::table('contact')->get();
        $data['product'] = Product::find($id);
        $data['category'] = DB::table('product')
                            ->where('id_product', '=', $id)
                            ->select('product.id_product','category.*')
                            ->join('category', 'product.id_category', '=', 'category.id_category')
                            ->first();
        $data['faq'] = Faq::where('status','=','1')->get();

        // dd($data);
        return view('frontend.detail.main', $data);
    }

    public function contact()
    {
        $data['auth'] = Auth::user();
        $data['site'] = Site::find('1');
        $data['payment'] = Payment::where('status','=','1')->get();

        $data['contact'] = Contact::find('1')->first();
        $data['special'] = Faq::where('status','=','1')->get();
        return view('frontend.contact.main', $data);
    }

    public function faq()
    {
        $data['auth'] = Auth::user();
        $data['site'] = Site::find('1');
        $data['payment'] = Payment::where('status','=','1')->get();

        $data['regular'] = Faq::where('status','=','0')->get();
        $data['special'] = Faq::where('status','=','1')->get();
        return view('frontend.faq.main', $data);
    }

    public function blog()
    {
        $data['auth'] = Auth::user();
        $data['site'] = Site::find('1');
        $data['payment'] = Payment::where('status','=','1')->get();

        $data['blog'] = Blog::orderBy('create_at', 'DESC')->get();
        $data['latest_blog'] = Blog::latest('create_at')->first();
        return view('frontend.blog.main', $data);
    }

    public function detail_blog($id)
    {
        $data['auth'] = Auth::user();
        $data['site'] = Site::find('1');
        $data['payment'] = Payment::where('status','=','1')->get();

        $data['blog'] = Blog::find($id)->first();
        return view('frontend.blog.detail', $data);
    }

    public function subscription()
    {
        Mail::to("official.dityastore@gmail.com")->send(new Subscription());
 
        return redirect('/')->with(['success' => 'Thank You, Now Youre Our Subscription']);
    }
}
