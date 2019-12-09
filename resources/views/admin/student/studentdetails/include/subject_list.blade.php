    <!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<style type="text/css" media="screen">
     
    li{
        padding-bottom: 2px;
        padding-left: 10px;

    }

    .page-breck{
      page-break-before:always; 
    }
  
 
    @include('admin.include.boostrap')

</style>
<body>
   
   
  
    <div class="panel panel-info" style="margin-right: 8px;margin-top: 18px">
      <div class="panel-heading">
        <h4 class="panel-title" style="margin-left: 470px">
          <a data-toggle="collapse" data-parent="#accordion" href="#parent">Subject Details</a>
        </h4>
      </div>
      <div id="parent" class="panel-collapse collapse in">
        <div class="panel-body">
            <div class="row">
             <table class="table" id="subject_items">                         
                       <thead>
                           <tr>
                               <th>Subject Name</th>
                               <th>Is Optional</th>
                               <th>Action</th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach ($studentSubjects as $studentSubject)

                          <tr>
                              <td>{{ $studentSubject->SubjectTypes->name or ''}}</td>
                              <td>{{ $studentSubject->ISOptionals->name or ''}}</td>                             
                              <td>
                                {{-- <button class="btn_student_subject_edit btn btn-warning btn-xs"  data-id="{{ $studentSubject->id }}"  ><i class="fa fa-edit"></i></button>   --}}
                                  
                                    <a href="#" button-click="subject_tab" success-popup="true" onclick="callAjax(this,'{{ route('admin.studentSubject.delete',$studentSubject->id) }}')" title="Delete"class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i></a>
                          </tr>
                         @endforeach
                       </tbody>
                   </table>
                
                   
               </div> 
            </div> 
        </div>
      </div>
    </div> 
 </body>
</html>