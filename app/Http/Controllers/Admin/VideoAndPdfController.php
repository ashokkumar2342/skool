<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Room\RoomType;
use App\Model\VideoAndPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class VideoAndPdfController extends Controller
{
    public function index($value='')
    {
    	$videos=VideoAndPdf::where('status',1)->get();
    	$pdfs=VideoAndPdf::where('status',2)->get();
    	return view('admin.video.index',compact('videos','pdfs'));
    }
    public function pdf()
    {
    	$pdfs=VideoAndPdf::where('status',2)->get();
    	return view('admin.video.pdf',compact('videos','pdfs'));
    }
    public function upload(Request $request)
    {
    $rules=[
          
            
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
        else {
    	if ($request->hasFile('video')) { 
                $video=$request->video;
                $filename='video'.date('d-m-Y').time(); 
                $video->storeAs('student/videopaf/',$filename);
                $VideoAndPdf=new VideoAndPdf();
                $VideoAndPdf->path=$filename;
                $VideoAndPdf->status=1;
                $VideoAndPdf->save();
                return redirect()->back()->with(['message'=>'Upload Successfully','class'=>'success']);
         } 
         if ($request->hasFile('pdf')) {
                $pdf=$request->pdf;
                $filename='pdf'.date('d-m-Y').time().'.pdf'; 
                $pdf->storeAs('student/videopaf/',$filename);
                $VideoAndPdf=new VideoAndPdf();
                $VideoAndPdf->path=$filename;
                $VideoAndPdf->status=2;
                $VideoAndPdf->save();
                $response=['status'=>1,'msg'=>'Upload Successfully'];
                return response()->json($response);
         } 
        }      
    }
    public function play(Request $request,$path)
    {
    	$paths = Storage_path() . '/app/student/videopaf/'.$path; 
        return response()->file($paths); 
    }
    public function destroy($id)
    {
       $VideoAndPdf=VideoAndPdf::find(Crypt::decrypt($id));
       $VideoAndPdf->delete();
       return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);

    }
}
