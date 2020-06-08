 @extends('admin.layout.base')
@section('body') 
  <section class="content-header"> 
  <button type="button" class="btn btn-info btn-sm pull-right" onclick="callPopupLarge(this,'{{ route('admin.exam.test.add.form') }}'+'?academic_year_id='+$('#academic_year_id').val()+'&class_id='+$('#class_id').val()+'&section_id='+$('#section_id').val()+'&subject='+$('#subject').val())">Add Class Test</button> 
   <h1>Class Test Details <small>List</small></h1>
  </section>
   <section class="content">
       <div class="box"> 
           <div class="box-body">  
               <form class="add_form" success-content-id="class_test_show" action="{{ route('admin.exam.classtest.table.show') }}" method="post" data-table="route_table" no-reset="true">              
                   {{ csrf_field() }}
                   <div class="row">                 
                       <div class="col-lg-3 form-group">
                           <label>Academic Year</label>
                           <select name="academic_year_id" id="academic_year_id" class="form-control">
                               <option selected disabled>Select Academic Year</option>
                               @foreach ($academicYears as $academicYear)
                               <option value="{{ $academicYear->id }}"{{ $academicYear->status==1?'selected':'' }}>{{ $academicYear->name }}</option> 
                               @endforeach 
                           </select>
                       </div>
                       <div class="col-lg-3 form-group">
                           <label>Class</label>
                           <select name="class_id" id="class_id" class="form-control" onchange="callAjax(this,'{{ route('admin.exam.classtest.class.section.subject') }}','section_div')">
                               <option disabled selected>Select Class</option>
                               @foreach ($classTypes as $classType)
                               <option value="{{ $classType->id }}"{{ $StudentDefaultValue->class_id==$classType->id?'selected':'' }}>{{ $classType->name }}</option>
                               @endforeach
                           </select> 
                       </div>
                       <div id="section_div"> 
                       </div>
                       <div class="col-lg-12 form-group text-center">
                        <input type="submit" id="btn_class_test_show" class="btn btn-success" value="Test Show" name="" style="width: 20%"> 
                       </div> 
                   </div>
               </form>
               <div class="table-responsive" id="class_test_show">
                   
               </div>
           </div>
       </div>
   </section>  
 @endsection
 @push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
  $(window).load(function(){
   $('#class_id').trigger('change');
});   
      
 </script>
  @endpush
     
 
