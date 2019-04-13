<?php

namespace App\Http\Controllers\Admin\Barcode;

use App\Http\Controllers\Controller;
use App\Student;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;
use CodeItNow\BarcodeBundle\Utils\QrCode;
use App\Model\BarCode\BarCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;
class BarcodeController extends Controller
{
    public function index(Request $request)
    {  
      $barcodes =BarCode::all(); 
       return view('admin.barcode.barcode',compact('barcodes'));   

    } 

    public function BarcodeGenerator(Request $request){
      $rules=[
          'text_name' => 'required', 
          'generate' => 'required', 
      ]; 
      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
      } 
      if ($request->generate=='barcode') {
         $input = $request->text_name; 
         
         if (strlen($input)==0) {
           echo 'no input';
           exit;
         }

        $datas = explode("\n", str_replace("\r", "", $input)); 
        foreach ($datas as $key => $value) {        
        $barcode = new BarcodeGenerator();
        $barcode->setText($value);
        $barcode->setType(BarcodeGenerator::Code128);
        $barcode->setScale(2);
        $barcode->setThickness(25);
        $barcode->setFontSize(10);
        $code = $barcode->generate();
        $data = base64_decode($code);
        $image_name= $value.'.png';     
        $path = Storage_path() . "/app/public/barcode/" . $image_name;       
        file_put_contents($path, $data);  
        $imgs[$value]=$code;
        $this->barcodestore($image_name,$code,'barcode');
        } 
        $array = array();
        $array['status'] = 1; 
        $array['data'] =  view('admin.barcode.barcode_show',compact('imgs'))->render();
       return $array;
      }
      if ($request->generate=='qrcode') {
       return $this->QrcodeGenerator($request);
      }


       

      //return '<img src="data:image/png;base64,'.$code.'" /></br>';
    }
    public function QrcodeGenerator($request){
       $input = $request->text_name; 
       
       if (strlen($input)==0) {
         echo 'no input';
         exit;
       }

      $datas = explode("\n", str_replace("\r", "", $input));
      $imgs =array();
      foreach ($datas as $key => $value) { 
        $qrCode = new QrCode();
        $qrCode
        ->setText($value)
        ->setSize(300)
        ->setPadding(10)
        ->setErrorCorrection('high')
        ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
        ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
        ->setLabel('Scan Qr Code')
        ->setLabelFontSize(16)
        ->setImageType(QrCode::IMAGE_TYPE_PNG)
        ;
         $code = $qrCode->generate();
        $data = base64_decode($code);
          $image_name= $value.'.png';     
          $path = Storage_path() . "/app/public/barcode/" . $image_name;       
          file_put_contents($path, $data);  
          $imgs[$value]=$code;
        } 
        $array = array();
        $array['status'] = 1; 
        $array['data'] =  view('admin.barcode.barcode_show',compact('imgs'))->render();
        return $array;
      }

     public function barcodestore($imageNmae,$img_barcode,$type){
      $insbarcode = new Barcode();
      $insbarcode->img_name=$imageNmae;
      $insbarcode->img_barcode=$img_barcode;
      $insbarcode->img_base64=$img_barcode;
      $insbarcode->type=$type;
      $insbarcode->save(); 
     } 
       
           
     
}