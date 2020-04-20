<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Blog;
use App\Site;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['site'] = Site::find('1');
        $data['blog'] = Blog::orderBy('create_at','DESC')->get();
        return view('backend.blog.main', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['site'] = Site::find('1');
        return view('backend.blog.post', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'thumbnail' => 'mimes:png|dimensions:width=520,height=400',
            'title' => 'required|max:225',
            'content' => 'required',
        ]);
        $create_by = Auth::user()->name;
        $create_at = date('d M Y');
        $title = $request->title;
        $content = $request->content;
        $thumbnail = $request->file('thumbnail');

        $thumbnail_name = 'thumbnail'.time().$thumbnail->getClientOriginalName();
        $thumbnail->move(public_path().'/thumbnail_blog/', $thumbnail_name); 

        $blog = new Blog;
        $blog->create_by = $create_by;
        $blog->create_at = $create_at;
        $blog->thumbnail = $thumbnail_name;
        $blog->title = $title;
        $blog->content = $content;
        $save = $blog->save();

        if ($save) {
            return redirect('ip-admin/blog/post')->with('success','Data Success Di Tambah');
        }
        return redirect('ip-admin/blog/post')->with('erorr','Data Gagal Di Tambah');
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
