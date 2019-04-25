@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Grade Details</h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
                  <form class="add_form" content-refresh="route_table" action="{{ route('admin.exam.grade.detail.store') }}" method="post">              
                  {{ csrf_field() }}                  
                   <div class="col-lg-3">                         
                      <div class="form-group">
                          {{ Form::label('class','Exam Term',['class'=>' control-label']) }}
                           <select name="exam_term" class="form-control">
                            <option value="" selected  disabled>Select Exam Term</option> 
                            @foreach ($examTerms as $examTerm)
                              <option value="{{ $examTerm->id }}">From Date:{{ date('d-m-Y', strtotime($examTerm->from_date)) }} &nbsp; To Date: {{ date('d-m-Y', strtotime($examTerm->to_date)) }}</option>
                            @endforeach 
                           </select> 
                      </div>
                  </div>
                   <div class="col-lg-3">                           
                             <div class="form-group">
                              {{ Form::label('student_id','Registration No',['class'=>' control-label']) }}
                               {{ Form::select('student_id',$students,null,['class'=>'form-control student_list_select','placeholder'=>"Select Registration",'required']) }}
                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
                        </div>                        
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
                          {!! Form::select('section',[], null, ['class'=>'form-control','placeholder'=>'Select Section']) !!}
                          <p class="text-danger">{{ $errors->first('session') }}</p>
                      </div>
                  </div>    
                  <div class="col-lg-3">                         
                      <div class="form-group">
                          {{ Form::label('subject','Subject',['class'=>' control-label']) }}
                          {!! Form::select('subject',$subjects, null, ['class'=>'form-control','placeholder'=>'Select Section','required']) !!} 
                      </div>
                  </div> 
                   <div class="col-lg-3">                                             
                         <div class="form-group">
                          {{ Form::label('gradeobt','Gradeobt',['class'=>' control-label']) }}
                           {{ Form::text('gradeobt','',['class'=>'form-control', 'placeholder'=>'gradeobt' ]) }} 
                         </div>                                         
                      </div>  
                       <div class="col-lg-6">                                             
                         <div class="form-group">
                          {{ Form::label('discription','Discription',['class'=>' control-label']) }}
                           {{ Form::text('discription','',['class'=>'form-control', 'placeholder'=>'discription' ]) }} 
                         </div>                                         
                      </div>  
                       <div class="col-lg-12 text-center">                                             
                       <button class="btn btn-success" type="submit" id="btn_fee_account_create">Submit</button> 
                      </div>                     
                  </form> 
                </div> 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

            <div class="box">             
              <!-- /.box-header -->
                <div class="box-body">
                    <table id="route_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>Sn</th>                               
                                <th>Exam Term</th> 
                                <th>Registration No</th>  
                                <th>Subject</th>                     
                                <th>Action</th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($gradeDetails as $gradeDetail)
                          <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td>{{ $gradeDetail->exam_term->name or '' }}</td>
                            <td>{{ $gradeDetail->student_id->name or ''}}</td> 
                            <td>{{ $gradeDetail->subjects }}</td>
                            
                            
                           {{--  <td>  
                              <a href="{{ route('admin.exam.schedule.delete',Crypt::encrypt($examSchedule->id)) }}"  onclick="return confirm('Are you sure you want to delete this item?');" class="btn_delete btn btn-danger btn-xs"    ><i class="fa fa-trash"></i></a>

                              <a href="{{ url('storage/class_test/'.$examSchedule->sylabus) }}" {{ $examSchedule->sylabus==null?'disabled':'' }} target="_blank"  class="btn btn-info btn-xs"    ><i class="fa fa-download"></i></a>
                            </td> --}}
                          </tr>    
                        @endforeach 
                           
                        </tbody>
                             

                    </table>
                </div>
            </div>    

           
 
    </section>
    <!-- /.content -->
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
 
@endpush
@push('scripts')
 <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
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

     // $("#class").change(function(){
     //     sectionSearch($(this).val());
     // });     
     
     // if ($("#class").val() > 0) {
      
     // }
     
      
     // function sectionSearch (value,selectVal=null){
     //     var selected = null;
     //     $('#section').html('<option value="">Searching ...</option>'); 
       
     //     $.ajax({
     //       method: "get",
     //       url: "{{ route('admin.manageSection.search2') }}",
     //       data: { id: value }
     //     })
     //     .done(function(response ) {            
     //          if(response.section.length>0){
     //             $('#section').html('<option value="">Select section</option>');
     //            for (var i = 0; i < response.section.length; i++) {
     //                 if(selectVal>0){
     //                     selected = (selectVal==response.section[i].id)?'selected':''; 
     //                 }
     //                 $('#section').append('<option value="'+response.section[i].id+'"'+selected+'>'+response.section[i].name+'</option>'); 
     //             }
     //         }
     //         else{
     //             $('#section').html('<option value="">Not found</option>');
     //         } 
                    
     //     });
     // }
     
 </script>
    
@endpush