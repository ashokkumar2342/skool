<div class="col-lg-4">
	<label> Book Name</label>
	<input type="text" name="book_id" class="form-control" disabled="" value="{{ $bookAccession->booktype->name or ''}}"> 
 </div> 
 <div class="col-lg-4"> 
 	<label>Ticket No</label>
 	<input type="number" name="ticket_no" class="form-control" placeholder="Enter Your Ticket No" >
 </div>
 <div class="col-lg-12 text-center"> 
 	<input type="submit"  id="submit" class="btn btn-success" value="Submit" style="margin:10px" >
 </div>
  




