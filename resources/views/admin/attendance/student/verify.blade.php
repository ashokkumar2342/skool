@extends('admin.layout.base')
@section('body') 
<section class="content-header">
<h1>Attendance Verify</h1>
     
</section>
    <section class="content">
      	<div class="box">  
            <div class="box-body">
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Class</label>
                    <select name="class_id" id="class_id" class="form-control"  onchange="callAjax(this,'{{ route('admin.teacher.class.wise.section.addForm') }}','section_id')">
                      <option selected disabled>Select Class</option>}
                      option
                      @foreach ($classes as $class)
                          <option value="{{ $class->id }}">{{ $class->name }}</option>  
                      @endforeach
                    </select> 
                  </div> 
                </div> 
                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Section</label>
                    <select name="section_id" class="form-control" id="section_id" onchange="callAjax(this,'{{ route('admin.attendance.student.search') }}'+'?class_id='+$('#class_id').val()+'&section_id='+$('#section_id').val(),'attendance_table')"> 
                    </select> 
                  </div> 
                </div> 
                <div class="col-lg-4">                         
                  <div class="form-group">
                      {{ Form::label('date','Date',['class'=>' control-label']) }}   
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>                          
                      {{ Form::text('date',date('d-m-Y'),array('class' => 'form-control','data-inputmask'=>"'alias': 'dd/mm/yyyy'", 'id="datepicker"', 'required', 'disabled' )) }}
                      </div>
                      <p class="text-danger">{{ $errors->first('date') }}</p>
                  </div>
              </div>
              </div>
              <form action="{{ route('admin.attendance.student.verify.store') }}" method="post" class="add_form">
                {{ csrf_field() }}
                <div id="attendance_table">
                  
                </div> 
               </form> 
            </div> 
        </div> 
    </section>
@endsection
 @push('scripts')

 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script type="text/javascript">
   $( ".datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
    
        $('.checked_all').on('change', function() {     
                $('.checkbox').prop('checked', $(this).prop("checked"));              
        });
        //deselect "checked all", if one of the listed checkbox product is unchecked amd select "checked all" if all of the listed checkbox product is checked
        $('.checkbox').change(function(){ //".checkbox" change 
            if($('.checkbox:checked').length == $('.checkbox').length){
                   $('.checked_all').prop('checked',true);
            }else{
                   $('.checked_all').prop('checked',false);
            }
        });       

    

  </script>

 

@endpush