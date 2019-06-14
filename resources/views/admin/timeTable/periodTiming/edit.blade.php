
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
        <h4 class="modal-title">Period Timing Edit</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12">
          <form action="{{ route('admin.preod.timing.update',$periodTimings->id) }}" method="post" class="add_form" content-refresh="time_table_type_history" button-click="btn_close">
                   {{ csrf_field() }}
                   <div class="row"> 
                    <div class="col-lg-5">
                      <label>Time Table Type</label>
                      <select name="time_table_type" class="form-control">
                        <option selected disabled>Select Type</option>
                         @foreach ($timeTableTypes as $timeTableType) 
                       <option value="{{ $timeTableType->id  }}"{{ $periodTimings->time_table_type_id==$timeTableType->id? 'selected="selected"' : ''  }}>{{ $timeTableType->name or '' }}</option> 
                      @endforeach 


                         
                      </select>
                         
                    </div>
                    <div class="col-lg-7">
                      <label>From Time</label>
                        <input type="time" class="form-control" name="time" placeholder="" required="" maxlength="" value="{{ $periodTimings->from_time }}">
                    </div> 
                  </div>
                   <div class="row">
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                      <input type="submit" value="Update" class="btn btn-success">
                    </div>
                     
                   </div>
                 
                
              </form>
            </div>   
              
      <!-- /.row -->
          </div>
          
        </div>
      </div>
   </div>

    <!-- /.content -->

 

