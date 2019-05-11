
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
        <h4 class="modal-title">Book Issue Details Add</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12">
          <form action="{{ route('admin.library.book.issue.details.store') }}" method="post" class="add_form" button-click="btn_member_ship_facility_table_show,btn_close">
                   {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-4">
                      <label>Member Ship Type</label>
                      <select name="member_ship_type" class="form-control" >
                        <option disabled selected="">Select Member Ship Type</option> 
                        @foreach ($librarymembertypes as $librarymembertype) 
                        <option value="{{ $librarymembertype->id }}">{{ $librarymembertype->member_ship_type }}</option>
                        @endforeach 
                      </select>
                    </div>
                    <div class="col-lg-4">
                      <label>Accession No</label>
                     <select name="accession_no" class="form-control">
                      <option selected disabled >Select Accession No</option> 
                      @foreach ($bookaccessionss as $bookaccessions) 
                       <option value="{{ $bookaccessions->id }}">{{ $bookaccessions->accession_no }}</option>
                      @endforeach 
                     </select> 
                    </div>
                    <div class="col-lg-4">
                      <label>No of Ticket</label>
                      <select name="no_of_ticket" class="form-control">
                        <option selected disabled>Select Ticket</option>}
                        option
                        @foreach($tickets as $ticket)
                        <option value="{{ $ticket->id }}">{{ $ticket->name }}</option>
                        @endforeach 
                      </select>
                      
                    </div>
                    <div class="col-lg-4">
                      <label>Issue Date</label>
                      <input type="date" name="issue_date" class="form-control">  
                    </div>
                   
                    <div class="col-lg-4">
                      <label>Issue Upto Date</label>
                      <input type="date" name="issue_upto_date" class="form-control">  
                    </div>
                    <div class="col-lg-4">
                      <label>Return Date</label>
                      <input type="date" name="return_able" class="form-control">  
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
   </div>

    <!-- /.content -->

 

