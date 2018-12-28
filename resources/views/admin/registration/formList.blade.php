@extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
   <style type="text/css" media="screen">
       
        #category{
        display:none;
       } 
        #religion{
        display:none;
       }
         #gender{
        display:none;
       }
        #class{
        display:none;
       }
        #section{
        display:none;
       }
   </style>
@endpush
@section('body')
<section class="content-header">
    <h1> Registration Form List</h1>
      <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>        
      </ol>
</section>
    <section class="content">        
        {{Form::close()}}
        <div class="box">        
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12 ">                  
                       
                    <form action="{{ route('admin.registration.report.post') }}" data-table-without-pagination="report_dataTable" success-content-id="report_result" method="post" no-reset="true" accept-charset="utf-8" id="report_form" class="add_form">
                            {{ csrf_field() }}
                        <div class="col-md-12">  
                            <div class="col-lg-3">                         
                                <div class="form-group">
                                    
                                      {{ Form::label('academic_year_id','Academic Year',['class'=>' control-label']) }}
                                         {{ Form::select('academic_year_id',$acardemicYear,null,['class'=>'form-control']) }}
                                        <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                                   </div>     
                                </div>
                                <div class="col-lg-3">                         
                                <div class="form-group">
                                    {{ Form::label('report_for','Report For',['class'=>' control-label']) }}
                                    {!! Form::select('report_for',[                   
                                                         
                                                        1=>'Class',
                                                        2=>'Category',
                                                        3=>'Religion',
                                                        4=>'Gender',
                                                        5=>'Income Slab',
                                                        6=>'Profession',
                                                        
                                        ], null, ['class'=>'form-control','placeholder'=>'Select','required']) !!}
                                    <p class="text-danger">{{ $errors->first('report_for') }}</p>
                                </div>
                                 
                            </div>
                            <div class="col-lg-3" id="class">                         
                                <div class="form-group">  
                             {{ Form::label('class','Class',['class'=>' control-label']) }}
                               <select name="class" id="classgroup" class="form-control">
                                     <option value="">Select</option>  
                                    @foreach (App\Model\ClassType::all() as $class)
                                       <option value="{{ $class->id }}">{{ $class->name }}</option> 
                                     @endforeach 
                               </select>
                                </div>
                            </div>
                            <div class="col-lg-3" id="cate" >                                                   
                                <div class="form-group">
                                    {{ Form::label('category','Category',['class'=>' control-label']) }}
                                    <select name="category" id="category" class="form-control">
                                        <option value="">Select</option>
                                      @foreach (App\Model\Category::all() as $category)                                            
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>                                  
                                      @endforeach 
                                    </select>                                    
                                </div>
                            </div> 
                             <div class="col-lg-3" id="rel" style="display:none">                         
                                <div class="form-group">
                                    {{ Form::label('religion','Religion',['class'=>' control-label']) }}
                                    <select name="religion" id="religion" class="form-control">
                                     {{ Form::label('religion','Religion',['class'=>' control-label']) }}
                                     @foreach (App\Model\Religion::all() as $religion)                                            
                                           <option value="{{ $religion->id }}">{{ $religion->name }}</option>                                  
                                     @endforeach 
                                 </select> 
                                 </div>
                             </div> 
                             <div class="col-lg-3" id="gen" style="display:none"> 
                                <div class="form-group">
                                    {{ Form::label('gender','Gender',['class'=>' control-label']) }}
                                    <select name="gender" id="gender" class="form-control">
                                     {{ Form::label('gender','gender',['class'=>' control-label']) }}
                                     @foreach (App\Model\Gender::all() as $gender)                                            
                                           <option value="{{ $gender->id }}">{{ $gender->genders }}</option>                                  
                                     @endforeach 
                                    </select> 
                                 </div>
                             </div> 
                             <div class="col-lg-3" id="incomeSlab" style="display:none"> 
                                <div class="form-group">
                                    {{ Form::label('incomeSlab','Income Slab',['class'=>' control-label']) }}
                                    <select name="incomeSlab" id="income" class="form-control">
                                      
                                     @foreach (App\Model\IncomeRange::all() as $range) 
                                           <option value="{{ $range->id }}">{{ $range->range }}</option> 
                                     @endforeach 
                                    </select> 
                                 </div>
                             </div> 
                             <div class="col-lg-3" id="professions" style="display:none"> 
                                <div class="form-group">
                                    {{ Form::label('professions','Profession',['class'=>' control-label']) }}
                                    <select name="profession" id="profession" class="form-control">
                                      
                                     @foreach (App\Model\Profession::all() as $name) 
                                           <option value="{{ $name->id }}">{{ $name->name }}</option> 
                                     @endforeach 
                                    </select> 
                                 </div>
                             </div> 
                          
                            <div class="col-lg-3" id="se" style="display:none">                         
                                <div class="form-group">
                                    {{ Form::label('section','Section',['class'=>' control-label']) }}
                                      <select name="section" id="section" class="form-control"> 
                                    </select>
                                   
                                </div>
                            </div>
                             <div class="col-lg-3" style="padding-top: 20px;">                         
                                <div class="form-group">
                                  <button class="btn btn-success" id="btn_submit" type="submit">Show</button>
                                    
                                </div>
                            </div>
                        </div>

                        {{ Form::close() }}
                    </div>
                </div>
                <div id="report_result">
                
                </div>
            </div>
            <!-- /.box-body -->
            
        </div>
        <!-- /.box -->
        @include('admin.registration.remarks')

    </section>
    <!-- /.content -->
