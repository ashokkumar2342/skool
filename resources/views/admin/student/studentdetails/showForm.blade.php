@extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@section('body')
<section class="content-header">
    <h1> Student Show<small>Details</small> </h1>
       
       
</section>
    <section class="content">        
       <div class="box"> 
            <div class="box-body">
              <div class="card card-primary card-outline"> 
                <div class="card-body">
                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Class/Section</a></li>
                    <li><a data-toggle="tab" href="#menu1">Registration No.</a></li>
                    <li><a data-toggle="tab" href="#menu2">Application No.</a></li>
                    {{-- <li><a data-toggle="tab" href="#menu3">Search</a></li> --}}
                  </ul> 
                  <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                       <form action="{{ route('admin.student.list',[$menuPermission->id,1]) }}" success-content-id="student_search_list" method="post" class="add_form" no-reset="true" data-table="student_list_table"> 
                        {{ csrf_field() }}                            
                             <div class="row" style="margin-top: 20px">                            
                                 <div class="col-lg-3">                         
                                    <div class="form-group">
                                        {{ Form::label('class','Class',['class'=>' control-label']) }}
                                        {!! Form::select('class',$classes, null, ['class'=>'form-control','placeholder'=>'Select Class','required']) !!}
                                        <p class="text-danger">{{ $errors->first('session') }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-3">                         
                                    <div class="form-group">
                                        {{ Form::label('section','Section',['class'=>' control-label']) }}
                                        {!! Form::select('section',[], null, ['class'=>'form-control','placeholder'=>'Select Section','required']) !!}
                                        <p class="text-danger">{{ $errors->first('session') }}</p>
                                    </div>
                                </div> 
                                 <div class="col-lg-3" style="padding-top: 24px;">                         
                                    <div class="form-group">
                                      <button id="student_details_show" class="btn btn-success">Show</button>
                                        
                                    </div>
                                </div>    
                              </div> 
                        </form>
                          <div class="row">
                           <div class="col-lg-12"  id="student_result_list"> 
                            </div> 
                         </div>  
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <form action="{{ route('admin.student.list',[$menuPermission->id,2]) }}" success-content-id="student_search_list" method="post" class="add_form" no-reset="true" data-table="student_list_table" call-jquery-default="true"> 
                        {{ csrf_field() }}                            
                             <div class="row" style="margin-top: 20px">                            
                                 <div class="col-lg-4">                         
                                    <div class="form-group">
                                        {{ Form::label('class','Registration No',['class'=>' control-label']) }}
                                        <input type="text" name="student_id" class="form-control" placeholder="Enter Registration No">
                                        <p class="text-danger">{{ $errors->first('session') }}</p>
                                    </div>
                                </div> 
                                 <div class="col-lg-3" style="padding-top: 24px;">                         
                                    <div class="form-group">
                                      <button id="btn_student_details_show" class="btn btn-success">Show</button>
                                        
                                    </div>
                                </div>    
                              </div> 
                        </form>
                          <div class="row">
                           <div class="col-lg-12"  id="student_list"> 
                            </div> 
                         </div>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <form action="{{ route('admin.student.list',[$menuPermission->id,3]) }}" success-content-id="student_search_list" method="post" class="add_form" no-reset="true" data-table="student_list_table" call-jquery-default="true"> 
                        {{ csrf_field() }}                            
                             <div class="row" style="margin-top: 20px">                            
                                 <div class="col-lg-4">                         
                                    <div class="form-group">
                                        {{ Form::label('class','Application No',['class'=>' control-label']) }}
                                        <input type="text" name="application_no" class="form-control" placeholder="Enter Application No.">
                                        <p class="text-danger">{{ $errors->first('session') }}</p>
                                    </div>
                                </div> 
                                 <div class="col-lg-3" style="padding-top: 24px;">                         
                                    <div class="form-group">
                                      <button id="btn_student_details_show" class="btn btn-success">Show</button>
                                        
                                    </div>
                                </div>    
                              </div> 
                        </form>
                          <div class="row">
                           <div class="col-lg-12"  id="student_list"> 
                            </div> 
                         </div>
                    </div>
                    
                     
              </div> 
               <div class="row">
                <div class="col-lg-12"  id="student_search_list"> 
                 </div> 
              </div> 

</div>
</div>
</div>












      

    </section>
    <!-- /.content -->
@endsection
 @push('scripts')
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
    $( ".datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
    $("#class").change(function(){
        $('#section').html('<option value="">Searching ...</option>');
        $.ajax({
          method: "get",
          url: "{{ route('admin.manageSection.search') }}",
          data: { id: $(this).val() }
        })
        .done(function( response ) {            
            if(response.length>0){
                $('#section').html('<option value="">Select Section</option>');
                for (var i = 0; i < response.length; i++) {
                    $('#section').append('<option value="'+response[i].id+'">'+response[i].name+'</option>');
                } 
            }
            else{
                $('#section').html('<option value="">Not found</option>');
            }            
        });
    });
    
</script>

@endpush