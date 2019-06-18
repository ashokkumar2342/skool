@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Combine Class SubJect Group<small>list</small> </h1> 
    </section>  
    <section class="content"> 
      <form action="{{ route('admin.combine.class.subject.group.store') }}" method="post" class="add_form" content-refresh="select_class_wise_section"> 
          {{ csrf_field() }}
      <div class="box"> 
        <div class="box-body">
        <div class="row">
          <div class="col-lg-4">
            <label>Subject</label>
            <select name="subject" class="form-control" id="subject_id"  onchange="callAjax(this,'{{ route('admin.combine.class.select.subject.wise.class') }}','select_class_group')">
              <option selected disabled>Select Subject</option>
                @foreach ($subjectTypes as $subjectType)
                <option value="{{ $subjectType->id }}">{{ $subjectType->name }}</option> 
                @endforeach 
            </select> 
          </div> 
          <div id="select_class_group">
            
          </div>
          <div class="col-lg-4">
            <label>Group No</label>
            <select name="group_no" class="form-control" id="group_id" multiselect="true">
              <option selected disabled>Select Group No</option>
              <option value="1">Group 1</option>
              <option value="2">Group 2</option>
              <option value="3">Group 3</option> 
            </select> 
          </div>
        </div>
        </div>
        <div class="box"> 
          <div class="box-body">
          <div id="select_class_wise_section">
       </div> 
         
      </div>
    </div>
  </div>

</form> 
    </section> 
 @endsection
 @push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 
  @endpush
