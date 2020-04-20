<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Site;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['product'] = Product::get();
        $data['site'] = Site::find('1');
        return view('backend.product.main',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['category'] = Category::get();
        $data['site'] = Site::find('1');
        return view('backend.product.create', $data);
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
            'thumbnail' => 'required|mimes:jpeg,png,jpg',
            'image' => 'required',
            'image.*.*' => 'image|mimes:jpeg,png,jpg',
            'name' => 'required|max:225',
            'id_category' => 'required',
            'price' => 'required',
            'description' => 'required|max:1500',
            'feature' => 'required',
            'checkout' => 'required'
        ]); 

        $thumbnail = $request->file('thumbnail');
        $gambar = $request->image;
        $name = $request->name;
        $id_category = $request->id_category;
        $price = $request->price;
        $description = $request->description;
        $feature = $request->feature;
        $file = $request->file;
        $date = date('Y-m-d H:i:s');
        $checkout = $request->checkout;

        $product = new Product;

        $thumbnail_name = 'thumbnail'.time().$thumbnail->getClientOriginalName();
        $thumbnail->move(public_path().'/product/thumbnail/', $thumbnail_name);  
        
            foreach($gambar as $images)
            {
                foreach ($images as $images2) {
                    $img_name = time().'-'.$images2->getClientOriginalName();
                    $images2->move(public_path().'/product/', $img_name);  
                    $img_name1[] = $img_name;
                 } 
            }

            foreach ($feature as $feature1) {
                foreach ($feature1 as $feature2) {
                    $feature_name = $feature2;
                    $feature_name1[] = $feature_name;
                }
            }

            if (is_null($file)) {
            }else{
                $file_name = time().'-'.$file->getClientOriginalName();
                $file->move(public_path().'/product/file/', $file_name); 
                $product->file =  $file_name;
            }

        $product->checkout = $checkout;
        $product->best_item = $request->best_item;
        $product->create_at = $date;
        $product->thumbnail =  $thumbnail_name;
        $product->image = json_encode($img_name1);
        $product->name =  $name;
        $product->id_category =  $id_category;
        $product->price =  $price;
        $product->description =  $description;
        $product->feature =  json_encode($feature_name1);
        $save = $product->save();
        // dd($product);    

        if ($save) {
            return redirect('ip-admin/product');
        }else{
            return redirect('ip-admin/product/add');
        }
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

        $data['category'] = Category::get();
        $data['product'] = Product::find($id);
        // dd($data);
        return view('backend.product.edit', $data);

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
        $this->validate($request, [
            'thumbnail' => 'mimes:jpeg,png,jpg|dimensions:width=520,height=400',
            'image.*.*' => 'mimes:jpeg,png,jpg|dimensions:width=950,height=500',
            'name' => 'required|max:225',
            'id_category' => 'required',
            'price' => 'required',
            'description' => 'required|max:1500',
            'feature' => 'required',
            'checkout' => 'required',
        ]); 

        
        $thumbnail = $request->file('thumbnail');
        $gambar = $request->image;
        $name = $request->name;
        $id_category = $request->id_category;
        $price = $request->price;
        $description = $request->description;
        $feature = $request->feature;
        $file = $request->file;
        $checkout = $request->checkout;

        $product = Product::find($id);

            if (is_null($thumbnail)) {
                
            }else{
                $thumbnail_name = 'thumbnail'.time().$thumbnail->getClientOriginalName();
                $thumbnail->move(public_path().'/product/thumbnail/', $thumbnail_name);
                $product->thumbnail =  $thumbnail_name; 
            }

            if ($gambar) {
                foreach($gambar as $images)
                {
                    foreach ($images as $images2) {
                        $img_name = time().'-'.$images2->getClientOriginalName();
                        $images2->move(public_path().'/product/', $img_name);  
                        $img_name1[] = $img_name;
                        $product->image = json_encode($img_name1);
                     } 
                }
            }
        
            

            foreach ($feature as $feature1) {
                foreach ($feature1 as $feature2) {
                    $feature_name = $feature2;
                    $feature_name1[] = $feature_name;
                    $product->feature =  json_encode($feature_name1);
                }
            }

            if (is_null($file)) {
            }else{
                $file_name = time().'-'.$file->getClientOriginalName();
                $file->move(public_path().'/product/file/', $file_name); 
                $product->file =  $file_name;
            }
        
        $product->best_item = $request->best_item;
        $product->checkout = $checkout;
        $product->name =  $name;
        $product->id_category =  $id_category;
        $product->price =  $price;
        $product->description =  $description;
        // dd($request->all());
        $update = $product->update();

        if ($update) {
            return redirect('ip-admin/product');
        }else{
            return redirect('ip-admin/product/edit/'.$id);
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
    public function file()
    {
        
    }
}
