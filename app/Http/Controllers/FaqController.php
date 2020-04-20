<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;
use App\Site;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['faq'] = Faq::get();
        $data['site'] = Site::find('1');
        return view('backend.faq.main',$data);
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
            'title' => 'required|max:225',
            'answer' => 'required',

        ]);

        $faq = $request->faq;

        foreach ($faq as $faq1) {
            $faq_table = new Faq;
            $faq_table->fill($faq1);
            $faq_table->save();
            
        }

        return redirect('ip-admin/faq');
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
        $data['faq'] = Faq::find($id);
        return view('backend.faq.edit',$data);
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
            'title' => 'required|max:225',
            'answer' => 'required',

        ]);
        $faq = Faq::find($id);
        $faq->fill($request->all());
        $update = $faq->update();

        if ($update) {
            return redirect('ip-admin/faq');
        }else{
            return redirect('ip-admin/faq/edit/'.$id);
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
        $faq = Faq::find($id);
        $faq->delete();

        return redirect('ip-admin/faq');
    }
}
