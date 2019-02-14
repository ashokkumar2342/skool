<div class="text-right">    
  <button type="button" class="btn btn-success" onclick="callPopupLarge(this,'{{ route('admin.studentFeeStructure.show.model',$student->id) }}'+'?academic_year_id='+$('#academic_year_id').val())">Add FEE STRUCTURE</button>
</div>          
            
<hr style="border:1px solid #eee">
<div class="col-lg-4">
<h4>Name : <b>{{ $student->name }}</b></h4>
</div>
<div class="col-lg-4">
<h4>Father's Name : <b>{{ $student->father_name }}</b></h4>
</div>
<div class="col-lg-4">
<h4>Mother's Name : <b>{{ $student->mother_name }}</b></h4>
</div>
<div class="col-lg-4">
<h4>Mobile: <b>{{ $student->father_mobile }}</b></h4>
</div>
<div class="col-lg-4">
<h4>gender: <b>{{ $student->genders->genders }}</b></h4>
</div>
<div class="col-lg-4">
<h4>Address: <b>{{ $student->p_address }} </b></h4>
</div>

<hr style="border:1px solid #eee">  
 <table class="table table-responsive" id="student_fee_assign_show_table"> 
     <thead>
         <tr>
             <th>id</th> 
             <th>Fee Structure name</th> 
             <th>Fee Amount</th>
             
             <th>Concession Amount</th>
             
             <th>Last Date</th> 
             <th>Action</th>
         </tr>
     </thead>
     <tbody>

         @foreach ($studentFeeDetails as $studentFeeDetail)

           <tr>
              <td>{{ $studentFeeDetail->id }}</td> 
              <td>{{ $studentFeeDetail->feeStructureLastDates->feeStructures->name }} </td> 
               
              <td>{{  $studentFeeDetail->fee_amount }}</td> 
             
              <td>{{ $studentFeeDetail->concession_amount }}</td>  
              <td>{{ Carbon\Carbon::parse( $studentFeeDetail->last_date)->format(' F ') }} </td> <td>
                 <a class="btn_delete btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this data ?')"   href="{{ route('admin.studentFeeDetail.delete', $studentFeeDetail->id  ) }}"  ><i class="fa fa-trash"></i></a>
                 <a href="#" data-id="{{ $studentFeeDetail->feeStructureLastDates->id }}" id="add_show" class="btn btn-success btn-xs" data-toggle="modal" data-target="#student_fee_detail_model"><i class="fa fa-plus"></i></a>
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
    <div id="student_fee_detail_model" class="modal fade" role="dialog">
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
 