<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\PaymentMode;
use Illuminate\Http\Request;

class OtherReceiptController extends Controller
{
    public function index()
    {
    	$paymentModes=PaymentMode::all();
    	return view('admin.finance.otherreceipt.index',compact('paymentModes'));
    }
    public function addForm($id=null)
    {
    	$paymentModes=PaymentMode::all();
    	return view('admin.finance.otherreceipt.add_form',compact('paymentModes'));
    }
}
