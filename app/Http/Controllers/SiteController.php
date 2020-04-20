<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use DB;
use App\Payment;

class SiteController extends Controller
{
    public function index()
    {
        $data['site1'] = Site::get();
        $data['payment'] = Payment::get();
        $data['site'] = Site::find('1');
        // dd($data);
        return view('backend.site_setting.main',$data);
    }
    public function updatesite(Request $request)
    {
        $this->Validate($request,[
            'logo' => 'mimes:jpeg,png,jpg',
            'vaficon' => 'mimes:jpeg,png,jpg',
            'site_name' => 'required|max:225',

        ]);

        // dd($request->all());
        $logo = $request->file('logo');
        $vaficon = $request->file('vaficon');
        $site_name = $request->site_name;

        if ($logo&&$vaficon) {
            $logo_name = time().'-'.$logo->getClientOriginalName();
            $vaficon_name = time().'-'.$vaficon->getClientOriginalName();

            $logo->move(public_path().'/site/', $logo_name); 
            $vaficon->move(public_path().'/site/', $vaficon_name);  

            $site = Site::where('id_site', '=', 1)
                    ->update([
                        'logo' => $logo_name,
                        'vaficon' => $vaficon_name,
                        'site_name' => $site_name
                    ]);
            return redirect('ip-admin/site');
        }elseif($logo) {

            $logo_name = time().'-'.$logo->getClientOriginalName();
            $logo->move(public_path().'/site/', $logo_name);  
            Site::where('id_site', '=', 1)
                ->update([
                    'logo' => $logo_name,
                    'site_name' => $site_name
                ]);
            return redirect('ip-admin/site');

        }elseif($vaficon){

            $vaficon_name = time().'-'.$vaficon->getClientOriginalName();
            $vaficon->move(public_path().'/site/', $vaficon_name);  
            Site::where('id_site', '=', 1)
                ->update([
                    'vaficon' => $vaficon_name,
                    'site_name' => $site_name
                ]);
            return redirect('ip-admin/site');
        }else{
            Site::where('id_site', '=', 1)
                ->update([
                    'site_name' => $site_name
                ]);
            return redirect('ip-admin/site');
    }

    // public function edit_payment($id)
    // {
        // $data['payment'] = Payment::find($id);
        // return view('backend.site_setting.paymentedit',$data);
    // }

    


        
        // else{
        //     $logo_name = time().'-'.$logo->getClientOriginalName();
        //     $vaficon_name = time().'-'.$vaficon->getClientOriginalName();

        //     $logo->move(public_path().'/site/', $logo_name); 
        //     $vaficon->move(public_path().'/site/', $vaficon_name);  

        //     $site = Site::where('id_site', '=', 1)
        //             ->update([
        //                 'logo' => $logo_name,
        //                 'vaficon' => $vaficon_name,
        //                 'site_name' => $site_name
        //             ]);
        //     return redirect('ip-admin');
        // }
    }
    public function store_payment(Request $request)
    {
        $this->Validate($request,[
            'image' => 'required|mimes:jpeg,png,jpg,svg',
            'name' => 'required|max:225',

        ]);

        $payment = $request->image;
        $name = $request->name;

        // dd($request->all());

        $payment_name = time().'-'.$payment->getClientOriginalName();
        $payment->move(public_path().'/site/payment/', $payment_name);  

        $pay = new Payment;
        $pay->image = $payment_name;
        $pay->name = $name;
        // $pay->status = '1';
        $pay->save();

        return redirect('ip-admin/site');
    }
    public function delete_payment($id)
    {
        $pay = Payment::find($id);
        $pay->delete();

        return redirect('ip-admin/site');
    }
    public function edit_payment($id)
    {

        $data['site'] = Site::find('1');
        $data['payment'] = Payment::find($id);
        return view('backend.site_setting.paymentedit',$data);
    }
    public function update_payment(Request $request, $id)
    {
        $this->Validate($request,[
            'image' => 'required|mimes:jpeg,png,jpg,svg',
            'name' => 'required|max:225',

        ]);
        
        $payment = Payment::find($id);

        $image = $request->image;
        $name = $request->name;
        $status = $request->status;

        if ($image) {
            $image_name = time().'-'.$image->getClientOriginalName();
            $image->move(public_path().'/site/payment/', $image_name);
            $payment->image = $image_name;
        }

        $payment->name = $name;
        $payment->status = $status;
        $update = $payment->update();

        if ($update) {
            return redirect('ip-admin/site');
        }else{
            return redirect('ip-admin/site/'.$id);
        }
    }
}
