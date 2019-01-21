<!-- Modal -->
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
        <h4 class="modal-title">Addmissin</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
          <form class=" add_form"  button-click="btn_close,btn_approved" content-refresh="boardingPoint_table" action="{{ route('admin.registration.copyToStudent',$parentsAllow->registration_no) }}" method="post">              
          {{ csrf_field() }}                                       
             <div class="col-lg-12">                                             
                 <div class="form-group">
                  <label>Registration</label>
                   <input type="text" name="registration_no" class="form-control" value="{{ $parentsAllow->registration_no }}" disabled="">
                 </div>                                         
              </div> 
              <div class="col-lg-12">                                             
                  <div class="form-group">
                   <label>Admission No</label>
                    <input type="text" name="admission_no" class="form-control" maxlength="50" required="">
                  </div>                                         
               </div>
              <div class="col-lg-12">                         
                 <div class="form-group"> 
                  <label>Class</label>

                   <select name="class" onchange="callAjax(this,'{{ route('admin.section.selectBox') }}','sectionSelectBox')" class="form-control" required="">
                    <option value="" selected disabled>Select Class</option>
                    @foreach ($classes as $key=>$value)
                       <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach 
                    </select> 
                 </div>
             </div>
              <div class="col-lg-12" id="sectionSelectBox">                         
                 <div class="form-group" > 
                  <label>Section</label>
                   {!! Form::select('section',[], null, ['class'=>'form-control','id'=>'section','placeholder'=>'Select Section','required']) !!}
                 </div>
             </div> 
               <div class="col-lg-12 text-center">                                             
               <button class="btn btn-success" type="submit" id="btn_fee_account_create">Submit</button> 
              </div>                     
          </form> 
        </div> 
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
