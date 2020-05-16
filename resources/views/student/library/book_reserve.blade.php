  
  <!-- Main content -->
   
    <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4>Book Reserve</h4>
        
       
      </div>
      <div class="modal-body"> 
            
            <form action="{{ route('student.book.reserve.status.update') }}" method="post" class="add_form" button-click="btn_close" content-refresh="book_reserve_table">
                  {{ csrf_field() }} 
                  <div class="row">
                   <div class="col-lg-12">  
                    <label>Book Name</label>
                     <select name="book_name" class="form-control select2" onchange="callAjax(this,'{{ route('student.book.reserve.onchange') }}','history_accession_status')">
                       <option selected disabled>Select Book Name</option> 
                       @foreach($bookTypes as $bookType)
                      <option value="{{ $bookType->id }}">{{ $bookType->name }}</option> 
                      @endforeach
                      </select> 
                   </div> 
                 </div>
                  
                   <div class="col-lg-12 text-right" style="padding-top: 10px">
                     <input type="submit" class="btn btn-success">
                   </div> 
                   
                
               
             </form>    
            
           <div class="row"  id="history_accession_status">
             
            </div>     
      <!-- /.row -->
          </div>
            
         
        </div>
      </div>
     
    <!-- /.content -->

 