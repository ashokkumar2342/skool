<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Model\Library\MemberTicketDetails;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;
use Illuminate\Http\Request;
use PDF;
class TicketController extends Controller
{
    public function index()
    {
    	$memberTicketDetails=MemberTicketDetails::orderBy('id','ASC')->get();
    	 return view('admin.library.ticket.ticket_card',compact('memberTicketDetails')); 
    }
    public function generate(Request $request)
    {
        $tickets= $request->ticket_no;
      foreach ($tickets as  $value) { 
	       $barcode = new BarcodeGenerator();
	       $barcode->setText($value);
	       $barcode->setType(BarcodeGenerator::Code128);
	       $barcode->setScale(2);
	       $barcode->setThickness(25);
	       $barcode->setFontSize(10);
	       $code = $barcode->generate();
	       $data = base64_decode($code);
	       $image_name= $value.'.png';     
	       $path = Storage_path() . "/app/student/library/";       
         $paths = Storage_path() . "/app/student/library/" . $image_name;
         @mkdir($path, 0755, true);        
	       file_put_contents($paths, $data);  
	       $imgs[$value]=$code; 
	       $memberTicketDetails=MemberTicketDetails::where('ticket_no',$value)->first();
	       $memberTicketDetails->barcode=$image_name;
	       $memberTicketDetails->save();
       }
     $memberTicketDetails=MemberTicketDetails::whereIn('ticket_no',$request->ticket_no)->get();
	 $customPaper = array(0,0,132.00,202.80);
     $pdf = PDF::loadView('admin.library.ticket.card',compact('memberTicketDetails'))->setPaper($customPaper, 'landscape'); 
      return $pdf->stream('student_all_report.pdf');
    }
    public function barcode($barcode)
    {
    	 $img = Storage::disk('student')->get('library/'.$barcode);
        return response($img);
    }
}
