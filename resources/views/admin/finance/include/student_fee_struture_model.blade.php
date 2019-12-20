<!-- Modal -->
<style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:40%"> 
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Student Fee Structures</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
          <form class=" add_form" button-click="btn_close,btn_student_fee_assign_show"    action="{{ route('admin.studentFeeStructure.details.store',$student->id) }}" method="post">              
          {{ csrf_field() }}  
              <div class="col-md-6 form-group">
                <label>Fee Structures</label>
                 <select name="fee_structure" class="form-control" onchange="callAjax(this,'{{ route('admin.studentFeeStructure.show.amount') }}','amount_input_box')">
                  <option selected disabled>Select Fee Structures</option> 
                    @foreach ($feeStructures as $feeStructure)
                     <option value="{{ $feeStructure->id}}">{{ $feeStructure->name }}</option> 
                    @endforeach 
                 </select> 
              </div>
              <div class="col-md-6 form-group" id="amount_input_box">
                <label>Amount</label>
                  <input type="" name="" class="form-control" >
              </div> 
               <div class="col-md-6 form-group">
                 {{ Form::label('concession','Concession',['class'=>' control-label']) }}
                 
                <select name="concession" id="concession" class="form-control" onchange="concessitonAmount($('#concession').val())" >
                  <option value="" selected="" disabled="">Select Concession</option> 
                  
                  @foreach ($concession as $key=>$value)
                     <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                  
                </select>
              </div>
              <div class="col-md-6 form-group">
                {{ Form::label('concession_amount','Concession Amount',['class'=>' control-label']) }}
              {!! Form::text('concession_amount','', ['class'=>'form-control concession','placeholder'=>'Select Concession','id'=>'concession_amount']) !!}
              </div>
              <input type="hidden" name="academic_year_id" value="{{ $academicYears->id }}">
              <div class="col-md-6 form-group">
                <label>From Date</label>
                <input type="date" name="from_date" value="{{ $academicYears->start_date }}" class="form-control"> 
              </div>
              <div class="col-md-6 form-group">
                <label>To Date</label>
                <input type="date" name="to_date" value="{{ $academicYears->end_date }}" class="form-control"> 
              </div>
               <div class="col-lg-12 text-center"></br>                                             
               <button class="btn btn-success" type="submit" id="btn_fee_account_create">Submit</button> 
              </div>                     
          </form> 
        </div> 
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
