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
	                <form class="add_form" content-refresh="route_table" action="{{ route('admin.exam.classtest.store') }}" method="post">              
                  {{ csrf_field() }}                  
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
                  <div class="col-lg-3">                         
                      <div class="form-group">
                          {{ Form::label('subject','Subject',['class'=>' control-label']) }}
                          {!! Form::select('subject',$subjects, null, ['class'=>'form-control','placeholder'=>'Select Section','required']) !!}
                           
                      </div>
                  </div>                  
	                   <div class="col-lg-3">                                             
                         <div class="form-group">
                          {{ Form::label('test_date','Test Date',['class'=>' control-label']) }}
                           {{ Form::date('test_date','',['class'=>'form-control', 'placeholder'=>'  Test Date']) }} 
                         </div>                                         
                      </div>
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                          {{ Form::label('max_marks','Max Marks',['class'=>' control-label']) }}
                           {{ Form::text('max_marks','',['class'=>'form-control', 'placeholder'=>'  Max Marks']) }} 
                         </div>                                         
                      </div>
                      
                      <div class="col-lg-3">                                             
	                       <div class="form-group">
                          {{ Form::label('highest_marks','Highest Marks',['class'=>' control-label']) }}
	                         {{ Form::text('highest_marks','',['class'=>'form-control', 'placeholder'=>'  Highest Marks']) }} 
	                       </div>                                         
	                    </div>
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                          {{ Form::label('avg_marks','Average Marks',['class'=>' control-label']) }}
                           {{ Form::text('avg_marks','',['class'=>'form-control', 'placeholder'=>'  Average Marks']) }} 
                         </div>                                         
                      </div>
                       <div class="col-lg-3">                                             
                         <div class="form-group">
                          {{ Form::label('sylabus','Sylabus',['class'=>' control-label']) }}
                           {{ Form::file('sylabus','',['class'=>'form-control']) }} 
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
                               
                                <th>Class</th> 
                                <th>Section</th> 
                                <th>Subject</th>                                                            
                                <th>Test Date</th>                                                            
                                <th>Max marks</th>                                                            
                                <th>Highest Marks</th>                                                            
                                <th>Average Marks</th>                                                            
                                <th>Action</th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($classTests as $classTest)
                        	<tr>
                        		<td>{{ ++$loop->index }}</td>
                        	 
                            <td>{{ $classTest->classes->name or ''}}</td>
                            <td>{{ $classTest->sectionTypes->name or '' }}</td>
                            <td>{{ $classTest->subjects->name }}</td>
                            <td>{{ $classTest->test_date }}</td>
                            <td>{{ $classTest->max_marks }}</td>
                            <td>{{ $classTest->highest_marks }}</td>
                            <td>{{ $classTest->avg_marks }}</td>
                            
                        		<td>  
                        			<a href="{{ route('admin.exam.classtest.delete',Crypt::encrypt($classTest->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn_delete btn btn-danger btn-xs"    ><i class="fa fa-trash"></i></a>
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