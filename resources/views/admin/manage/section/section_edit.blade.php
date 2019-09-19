 <div class="modal-dialog" style="width:90%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Section Edit</h4>
      </div>
      <div class="modal-body">
      	<form action="{{route('admin.section.update',$sectionType->id)}}" class="add_form">
      		{{csrf_field()}}
     
      		<div class="row">
      			<div class="col-lg-8">
              <label>Section Name</label>
      				<input type="text" name="name" class="form-control" value="{{$sectionType->name}}"> 
      			</div> 
            <div class="col-lg-8">
              <label>Section Code</label>
              <input type="text" name="code" class="form-control" value="{{$sectionType->code}}"> 
            </div> 
      			<div class="col-lg-2"> 
      			  <input type="submit" value="Save" class="btn btn-success">
      			</div> 
      		</div>
      	</form>
       
           
      </div>
    </div>
</div>
