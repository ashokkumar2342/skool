  
  <!-- Main content -->
   
    <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:90%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Class period Schedule Details</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
             <form action="" method="post" class="add_form" button-click="btn_outhor_table_show,btn_close">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-3">
                      <label>Time Table Type</label>
                     
                       <select name="time_table_type" class="form-control"  onchange="callAjax(this,'{{ route('admin.class.period.schedule.time.table.type.wise') }}','period_timing_select_box_div')">
                        <option selected disabled>Select Type</option> 
                        @foreach ($timeTableTypes as $timeTableType) 
                          <option value="{{ $timeTableType->id }}">{{ $timeTableType->name }}</option>
                        @endforeach 
                        </select>
                        
                        </div> 
                    </div>
                    <div id="period_timing_select_box_div">
                    </div>
                    <div class="col-lg-3">
                      <label>Group For</label> 
                       <select name="Group_id" class="form-control" multiselect-form="true" onchange="callAjax(this,'{{ route('admin.class.period.schedule.group.wise') }}','select_box_div')">
                       <option selected disabled>Select Option</option>  
                        @foreach ($timeTableGroupWises as $timeTableGroupWise) 
                          <option value="{{ $timeTableGroupWise->id }}">{{ $timeTableGroupWise->name }}</option>
                        @endforeach 
                        </select> 
                    </div>
                    
                    <div id="select_box_div">
                    </div>
                       
                    <div class="col-lg-3">
                      <label>Days</label>
                       <select name="days" class="form-control">
                        <option selected disabled>Select Days</option> 
                        @foreach ($daysTypes as $daysType) 
                         <option value="{{ $daysType->id }}">{{ $daysType->name }}</option>
                        @endforeach
                         
                       </select>
                    </div> 
                    <div class="col-lg-3">
                      <label>Period Type</label>
                      <select name="period_type" class="form-control">
                        <option selected disabled>Select Type</option> 
                        @foreach ($periodTypes as $periodType) 
                        <option value="{{ $periodType->id }}">{{ $periodType->name }}</option>
                        @endforeach 
                      </select> 
                    </div>
                   </div>
                   <div class="row">
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                      <input type="submit" class="btn btn-success">
                    </div>
                     
                   </div>
                 
                
              </form>
                
            </div>   
               
      <!-- /.row -->
          </div>
         
        </div>
      </div>
     
    <!-- /.content -->

 
