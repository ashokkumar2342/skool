@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Combine Class SubJect Group<small>list</small> </h1> 
    </section>  
    <section class="content"> 
      <form action=" " method="post" class="add_form"> 
          {{ csrf_field() }}
      <div class="box"> 
        <div class="box-body">
        
          <div class="col-lg-4">
            <label>Subject</label>
            <select name="subject" class="form-control " multiselect="true" onchange="callAjax(this,'{{ route('admin.combine-class-select_subject_wise-group') }}','select_class_group')">
              <option selected disabled>Select Subject</option>
                @foreach ($subjectTypes as $subjectType)
                <option value="{{ $subjectType->id }}">{{ $subjectType->name }}</option> 
                @endforeach 
            </select> 
          </div> 
         
        </div>
      </div>
       <div class="box"> 
        <div class="box-body">
          <div id="select_class_group">
            
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
