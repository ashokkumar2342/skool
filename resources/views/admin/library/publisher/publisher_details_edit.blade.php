 
  <!-- Main content -->
  
    <section class="content">
    <div class="modal-dialog" style="width:70%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Publisher Edit</h4>
      </div>
      <div class="modal-body">
            <!-- /.box-header -->  

          <div class="box">  
            <div class="box-body"> 
              <form action="{{ route('admin.library.publisher.details.update',$publishers->id) }}" method="post" class="add_form">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-4">
                      <label>Publisher Code</label>
                      <input type="text" name="code" class="form-control" placeholder="" required="" maxlength="4" value="{{ $publishers->code }}"> 
                    </div>
                    <div class="col-lg-4">
                      <label>Publisher Name</label>
                      <input type="text" name="name" class="form-control" placeholder="" required="" maxlength="50" value="{{ $publishers->name }}"> 
                    </div>
                    <div class="col-lg-4">
                      <label>Mobile No</label>
                      <input type="text" name="mobile_no" class="form-control" placeholder="" required="" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{ $publishers->mobile_no }}"> 
                    </div>
                    <div class="col-lg-4">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" placeholder="" required="" value="{{ $publishers->email }}"> 
                    </div>
                    <div class="col-lg-4">
                      <label>Date Of Birth</label>
                      <input type="date" name="dob" class="form-control" placeholder="" required="" value="{{ $publishers->dob }}"> 
                    </div>
                    <div class="col-lg-4">
                      <label>Address</label>
                      <input type="text" name="address" class="form-control" placeholder="" required="" maxlength="200" value="{{ $publishers->address }}"> 
                    </div> 
                   </div>
                   <div class="row">
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                      <input type="submit"  value="Update" class="btn btn-success">
                    </div>
                     
                   </div>
                 
                
              </form>
                
            </div>   
               
      <!-- /.row -->
          </div>
        </div>
      </div>
    </div>
         
        </div>
      </div>

    </section>
    <!-- /.content -->

 

