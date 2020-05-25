
<div class="panel panel-default">
 <div class="panel-heading text-right"><button type="button" class="btn btn-info" onclick="callPopupLarge(this,'{{ route('admin.studentFeeStructure.show.model',$student->id) }}'+'?academic_year_id='+$('#academic_year_id').val())">Add FEE STRUCTURE</button></div>
   <div class="panel-body">
<div class="col-lg-4">
<h5>Name : <b>{{ $student->name }}</b></h5>
</div>
<div class="col-lg-4">
<h5>Father's Name : <b>{{ $student->parents[0]->parentInfo->name or ''}}</b></h5>
</div>
<div class="col-lg-4">
<h5>Mother's Name : <b>{{ $student->parents[1]->parentInfo->name or '' }}</b></h5>
</div>
<div class="col-lg-4">
<h5>Mobile : <b>{{ $student->addressDetails->address->primary_mobile or ''}}</b></h5>
</div>
<div class="col-lg-4">
<h5>E-mail : <b>{{ $student->addressDetails->address->primary_email or ''}}</b></h5>
</div>
<div class="col-lg-4">
<h5>Address : <b>{{ $student->addressDetails->address->p_address or ''}} </b></h5>
</div>
</div>
</div>
 <table class="table table-responsive" id="student_fee_assign_show_table"> 
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
 