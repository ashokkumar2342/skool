<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Model\Library\Author;
use App\Model\Library\BookCategory;
use App\Model\Library\Booktype;
use App\Model\Library\Publisher;
use App\Model\SubjectType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BooksController extends Controller
{
     public function index()
    {
    	
    	// $subjects = SubjectType::orderBy('name','asc')->get();
    	// $publishers = Publisher::orderBy('name','asc')->get();
    	// $authors = Author::orderBy('name','asc')->get();
    	 return view('admin.library.books.books_details');
    } 
    public function addForm()
    {
      
      $subjects = SubjectType::orderBy('name','asc')->get();
      $publishers = Publisher::orderBy('name','asc')->get();
      $authors = Author::orderBy('name','asc')->get();
      $BookCategorys= BookCategory::orderBy('code','ASC')->get();
       return view('admin.library.books.books_details_add_form',compact('subjects','publishers','authors','booktypes','BookCategorys'));
    }

    public function store(Request $request)
    {
    	 $rules=[
          
            'name' => 'required',
            'code' => "required|max:12|unique:booktypes,code", 
            'edition' => 'required', 
            'price' => 'required', 
            'no_of_pages' => 'required', 
            'hall_no' => 'required', 
            'shelf_no' => 'required', 
            'box_no' => 'required', 
            'subject' => 'required', 
            'publisher' => 'required', 
            'author' => 'required', 
            'category' => 'required', 
             'image' => 'mimes:jpeg,jpg,png,gif|max:5000'
            
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

            if ($request->hasFile('image')) { 
                $image=$request->image;
                $filename='book'.date('d-m-Y').time().'.jpg'; 
                $image->storeAs('student/library/bookimage/',$filename);
                $booktype=new Booktype();
                $booktype->image=$filename;
                $booktype->code=$request->code;
                $booktype->name=$request->name;
                $booktype->edition=$request->edition;
                $booktype->price=$request->price;
                $booktype->no_of_pages=$request->no_of_pages;
                $booktype->hall_no=$request->hall_no;
                $booktype->shelf_no=$request->shelf_no;
                $booktype->box_no=$request->box_no;
                $booktype->subject_id=$request->subject;
                $booktype->publisher_id=$request->publisher;
                $booktype->author_id=$request->author;
                $booktype->category_id=$request->category;
                $booktype->feature=$request->feature;
                $booktype->save();
               $response=['status'=>1,'msg'=>'Created Successfully'];
                return response()->json($response);
             
            }
            else{
               $booktype= new Booktype(); 
               $booktype->code=$request->code;
               $booktype->name=$request->name;
               $booktype->edition=$request->edition;
               $booktype->price=$request->price;
               $booktype->no_of_pages=$request->no_of_pages;
               $booktype->hall_no=$request->hall_no;
               $booktype->shelf_no=$request->shelf_no;
               $booktype->box_no=$request->box_no;
               $booktype->subject_id=$request->subject;
               $booktype->publisher_id=$request->publisher;
               $booktype->author_id=$request->author;
               $booktype->category_id=$request->category;
               $booktype->feature=$request->feature;
               $booktype->save();
              $response=['status'=>1,'msg'=>'Created Successfully'];
               return response()->json($response);  
            }
         }
    }
    public function tableShow($value='')
    { 
        $booktypes=Booktype::all();
         return view('admin.library.books.books_table',compact('booktypes'));
    }
    public function bookImageShow(Request $request,$image)
     {
         $bookImage = Storage::disk('student')->get('library/bookimage/'.$image);           
         return  response($bookImage)->header('Content-Type', 'image/jpg');
     }

    public function edit($id)
    {
    	$booktypes= Booktype::find($id);
    	$subjects = SubjectType::orderBy('name','asc')->get();
    	$publishers = Publisher::orderBy('name','asc')->get();
    	$authors = Author::orderBy('name','asc')->get();
      $BookCategorys= BookCategory::orderBy('code','ASC')->get();
    	 return view('admin.library.books.books_details_edit',compact('subjects','publishers','authors','booktypes','BookCategorys'));
    }

    public function destroy($id)
    {
    	$booktypes= Booktype::find($id);
    	$booktypes->delete();
    	 return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']); 
    }

    public function update(Request $request,$id)
    {
    $rules=[
          
            'name' => 'required', 
            'code' => "required|max:12|unique:booktypes,code,".$id.'', 
            'edition' => 'required', 
            'price' => 'required',
            'hall_no' => 'required', 
            'shelf_no' => 'required', 
            'box_no' => 'required',  
            
            'subject' => 'required', 
            'publisher' => 'required', 
            'author' => 'required', 
            'image' => 'mimes:jpeg,jpg,png,gif|max:5000'
            
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

            if ($request->hasFile('image')) { 
                $image=$request->image;
                $filename='book'.date('d-m-Y').time().'.jpg'; 
                $image->storeAs('student/library/bookimage/',$filename);
                $booktype= Booktype::find($id);
                $booktype->image=$filename;
                $booktype->code=$request->code;
                $booktype->name=$request->name;
                $booktype->edition=$request->edition;
                $booktype->price=$request->price;
                $booktype->no_of_pages=$request->no_of_pages;
                $booktype->hall_no=$request->hall_no;
                $booktype->shelf_no=$request->shelf_no;
                $booktype->box_no=$request->box_no;
                $booktype->subject_id=$request->subject;
                $booktype->publisher_id=$request->publisher;
                $booktype->author_id=$request->author;
                $booktype->category_id=$request->category;
                $booktype->feature=$request->feature;
                $booktype->save();
               $response=['status'=>1,'msg'=>'Update Successfully'];
                return response()->json($response);
             
            }
            else{
               $booktype= Booktype::find($id); 
               $booktype->code=$request->code;
               $booktype->name=$request->name;
               $booktype->edition=$request->edition;
               $booktype->price=$request->price;
               $booktype->no_of_pages=$request->no_of_pages;
               $booktype->hall_no=$request->hall_no;
               $booktype->shelf_no=$request->shelf_no;
               $booktype->box_no=$request->box_no;
               $booktype->subject_id=$request->subject;
               $booktype->publisher_id=$request->publisher;
               $booktype->author_id=$request->author;
               $booktype->category_id=$request->category;
               $booktype->feature=$request->feature;
               $booktype->save();
              $response=['status'=>1,'msg'=>'Update Successfully'];
               return response()->json($response);  
            }
    }
}

 //-----------------------book-Category-------------------------
    public function bookCategory(){
    $BookCategorys= BookCategory::orderBy('code','ASC')->get();
    return view('admin.library.bookCategory.index',compact('BookCategorys'));
    }
    public function bookCategoryAddForm($id=null){
    if ($id==null) {
     $BookCategory='';
    }
    if ($id!=null) {
     $BookCategory= BookCategory::find(Crypt::decrypt($id));
    }
    return view('admin.library.bookCategory.add_form',compact('BookCategory'));
    }
    public function bookCategoryStore(Request $request,$id=null)
    {
    $rules=[
          
            'category_name' => "required|max:30|unique:book_categories,name,".$id, 
            'code' => "required|max:3|unique:book_categories,code,".$id, 
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
                $BookCategory= BookCategory::firstOrNew(['id'=>$id]);
                $BookCategory->name=$request->category_name;
                $BookCategory->code=$request->code;
                $BookCategory->description=$request->description;
                $BookCategory->save();
               $response=['status'=>1,'msg'=>'Submit Successfully'];
                return response()->json($response);
             
            }
            
    }
    public function bookCategoryDelete($id)
    {  
        $id =Crypt::decrypt($id);
        $BookCategory =BookCategory::find($id);
        $BookCategory->delete();
         return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }
}
