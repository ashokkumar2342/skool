<?php

namespace App\Http\Controllers\Admin;
use App\Model\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Storage;

class StudentDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
           
          $rules=[
            "file" => "required|mimes:pdf|max:10000",
            'document_type_id' => 'required',
          ];

          $validator = Validator::make($request->all(),$rules);
          if ($validator->fails()) {
              $errors = $validator->errors()->all();
              $response=array();
              $response["status"]=0;
              $response["msg"]=$errors[0];
              return response()->json($response);// response as json
          } 
         $file = $request->file('file');
         $file->store('public/document');
         $document = new Document();
         $document->name = $file->hashName();        
         $document->student_id = $request->student_id;        
         $document->document_type_id = $request->document_type_id;        

          $document->save();
        $response=['status'=>1,'msg'=>'Upload Document Successfully'];
        return response()->json($response);  
    


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        if($document->delete()){   
            return redirect()->back()->with(['class'=>'success','message'=>' Delete document success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
    public function download(Document $document)
    {      
      // $img = Storage::disk('student')->get('document/'.$document->name);
      //   return response()->download($img);
    $path = storage_path('app/student/document/'.$document->name);

    return response()->stream($path);
         
    }
}
