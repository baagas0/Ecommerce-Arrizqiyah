<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use App\Contact;

class MemberAreaController extends Controller
{
    public function index()
    {
    	$data['site'] = Site::find('1');
    	$data['contact'] = Contact::find('1');
    	return view('member-area.index',$data);
    }
    public function account()
    {
    	$data['site'] = Site::find('1');
    	$data['contact'] = Contact::find('1');
    	return view('member-area.account.edit', $data);
    }
}
