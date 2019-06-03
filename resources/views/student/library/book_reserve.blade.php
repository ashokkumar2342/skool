  
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
        <h4></h4>
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
       
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
             <form action="{{ route('student.book.reserve.status.update') }}" method="post" class="add_form">
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
                     
                   
                     <div id="history_accession_status">
                    
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

 