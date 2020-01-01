<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OtherReceiptController extends Controller
{
    public function index()
    {
    	return view('admin.finance.otherreceipt.index');
    }
    public function addForm($id=null)
    {
    	return view('admin.finance.otherreceipt.add_form');
    }
}
