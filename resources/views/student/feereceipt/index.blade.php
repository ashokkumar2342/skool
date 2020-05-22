  @extends('admin.layout.base')
  @section('body')
    <!-- Main content -->
    <section class="content-header">     
      <h1>Fee Receipt<small>List</small> </h1>       
      </section>  
      <section class="content">
        <div class="box"> 
             <div class="box-body">
             <form  action="{{ route('student.fee.receipt,show') }}" class="add_form" no-reset="true" method="post" success-content-id="fee_receipt_download_list"> 
                   {{ csrf_field() }}
                   @php
                    $userIdBySibling=new App\Helper\MyFuncs();    
                    $siblings= $userIdBySibling->getSiblingById(); 
                    $students=App\Student::whereIn('id',$siblings)->get();
                   @endphp
                      <div class="col-lg-4">                           
                           <div class="form-group">
                            <label>Student</label>
                            <select class="form-control" name="student_id">
                              <option value="">Select Student</option>
                              @foreach ($students as $student)
                              <option value="{{$student->id}}">{{$student->registration_no}}--{{$student->name}}</option>
                              @endforeach
                            </select>
                           </div>    
                      </div>
                      <div class="col-lg-4">     
                           <div class="form-group"> 
                             <label >Show For</label>  
                             <select name="show_for" id="fee_paid_upto" class="form-control">
                                <option value="1">All</option>
                                <option value="2">Month Wise</option>
                             </select>
                           </div> 
                           {{-- <button type="button" id="fee_collection_details_btn" class="btn btn-warning" >Show</button> --}} 
                      </div>                                                     
                     <div class="col-lg-4 form-group"> 
                     <input class="btn btn-success form-control" type="submit" style="margin-top: 24px" value="Show Receipt"> 
                    </div>                     
                  </form>
                  <div id="fee_receipt_download_list">
                    
                  </div>
             </div>
        </div>    
      </section>
      <!-- /.content -->

  @endsection
  @push('links')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">

  @endpush
  @push('scripts')
  <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript">
       $(document).ready(function(){
          $('#previos_receipt_data_table').DataTable();
      }); 
    </script>
  @endpush
       
   
   