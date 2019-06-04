
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
        <h4 class="modal-title">Book Request</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12">
          <form action="{{ route('admin.library.book.request.date.store') }}" method="post" class="add_form" button-click="btn_close,btn_book_reserve_table_show">
                   {{ csrf_field() }}
                   <div class="row">
                      <div class="col-lg-4">
                        <label>Member Ship Registration No</label>
                        <select name="member_ship_registration_no" class="form-control select2" onchange="callAjax(this,'{{ route('admin.library.book.reserve.registration.wise.history') }}','history_reserve')" >
                          <option disabled selected="">Select Registration No</option> 
                          @foreach ($memberShipDetails as $memberShipDetail) 
                          <option value="{{ $memberShipDetail->id }}">{{ $memberShipDetail->member_ship_registration_no }}</option>
                          @endforeach 
                        </select>

                          <label>Book Name</label>
                         <select name="book_name" class="form-control select2" onchange="callAjax(this,'{{ route('admin.library.book.reserve.accession.wise') }}','book_accession_no')">
                          <option selected disabled >Select Book Name</option> 
                          @foreach ($booktypes as $booktype) 
                           <option value="{{ $booktype->id }}">{{ $booktype->name }}</option>
                          @endforeach 
                         </select> 
                        
                        <div id="book_accession_no"> 
                        </div> 
                      </div> 
                       <div class="col-lg-8" id="history_reserve">
                        
                         </div>

                      </div>
                       
                   
                   <div class="row">
                    <div class="col-lg-12 text-center" style="padding-top: 10px">
                      <input type="submit" class="btn btn-success">
                    </div>
                     
                   </div>
                 
                
              </form>
            </div>
            {{-- <div class="row">
              <div class="col-lg-6">
              
             </div>
             
              <div class="col-lg-6" id="book_accession_no_wise_history"> 
              </div>
              
            </div> --}}




                {{-- <div class="col-lg-12">
                  <div class="row">
                    <div class="col-lg-6">
                    <div id="history_reserve"> 
                  </div>  
                  <div class="row">
                    <div class="col-lg-6">
                    <div id="book_accession_no_wise_history"> 
                  </div> 
                </div> --}}
                   
                
                     
                        
                     {{--  <div id="book_accession_no_wise_history"> 
                     </div> --}}
                  </div>
                 </div>
             
          </div>
          
        </div>
      </div>
   </div>

    <!-- /.content -->

 

