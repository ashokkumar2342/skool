 
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
        <h4 class="modal-title">Publisher Edit</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
              <form action="{{ route('admin.library.publisher.details.update',$publishers->id) }}" button-click="publisher_table_show,btn_close"   method="post" class="add_form">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-4">
                      <label>Publisher Code</label>
                      <input type="text" name="code" class="form-control" placeholder="" required="" maxlength="20" value="{{ $publishers->code }}"> 
                    </div>
                    <div class="col-lg-4">
                      <label>Publisher Name</label>
                      <input type="text" name="name" class="form-control" placeholder="" required="" maxlength="199" value="{{ $publishers->name }}"> 
                    </div>
                    <div class="col-lg-4">
                      <label>Mobile No</label>
                      <input type="text" name="mobile_no" class="form-control" placeholder="" required="" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{ $publishers->mobile_no }}"> 
                    </div>
                    <div class="col-lg-4">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" placeholder="" maxlength="50" required="" value="{{ $publishers->email }}"> 
                    </div>
                   {{--  <div class="col-lg-4">
                      <label>Date Of Birth</label>
                      <input type="date" name="dob" class="form-control" placeholder="" required="" value="{{ $publishers->dob }}"> 
                    </div> --}}
                    <div class="col-lg-4">
                      <label>Address</label>
                      <textarea class="form-control" name="address" placeholder="">{{ $publishers->address }}</textarea>
                       
                    </div> 
                   </div>
                   <div class="row">
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                       <button class="btn btn-success" type="submit">Update</button> 
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

 

