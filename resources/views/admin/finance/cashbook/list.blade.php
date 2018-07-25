@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Cashbook </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
          {{--   <div class="box-body"> 
                <div class="row">  
                    <div class="col-md-12"> 
                      <form class="form-vertical fee_collection_form"> 
                            <div class="col-lg-2">                           
                                 <div class="form-group">
                                  {{ Form::label('student_id','Registration No',['class'=>' control-label']) }}
                                   {{ Form::select('student_id',$students,null,['class'=>'form-control student_list_select','placeholder'=>"Select Registration",'required',]) }}
                                   <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                                 </div>    
                            </div>                                                             
                           <div class="col-lg-1" style="padding-top: 20px;"> 
                           <button class="btn btn-success" type="button" id="btn_student_registration_show">Show</button>
                          </div>                     
                      </form> 
                      <div class="col-md-2" style="padding-top: 20px;">
                           <button class="btn btn-warning" type="button" id="btn_student_registration_show" data-toggle="modal" data-target="#myModal">Search</button>
                           
                      </div>
                    </div> 

                 </div>  
            </div>
           
         </div>
 --}}          <!-- /.box -->
          <div class="box">             
              <!-- /.box-header -->
              <div class="box-body">             
                  <div class="col-md-12" id="fee_collection_detail"> 
                     <table class="table">
                         
                         <thead>
                             <tr>
                                 <th> receipt no</th>
                                 <th>student name</th>
                                 <th>class</th>
                                 <th>roll no</th>
                                 <th>registration no</th>
                                 <th> father name</th>
                                 <th>receipt date</th>
                                 <th>receipt amount</th>
                                 <th>deposit amount</th>
                                 <th>balance amount</th>
                                 <th>payment mode</th>
                                 <th>payment mode date</th>
                                 <th>bank name</th>
                                 <th>on account</th>
                                 <th>Action</th>
                                
                             </tr>
                         </thead>
                         <tbody>
                            @foreach ($cashbooks as $cashbook)
                               <tr>
                                   <td>{{ $cashbook->receipt_no }}</td>
                                   <td>{{ $cashbook->student_name }}</td>
                                   <td>{{ $cashbook->class }}</td>
                                   <td>{{ $cashbook->roll_no }}</td>
                                   <td>{{ $cashbook->registration_no }}</td>
                                   <td>{{ $cashbook->father_name }}</td>
                                   <td>{{ $cashbook->receipt_date }}</td>
                                   <td>{{ $cashbook->receipt_amount }}</td>
                                   <td>{{ $cashbook->deposit_amount }}</td>
                                   <td>{{ $cashbook->balance_amount }}</td>
                                   <td>{{ $cashbook->payment_mode }}</td>
                                   <td>{{ $cashbook->payment_mode_date }}</td>
                                   <td>{{ $cashbook->bank_name }}</td>
                                   <td>{{ $cashbook->on_account }}</td> 
                                   <td>
                                    <a href="{{ route('admin.cashbook.print',$cashbook->id) }}" target="blank" class="btn btn-success btn-xs" title="print">print</a>
                                   </td>
                               </tr>  
                            @endforeach
                             
                         </tbody>
                     </table>
                  </div>  
                  <div class="col-md-12" id="fee_detail"> 
                     
                  </div>
              </div>
              <!-- /.box-body -->
           </div>
            <!-- /.box -->

            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog"> 
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Student Search</h4>
                  </div>
                  <div class="modal-body">
                    <form class="form-vertical" id="search_form"> 
                      <div class="input-group">
                        <div class="input-group-addon">  
                          <i class="fa fa-search"></i>
                        </div>
                         <input type="text" class="form-control" onkeyup="studentSearch()" name="search" id="search">
                         {{ csrf_field() }} 
                      </div>    
                    </form>
                  </div>
                  <div class="modal-footer" >
                    <table id="student_search_table"  class="display table"> 
                        <thead>
                            <tr>
                                <th>Sn</th>
                                <th>Name</th>
                                <th>Registration No</th> 
                                <th>Father's Name</th>                               
                                <th>Mother's Name</th>      
                                <th>Action</th>                                                            
                            </tr>
                        </thead>
                        <tbody id="searchResult">
                                                           
                        </tbody>
                        
                    </table>
                  </div>
                </div>

              </div>
            </div> 
    </section>
    <!-- /.content -->
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   {{-- <link rel="stylesheet" href="{{ asset('admin_asset/plugins/select2/select2.min.css') }}"> --}}
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />


<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush 
 @push('scripts')
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 {{-- <script src="{{ asset('admin_asset/plugins/select2/select2.full.min.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> 
 
   
  <script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.student_list_select').select2();
    });
  </script>
@endpush