@endsection
 @push('scripts')
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script type="text/javascript">
    $(document).ready(function() {
       $("#blood").hide();
       $("#cate").hide();
        $("#cl").hide();        
        $("#se").hide(); 
    });
    $( ".datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
     
    
    $( "#report_for" ).change(function() { 
        var report = $("#report_for").val();                
         
        switch (report) {
            case '1':
            console.log('1'); 
                $("#class").show(); 
                $("#cate").hide(); 
                $("#rel").hide(); 
                $("#gen").hide();
                $("#religion").hide(); 
                $("#gender").hide(); 
                $("#classgroup").show();              
                $("#category").hide();  
                $("#incomeSlab").hide();
                 $("#professions").hide();
                break;
            case '2': 
            console.log('2'); 
                 $("#cate").show(); 
                 $("#class").hide();
                $("#classgroup").hide(); 
                $("#rel").hide(); 
                $("#gen").hide();
                $("#religion").hide(); 
                $("#gender").hide(); 
                $("#category").show(); 
                $("#incomeSlab").hide();
                 $("#professions").hide();
                break;
            case '3':
               $("#cate").hide(); 
                $("#class").hide();
                $("#classgroup").hide();  
                $("#category").show(); 
                $("#rel").show(); 
                $("#gen").hide();
                $("#religion").show(); 
                $("#gender").hide(); 
                $("#incomeSlab").hide();
                 $("#professions").hide();

                 
                break;
            case '4':
                $("#cate").hide(); 
                 $("#class").hide();
                 $("#classgroup").hide();  
                 $("#category").hide(); 
                 $("#rel").hide(); 
                 $("#gen").show();
                 $("#religion").hide(); 
                 $("#gender").show();
                 $("#incomeSlab").hide();
                 $("#professions").hide();
                break;
            case '5':
                 $("#cate").hide(); 
                  $("#class").hide();
                  $("#classgroup").hide();  
                  $("#category").hide(); 
                  $("#rel").hide(); 
                  $("#gen").hide();
                  $("#religion").hide(); 
                  $("#gender").hide();
                  $("#incomeSlab").show();
                  $("#professions").hide();
                  $("#incomeSlab").show();
                 $("#professions").hide();
                 break;
            case '6':
                $("#cate").hide(); 
                 $("#class").hide();
                 $("#classgroup").hide();  
                 $("#category").hide(); 
                 $("#rel").hide(); 
                 $("#gen").hide();
                 $("#religion").hide(); 
                 $("#gender").hide();
                 $("#incomeSlab").hide();
                 $("#professions").show();
                break;
            case '7':
                $("#cate").hide(); 
                 $("#class").hide();
                 $("#classgroup").hide();  
                 $("#category").hide(); 
                 $("#rel").hide(); 
                 $("#gen").hide();
                 $("#religion").hide(); 
                 $("#gender").hide();
                 $("#incomeSlab").hide();
                 $("#professions").hide();
        }    
       // if($("#report_for").val() == 1){
       //   $("#class").show(); 
       //   $("#cate").remove();
       // }
       // else if($("#report_for").val() == 2){
       //  $("#class").remove();
       //  $("#cate").show(); 
       // }
         
    });
    $( "#report_form" ).on( "click", "#school_class", function() { 
       if($("#school_class").val() == 1){                  
        $("#cl").hide('slow');        
        $("#se").hide('slow');
        $("#class").hide('slow');        
        $("#section").hide('slow');
       }
       else if($("#school_class").val() == 2){   

        $("#cl").show('slow');        
        $("#se").show('slow');
         $("#class").show('slow');        
        $("#section").show('slow');  
       }
       else{ 
       } 
    });
</script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

@endpush

