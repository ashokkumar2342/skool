@extends('admin.layout.base')
@section('body') 
<section class="content-header">
<h1>  Student Attendence  </h1>
     
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
              <form action="{{ route('admin.attendance.student.save') }}" method="post" class="add_form">
                {{ csrf_field() }}
                <div id="attendance_table">
                  
                </div> 
               </form> 
            </div> 
        </div> 
    </section>
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
 @push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 
<script type="text/javascript">
     $(document).ready(function() {
    $('#dataTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel'
        ]
    } );
} );     
 </script>

 
<script>
 $( function() {
   
   $('button').click(function(){
       $('#attendance_table input:radio:checked').filter(':checked').click(function () {
         $(this).prop('checked', false);
       });
       $('.'+$(this).attr('data-click')).prop('checked', true);
     });
   });
 </script>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
 <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"> 
@endpush