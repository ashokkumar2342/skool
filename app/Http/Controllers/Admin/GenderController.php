<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenderController extends Controller
{
   public function gender()
    {
       
     return view('admin.gender.gender');    
    }
}
