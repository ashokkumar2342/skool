@extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@section('body')
<section class="content-header">
    <h1> Student Show<small>Details</small> </h1>
       @includeIf('admin.include.hot_menu', ['menu_type_id' => 3])
       
</section>
    <section class="content">        
        {{Form::close()}}
      	<div class="box">        
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12 ">                  
                        {{-- {{ Form::open(['route'=>'admin.student.excel.store']) 'method'=>'POST','files'=>'true' }} --}}
                
                        <form action="{{ route('admin.student.list',$menuPermission->id) }}" success-content-id="student_result_list" method="post" class="add_form" no-reset="true" data-table="student_list_table"> 
                        {{ csrf_field() }}                            
                             <div class="row">{{--row start --}}
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">                                          
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
                                             <div class="col-lg-3" style="padding-top: 20px;">                         
                                                <div class="form-group">
                                                  <button id="student_details_show" class="btn btn-success">Show</button>
                                                    
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>

                        {{ Form::close() }}
                          <div class="row">
                           <div class="col-lg-12"  id="student_result_list">
                                
                            </div> 
                         </div>
                         
                        
                    </div>

                </div>
            </div>
          
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

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