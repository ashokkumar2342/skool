
@extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css"> 
@endpush
@section('body')
<section class="content-header">
    <h1> Student Birthday</h1>
      <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>        
      </ol>
</section>
    <section class="content">        
        
      	<div class="box">        
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                  <form class="add_form"  no-reset="true" success-content-id="search_result" action="{{ route('admin.birthday.search') }}" method="post" accept-charset="utf-8">
                    {{ csrf_field() }}  
                  
                   <div class="col-lg-2">                           
                       <div class="form-group">
                        {{ Form::label('from_date','From Date',['class'=>' control-label']) }}
                         
                         <input type="text" Name="from_date" id="from_date" class="form-control"  placeholder="dd-mm-yyyy">
                         <p class="from_date text-center alert alert-danger hidden"></p>
                       </div>    
                  </div> 
                   <div class="col-lg-2">                           
                       <div class="form-group">
                        {{ Form::label('to_date','To Date',['class'=>' control-label ']) }}
                         {{ Form::text('to_date','',['class'=>'form-control','placeholder'=>"dd-mm-yyyy"]) }}
                         <p class="to_date text-center alert alert-danger hidden"></p>
                       </div>    
                  </div> 
                   <div class="col-lg-2">                           
                       <div class="form-group">
                        <br>
                         <input type="submit" class="btn btn-success btn-sm" value="show">
                       </div>    
                  </div> 
                  </form>
                   <div class="col-lg-12" >
                    <form action="{{ route('admin.birthday.card.pdfAll') }}" method="post" accept-charset="utf-8">
                      {{ csrf_field() }}
                   		<table id="" class="table table-bordered table-striped table-hover">
                   		  <thead>
                   		  <tr>               
                         <th><input type="checkbox" class="checked_all" name="checkAll"></th>                  
                          <th>Registration No</th>                  
                   		    <th>DOB</th>                  
                   		    <th>Name</th>
                   		    <th>Father Name</th> 
                   		    <th>Father Mobile</th> 
                   		    <th>Mother Mobile</th>                                    
                   		    <th>Action</th>                                    
                   		  </tr>
                   		  </thead>
                   		  <tbody id="search_result">
                   		  @foreach($students as $student)
                   		  <tr>
                          <td><input type="checkbox" class="checkbox"  name="student[]" value="{{ $student->id }}"></td>
                          <td>{{ $student->registration_no }}</td>               
                   		    <td>{{ date('d-m-Y',strtotime($student->dob)) }}</td>               
                   		    <td>{{ $student->name }}</td>
                   		    <td>{{ $student->father_name }}</td>
                   		    <td>{{ $student->father_mobile }}</td>
                   		    <td>{{ $student->mother_mobile }}</td> 
                   		    <td>
                   		    	<a  href="{{ route('admin.birthday.card.pdf',$student->id) }}" target="blank"  class="btn btn-info btn-xs"><i class="fa fa-print"></i> </a>

                            <a  href="{{ route('admin.birthday.card.sms.send',$student->id) }}" target="blank"  class="btn btn-info btn-xs"><i class="fa fa-send"></i>Send Sms</a>
                   		    </td> 
                   		  </tr>
                   		  @endforeach
                   		  </tbody>
                   		   
                   		</table>
                      <div class="text-left">
                          <input class="checkbox btn btn-success" type="submit" value="Select Generate Pdf">  
                      </div>
                      </form>
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
 <script>
 	 
  
 	$(document).ready( function () {
 	    $('#birthday_dataTable').DataTable({
 	    	'iDisplayLength': 10,
 	    	dom: 'Bfrtip',

			buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
			]
 	    });
 	} );
 </script>

 
<script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
 <script> 
 $( function() {
    $( "#from_date" ).datepicker({dateFormat:'dd-mm-yy'});
    $( "#to_date" ).datepicker({dateFormat:'dd-mm-yy'});   
});  

 </script>
 <script type="text/javascript">
         $('.checked_all').on('change', function() {   
    

            $('.checkbox').prop('checked', $(this).prop("checked"));              
         });
         //deselect "checked all", if one of the listed checkbox product is unchecked amd select "checked all" if all of the listed checkbox product is checked
         $('.checkbox').change(function(){ //".checkbox" change 
             if($('.checkbox:checked').length == $('.checkbox').length){
                    $('.checked_all').prop('checked',true);
             }else{
                    $('.checked_all').prop('checked',false);
             }
         });       
 </script>
@endpush