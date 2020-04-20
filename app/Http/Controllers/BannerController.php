<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Site;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['site'] = Site::find('1');

        $data['banner'] = Banner::find('1')->first();
        return view('backend.banner.main', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function update(Request $request)
    {
        $this->validate($request, [
            'image' => 'dimensions:width=570,height=555',
            'title' => 'required|max:225',
            'description' => 'required|max:225',
        ]);

        $image = $request->file('image');
        $title = $request->title;
        $description = $request->description;

        $banner = Banner::find('1');

        if ($image) {
            $image_name = time().'-'.$image->getClientOriginalName();
            $image->move(public_path().'/site/banner/', $image_name);
            $banner->image = $image_name;
        }


        $banner->title = $title;
        $banner->description = $description;
        $update = $banner->update();

        if ($update) {
            return redirect('ip-admin/banner')->with('success', 'Thanks For Update Banner Data');
        }else{
            return redirect('ip-admin/banner')->with('erorr', 'Faile For Update Banner Data');
        }
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
