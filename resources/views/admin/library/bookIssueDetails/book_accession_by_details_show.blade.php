<div class="col-lg-4">
	<label> Book Name</label>
	<input type="text" name="book_id" class="form-control" disabled="" value="{{ $bookAccession->booktype->name or ''}}"> 
 </div>
  
 <div class="col-lg-4">
	<label>No Of Pages</label>
	<input type="text" name="no_of_pages" class="form-control" disabled="" value="{{ $bookType->no_of_pages or ''}}"> 
 </div>
 <div class="col-lg-4">
	<label>Hall No</label>
	<input type="text" name="hall_no" class="form-control" disabled="" value="{{ $bookType->hall_no or ''}}"> 
 </div>
 <div class="col-lg-4">
	<label>Shelf No</label>
	<input type="text" name="shelf_no" class="form-control" disabled="" value="{{ $bookType->shelf_no or ''}}"> 
 </div>
 <div class="col-lg-4">
	<label>Box No</label>
	<input type="text" name="box_no" class="form-control" disabled="" value="{{ $bookType->box_no or ''}}"> 
 </div>
 <div class="col-lg-4"> 
 	<label>Ticket No</label>
 	<input type="number" name="ticket_no" class="form-control" placeholder="Enter Your Ticket No" >
 </div>
 <div class="col-lg-4"> 
 	<input type="submit" class="btn btn-success" value="Submit" style="margin: 25px" >
 </div>
  