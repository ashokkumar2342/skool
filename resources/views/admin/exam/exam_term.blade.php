@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Exam Term </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
	                <form class="add_form" content-refresh="route_table" action="{{ route('admin.exam.term.store') }}" method="post">              
                  {{ csrf_field() }}                  
                                
	                   <div class="col-lg-3">                                             
                         <div class="form-group">
                          {{ Form::label('from_date','From Date',['class'=>' control-label']) }}
                           {{ Form::date('from_date','',['class'=>'form-control', 'placeholder'=>'  From Date']) }} 
                         </div>                                         
                      </div>
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                          {{ Form::label('to_date','To Date',['class'=>' control-label']) }}
                           {{ Form::date('to_date','',['class'=>'form-control', 'placeholder'=>'  To Date']) }} 
                         </div>                                         
                      </div> 
                      
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                          {{ Form::label('percentage','Percentage ( include in Final Exam)',['class'=>' control-label']) }}
                           {{ Form::text('percentage','',['class'=>'form-control', 'placeholder'=>'  Percentage','maxlength'=>'4','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57','required']) }} 
                         </div>                                         
                      </div>                  
                      <div class="col-lg-3">                                             
                         <div class="form-group">
                          {{ Form::label('discription','Discription',['class'=>' control-label']) }}
                           {{ Form::textarea('discription','',['class'=>'form-control', 'placeholder'=>' Discription','rows'=>1,'maxlength'=>'200']) }} 
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
                               
                                <th>To Date</th> 
                                <th>From Date</th> 
                                <th>Percentage</th>                                                              
                                <th>Discription</th>                                                             
                                <th>Action</th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($examTerms as $examTerm)
                        	<tr>
                        		<td>{{ ++$loop->index }}</td>                        	 
                            <td>{{ $examTerm->to_date}}</td>
                            <td>{{ $examTerm->from_date }}</td>
                            <td>{{ $examTerm->percentage_include_final_exam }}</td> 
                            <td>{{ $examTerm->discription }}</td> 
                        		<td> 
                             @if(App\Helper\MyFuncs::menuPermission()->d_status == 1) 
                        			<a href="{{ route('admin.exam.term.delete',Crypt::encrypt($examTerm->id)) }}"  onclick="return confirm('Are you sure you want to delete this item?');" class="btn_delete btn btn-danger btn-xs"    ><i class="fa fa-trash"></i></a>
                              @endif
 
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