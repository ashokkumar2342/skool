@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Class Test </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
	                <form class="add_form" content-refresh="route_table" action="{{ route('admin.exam.classdetail.store') }}" method="post">              
                  {{ csrf_field() }}                  
                   <div class="col-lg-3">                         
                      <div class="form-group">
                          {{ Form::label('class','Class Test',['class'=>' control-label']) }}
                           <select name="classTest" class="form-control">
                             <option value="" selected disabled>Select ClassTest</option>
                             @foreach ($classTests as $classTest)
                                <option value="{{ $classTest->id }}">{{ $classTest->classes->name }}</option>
                             @endforeach 
                           </select>
                      </div>
                  </div>
                   <div class="col-lg-3">                         
                      <div class="form-group">
                          {{ Form::label('student','Student',['class'=>' control-label']) }}
                           <select name="student" class="form-control">
                             <option value="" selected disabled>Select Registration No</option>
                             @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->registration_no }}</option>
                             @endforeach 
                           </select>
                      </div>
                  </div>

                                 
	                   <div class="col-lg-3">                                             
                         <div class="form-group">
                          {{ Form::label('marksobt','Marks OBT',['class'=>' control-label']) }}
                           {{ Form::text('marksobt','',['class'=>'form-control']) }} 
                         </div>                                         
                      </div>
                    
                      
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                          {{ Form::label('rank','Rank',['class'=>' control-label']) }}
                           {{ Form::text('rank','',['class'=>'form-control']) }} 
                         </div>                                         
                      </div>
                       <div class="col-lg-3">                                             
	                       <div class="form-group">
                          {{ Form::label('grade','Grade',['class'=>' control-label']) }}
	                         {{ Form::text('grade','',['class'=>'form-control']) }} 
	                       </div>                                         
	                    </div>
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                          {{ Form::label('percentile','Percentile',['class'=>' control-label']) }}
                           {{ Form::text('percentile','',['class'=>'form-control']) }} 
                         </div>                                         
                      </div>
                       <div class="col-lg-3">                                             
                         <div class="form-group">
                          {{ Form::label('any_remarks','Any Remarks',['class'=>' control-label']) }}
                           {{ Form::textarea('any_remarks','',['class'=>'form-control','rows'=>1]) }} 
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
                               
                                <th>class_test_id</th> 
                                <th>student Name</th> 
                                <th>student Registration No</th> 
                                <th>marks obt</th>                                                            
                                <th>Rank</th>                                                            
                                <th>Percentile</th>                                                            
                                <th>any_remarks</th>                                                            
                                <th>grade</th>                                                           
                                                                                          
                                <th>Action</th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($classTestDetails as $classTestDetail)
                        	<tr>
                        		<td>{{ ++$loop->index }}</td>
                        	 
                            <td>{{ $classTestDetail->class_test_id or ''}}</td>
                            <td>{{ $classTestDetail->students->name or '' }}</td>
                            <td>{{ $classTestDetail->students->registration_no or '' }}</td>
                            <td>{{ $classTestDetail->marksobt }}</td>
                            <td>{{ $classTestDetail->rank }}</td>
                            <td>{{ $classTestDetail->percentile }}</td>
                            <td>{{ $classTestDetail->any_remarks }}</td>
                            <td>{{ $classTestDetail->grade }}</td>
                            <td>{{ $classTestDetail->average_marks }}</td>
                          
                            
                        		<td>  
                        			<a href="{{ route('admin.exam.classdetail.delete',Crypt::encrypt($classTestDetail->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn_delete btn btn-danger btn-xs"    ><i class="fa fa-trash"></i></a>
                        		</td>
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

     $("#class").change(function(){
         sectionSearch($(this).val());
     });     
     
     if ($("#class").val() > 0) {
         sectionSearch($("#class").val()); 
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