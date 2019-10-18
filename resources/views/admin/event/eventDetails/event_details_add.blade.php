  
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
        <h4 class="modal-title">Event Details Add</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
             <form action="{{ route('admin.event.details.store') }}" method="post" class="add_form" button-click="btn_event_details_table_show,btn_close">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="form-group   col-lg-4">
                      <label>Event Name</label>
                      <input type="text" name="name" class="form-control" placeholder="" maxlength="100"> 
                    </div> 
                    <div class="form-group   col-lg-4">
                      <label>Event Type</label>
                       <select name="event_type_id" class="form-control">
                        <option selected disabled >Select Event Type</option> 
                        @foreach ($eventTypes as $eventType) 
                         <option value="{{ $eventType->id }}">{{ $eventType->name }}</option>
                        @endforeach 
                       </select>
                    </div> 
                    <div class="form-group   col-lg-4">
                      <label>Discription</label>
                      <textarea class="form-control" name="discription"></textarea> 
                    </div> 
                     <div class="form-group  col-lg-4">
                      <label>Start Date</label>
                      <input type="date" name="start_date" class="form-control" placeholder=""></div>
                    <div class="form-group   col-lg-4">
                      <label>End Date</label>
                      <input type="date" name="end_date" class="form-control" placeholder=""> 
                    </div> 
                    <div class="form-group   col-lg-4">
                      <label>Organizer/Incharge Name</label>
                      <input type="text" name="incharge_name" class="form-control" placeholder="" maxlength="100"> 
                    </div>
                    <div class="form-group   col-lg-4">
                      <label>Event For</label>
                       <select name="event_for_id"  multiselect-form="true" class="form-control" onchange="callAjax(this,'{{ route('admin.event.details.onchange') }}','select_class')">
                       <option selected disabled>Select Option</option>  
                         @foreach ($eventFors as $eventFor)
                         <option value="{{ $eventFor->id }}">{{ $eventFor->name }}</option> 
                         @endforeach
                        </select>
                    </div>
                    <div id="select_class">
                      
                    </div>
                    <div class="form-group   col-lg-4">
                      <label>Color</label>
                      <input type="text" name="color"   class="form-control" maxlength="100">
                       
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

 
