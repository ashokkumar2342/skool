 
<div class="modal-content" >
  <div class="modal-header">
    <button type="button" class="close" id="btn_close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><b>{{ @$academicYear->id? 'Edit' : 'Add' }} </b>&nbsp;<i class="small text-muted"></i></h4> 
  </div>
  <div class="modal-body">
     <form id="act_add" content-refresh="table_academic_year" button-click="btn_close" method="post" action="{{ route('admin.academicYear.update',Crypt::encrypt(@$academicYear->id)) }}" class="add_form" no-reset="true" button-click="btn-submit">
               {{ csrf_field() }}
              <div class="row" style="padding-bottom: 30px;">
               <div class="col-lg-12">                           
                    <div class="form-group">
                     {{ Form::label('academic_year','Academic Year',['class'=>' control-label']) }}
                      {{ Form::text('name',@$academicYear->name,['class'=>'form-control','placeholder'=>'Enter Academic Year','maxlength'=>'20']) }}
                      <p class="name text-center alert alert-danger hidden"></p>
                    </div>    
               </div>
                <div class="col-lg-12">                           
                    <div class="form-group">
                     {{ Form::label('start_date','Start Date',['class'=>' control-label']) }}
                      {{ Form::date('start_date',@$academicYear->start_date,['class'=>'form-control datepicker','id'=>'start_date','placeholder'=>"dd-mm-yyyy"]) }}
                      <p class="start_date text-center alert alert-danger hidden"></p>
                    </div>    
               </div> 
                <div class="col-lg-12">                           
                    <div class="form-group">
                     {{ Form::label('end_date','End Date',['class'=>' control-label ']) }}
                      {{ Form::date('end_date',@$academicYear->end_date,['class'=>'form-control datepicker','placeholder'=>"dd-mm-yyyy"]) }}
                      <p class="end_date text-center alert alert-danger hidden"></p>
                    </div>    
               </div>
               <div class="col-lg-12">                           
                    <div class="form-group">
                     {{ Form::label('description','Description',['class'=>' control-label']) }}
                      {{ Form::text('description',@$academicYear->description,['class'=>'form-control','placeholder'=>'Enter Description','maxlength'=>'200']) }}
                      <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                    </div>    
               </div>
               <div class="col-lg-12 text-center">                           
                    <div class="form-group" style="padding-top: 20px;">
                     <input class="btn btn-success" type="submit"> 
                    </div>    
               </div>      
               
                  
               
               
               </form>
                 
    </div>
  </div>
