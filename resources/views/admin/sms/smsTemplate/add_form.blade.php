
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ $messagePurposes->name }}</h4>
      </div>
      <div class="modal-body"> 
             <form action="{{ route('admin.sms.template.store') }}" method="post" class="add_form" select-triger="message_purpose_box" button-click="btn_close">
                   {{ csrf_field() }}
                   <input type="hidden" name="message_purpose_id" value="{{ $messagePurposes->id }}">
                   <div class="col-lg-12 form-group">
                   <label>Hints : &nbsp;</label> 
                   {{ $messagePurposes->Variables_Description }}
                   </div>
                   <div class="col-lg-12"> 
                    <div class="form-group">
                      <label>Name</label>
                        <input type="text" name="name" class="form-control" maxlength="50" placeholder="Name">  
                    </div>
                   </div>
                   <div class="col-lg-12"> 
                     <div class="form-group">
                      <label>Message</label>
                      <textarea class="textarea" name="message" placeholder="Message"
                                style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> 
                      </textarea>
                    </div>
                  </div>
                  <div class="col-lg-12"> 
                      <div class="form-group">
                        <label>Description</label>
                      <textarea class="textarea" name="description" placeholder="Description"
                                style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                  
                      </textarea>
                    </div>
                  </div>
                   
               
                   <div class="row">
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                      <input type="submit" class="btn btn-success">
                    </div>
                     
                   </div>
                 
                
              </form>
                
          
               
      <!-- /.row -->
          </div>
         
        </div>
      </div>
     
    <!-- /.content -->

 
