@extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')
<section class="content-header">
    <h1> Student Default <small>Value</small> </h1>
       @includeIf('admin.include.hot_menu', ['menu_type_id' => 3])
       </section>
    <section class="content">        
        {{Form::close()}}
      	<div class="box">        
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12 ">                  
                        {{ Form::open(['route'=>'admin.defaultValue.post']) }}                            
                             <div class="row">{{--row start --}}
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">                                          
                                             <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    {{ Form::label('academic_year','Academic Year',['class'=>' control-label']) }}
                                                    {!! Form::select('academic_year',$academicYears, @$default->academicYears->id, ['class'=>'form-control','placeholder'=>'Select Academic Year']) !!}
                                                    <p class="text-danger">{{ $errors->first('Academic Year') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    {{ Form::label('class','Class',['class'=>' control-label']) }}
                                                    {!! Form::select('class',$classes, @$default->class_id, ['class'=>'form-control','placeholder'=>'Select Class']) !!}
                                                    <p class="text-danger">{{ $errors->first('Class') }}</p>
                                                </div>
                                            </div>
                                                <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    {{ Form::label('section','Section',['class'=>' control-label']) }}
                                                    {!! Form::select('section',[], null, ['class'=>'form-control','placeholder'=>'Select Section']) !!}
                                                    <p class="text-danger">{{ $errors->first('Section') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    {{ Form::label('religion','Religion',['class'=>' control-label']) }}
                                                    {!! Form::select('religion',$religions, @$default->religions->id, ['class'=>'form-control','placeholder'=>'Select Religion']) !!}
                                                    <p class="text-danger">{{ $errors->first('religion') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    {{ Form::label('category','Category',['class'=>' control-label']) }}
                                                    {!! Form::select('category',$categories,@$default->categories->id, ['class'=>'form-control','placeholder'=>'Select Category']) !!}
                                                    <p class="text-danger">{{ $errors->first('category') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    {{ Form::label('state','State',['class'=>' control-label']) }}
                                                    {!! Form::text('state', @$default->state, ['class'=>'form-control']) !!}
                                                    <p class="text-danger">{{ $errors->first('state') }}</p>
                                                </div>
                                            </div>
                                              <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    {{ Form::label('city','City',['class'=>' control-label']) }}
                                                    {!! Form::text('city', @$default->city, ['class'=>'form-control']) !!}
                                                    <p class="text-danger">{{ $errors->first('city') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    {{ Form::label('pincode','Pincode',['class'=>' control-label']) }}                         
                                                    {{ Form::text('pincode',@$default->pincode,array('class' => 'form-control' )) }}
                                                    <p class="text-danger">{{ $errors->first('pincode') }}</p>
                                                </div>
                                            </div>  
                                            <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    <label>Sms Template</label>
                                                     <select name="template_id" class="form-control">
                                                         <option value=""></option>
                                                         
                                                     </select>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>{{--row end --}}   
                                 
                             
                        
                             <div class="row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </div>
                            
                        {{ Form::close() }}
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

    $("#class").change(function(){
        sectionSearch($(this).val());
    });     
    
    if ($("#class").val() > 0) {
        sectionSearch($("#class").val(),{{ @$default->section_id }}); 
    }
    
     
    function sectionSearch (value,selectVal=null){
        var selected = null;
        $('#section').html('<option value="">Searching ...</option>'); 
      
        $.ajax({
          method: "get",
          url: "{{ route('admin.manageSection.search2') }}",
          data: { id: value }
        })
        .done(function(response ) {            
             if(response.section.length>0){
                $('#section').html('<option value="">Select section</option>');
               for (var i = 0; i < response.section.length; i++) {
                    if(selectVal>0){
                        selected = (selectVal==response.section[i].id)?'selected':''; 
                    }
                    $('#section').append('<option value="'+response.section[i].id+'"'+selected+'>'+response.section[i].name+'</option>'); 
                }
            }
            else{
                $('#section').html('<option value="">Not found</option>');
            } 
                   
        });
    }
    
</script>

@endpush