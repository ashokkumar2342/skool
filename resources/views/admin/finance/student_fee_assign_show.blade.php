<div class="col-lg-12">
<div class="panel panel-info">
<div class="panel-heading">Person Details</div>
<div class="panel-body"> 
<table class="table table-striped table-bordered">
<tbody>
<tr>
<td style="width: 94px;">Name</td>
<td style="width: 94px;">Father's Name</td>
<td style="width: 96px;">Mother's Name </td>
<td style="width: 96px;">Mobile</td>
<td style="width: 96px;">Email</td>
<td style="width: 97px;">Address</td>
</tr>
<tr>
<td style="width: 94px;">{{ $student->name }}</td>
<td style="width: 94px;">{{ $student->parents[0]->parentInfo->name or ''}}</td>
<td style="width: 96px;">{{ $student->parents[1]->parentInfo->name or '' }}</td>
<td style="width: 96px;">{{ $student->addressDetails->address->primary_mobile or ''}}</td>
<td style="width: 96px;">{{ $student->addressDetails->address->primary_email or ''}}</td>
<td style="width: 97px;">{{ $student->addressDetails->address->p_address or ''}}</td>
</tr>
</tbody>
</table>
</div>
</div>
</div> 
<div class="col-lg-12">
<div class="panel panel-danger">
<div class="panel-heading">Fee Details</div>
<div class="panel-body"> 
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Sr.No.</th>
      <th>Fee Name</th>
      <th>Amount</th>
      <th>Due in Month Year</th>
      <th>Action</th>
    </tr>
  </thead>
   <tbody>
   @php
      $arrayId=1;
    @endphp 
   @foreach ($studentFeeStructures as $studentFeeStructure) 
  <tr >
     <td>{{ $arrayId++ }}</td> 
     <td>{{ $studentFeeStructure->name }}</td> 
     <td>{{ $studentFeeStructure->amount }}</td> 
     <td>{{ $studentFeeStructure->DueMonthYear }}</td> 
     <td>
      <a class="btn btn-xs btn-danger"  onclick="if (confirm('Are you Sure delete')){callAjax(this,'{{ route('admin.student.fee.assign.structure.delete',[$student->id,$studentFeeStructure->id]) }}'+'?academic_year_id='+$('#academic_year_id').val())} else{console_Log('cancel') }"   success-popup="true" button-click="btn_student_fee_assign_show"><i class="fa fa-trash"></i></a></td> 
  </tr>
   @endforeach
  </tbody>
</table> 
</div>
</div>
</div>

<div class="col-lg-4 pull-right">
  <button type="button" class="btn btn-sm btn-info form-control pull-right" onclick="callPopupLarge(this,'{{ route('admin.studentFeeStructure.show.model',$student->id) }}'+'?academic_year_id='+$('#academic_year_id').val())" style="margin:5px">Add FEE STRUCTURE</button>  
</div> 
<div class="col-lg-12 table-responsive" style="margin-top: 5px"> 
 <table class="table" id="student_fee_assign_show_table"> 
     <thead>
         <tr>
             <th>Sr.No.</th> 
             <th>Fee Structure name</th> 
             <th>Fee Amount</th>
             
             <th>Concession Name</th>
             <th>Concession Amount</th> 
             <th>Due Month/Year</th> 
             <th>For Session/Month</th> 
             <th>Action</th>
         </tr>
     </thead>
     <tbody>

         @foreach ($studentFeeDetails as $studentFeeDetail)

           <tr>
              <td>{{ $studentFeeDetail->id }}</td> 
              <td>{{ $studentFeeDetail->fee_name }} </td> 
               
              <td>{{  $studentFeeDetail->fee_amount }}</td> 
             
              <td>{{ $studentFeeDetail->concession_name }}</td>  
              <td>{{ $studentFeeDetail->concession_amount }}</td>  
              <td>{{ $studentFeeDetail->due_on }}</td>  
              <td>{{ $studentFeeDetail->for_session_month }}</td>  
              
               
              
                 <td>
                  @if ($menuPermission->w_status==1)
                   @if ($studentFeeDetail->paid==0)
                   <a href="#" data-id="{{ $studentFeeDetail->id }}" id="add_show" class="btn btn-info btn-xs"  onclick="callPopupLarge(this,'{{ route('admin.studentFeeStructure.Concession.show.model',$studentFeeDetail->id) }}')"><i class="fa fa-edit"></i></a>
                     @else 
                     
                   @endif
                 @endif
                  @if ($menuPermission->d_status==1)
                    @if ($studentFeeDetail->paid==0)
                    <button class="btn btn-danger btn-xs" success-popup="true" button-click="btn_student_fee_assign_show" title="Delete" onclick="if (confirm('Are you Sure delete')){callAjax(this,'{{ route('admin.studentFeeDetail.delete', $studentFeeDetail->id  ) }}') } else{console_Log('cancel') }"  ><i class="fa fa-trash"></i></button>
                    @else
                     
                 @endif
                 @endif
             </td>  
           </tr>   
         @endforeach 
     </tbody>
 </table>
</div>
 {{-- <div class="row"> 
  
     <div class="col-lg-3"> 
      <input type="submit" class="btn btn-success" value="Save">
     </div>
 </div> --}}
               
          
       
    <!-- Modal -->
    {{-- <div id="student_fee_detail_model" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Fee Detail</h4>
          </div>
          <div class="modal-body">
             {{ Form::label('concession','Concession',['class'=>' control-label']) }}
            {!! Form::select('concession',$concession, null, ['class'=>'form-control concession','placeholder'=>'Select Concession','required','id'=>'con']) !!}
             {{ Form::label('concession_amount','Concession Amount',['class'=>' control-label']) }}
            {!! Form::text('concession_amount','', ['class'=>'form-control concession','placeholder'=>'Select Concession','required','id'=>'con_amount']) !!}
            <input type="hidden" name="" id="student_fee_details_id">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>       
  --}}
    
 <script> 
    $( ".datepicker").datepicker();

    function concessitonAmount(val){

       event.preventDefault();
     
       $.ajax({
           url: '{{ route('admin.concession.search') }}',
           type: 'get', 
           data: {concession: val},
       })
       .done(function(data) {

           $("#concession_amount").val(data.amount);
            
       })
       .fail(function() {
           console.log("error");
       })
       .always(function() {
           console.log("complete");
       });
    }
 
   $('.concession').change(function(event) {
     
     event.preventDefault();
   
     $.ajax({
         url: '{{ route('admin.concession.search') }}',
         type: 'get', 
         data: {concession: $('.concession').val()},
     })
     .done(function(data) {

         $("#concession_amount").val(data.amount);
          
     })
     .fail(function() {
         console.log("error");
     })
     .always(function() {
         console.log("complete");
     });
   
   });
   $('#student_fee_assign_show_table').on('click','#add_show', function(event) {      
       event.preventDefault();  
       
        $('#student_fee_details_id').val($(this).data('id'));         
           
        
        // $('#fee_structure_amount_model').modal('show');
  });
   $('#con').change(function(event) {
     $.ajax({
         url: '{{ route('admin.concession.search') }}',
         type: 'get', 
         data: {concession: $('#con').val()},
     })
     .done(function(data) {

         $("#con_amount").val(data.amount);
          
     })
     .fail(function() {
         console.log("error");
     })
     .always(function() {
         console.log("complete");
     });
   });
     
  </script>
 