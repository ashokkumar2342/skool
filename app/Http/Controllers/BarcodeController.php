<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    public function barcode(Request $request)
    { 

       
       $input = $request->barcode; 
       
       if (strlen($input)==0) {
         echo 'no input';
         exit;
       }

       $datas = explode("\n", str_replace("\r", "", $input)); 
       foreach ($datas as $key => $value) {
         $barcode =$value;
         $name = $barcode.".jpg";
 
         $url ='https://barcode.tec-it.com/barcode.ashx?data='.$barcode.'&code=Code128&dpi=96&dataseparator=';
 
         $url ='https://barcode.tec-it.com/barcode.ashx?data='.$barcode.'&code=Code128&multiplebarcodes=false&translate-esc=false&unit=Fit&&dpi=96&imagetype=Jpg&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0';
 
         $file = file_put_contents( $name, file_get_contents($url) );

         if(!$file){
             return "ERROR: Failed to write data to ".$name.", check permissions\n";
         }
         else
         {
                       
         $path = $name;
         $type = pathinfo($path, PATHINFO_EXTENSION);
         $data = file_get_contents($path);
         $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data); 
         $data = base64_decode(base64_encode($data));
           $image_name= $name;     
           $path = Storage_path() . "/app/public/barcode/" . $image_name;
           file_put_contents($path, $data);  
           if ($value!=null) {
               sleep(1); 
           }
            
         }  

        } 
        return redirect()->back(); 

    
    }

     public function barcodeShow()
    {
        return view('barcode');
    } 

     public function barcodeFirst()
    {
        return view('barcode_first');
    }
}
