<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Site;
use Validate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['site'] = Site::find('1');
        $data['category'] = Category::get();
        return view('backend.category.main', $data);
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

        $this->Validate($request,[
            'category' => 'required'
        ]);

        // dd($request->category);

        foreach ($request->category as $category1) {
            foreach ($category1 as $category2) {
                $category = new Category;
                $category->name = $category2;
                $save = $category->save();               
            }
        }


        return redirect('ip-admin/category');
        
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
        $data['site'] = Site::find('1');
        
        $data['category'] = Category::find($id);
        return view('backend.category.update', $data);
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
        $this->Validate($request,[
            'category' => 'required'
        ]);
        $category = category::find($id);
        $category->name = $request->name;
        $category->update();

        return redirect('ip-admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('ip-admin/category');
    }
}
