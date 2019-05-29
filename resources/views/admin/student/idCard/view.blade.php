@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Student Identity Card Generate</h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">  
            <div class="box-body">
            <form action="{{ route('admin.student.idcard.generate.store') }}" method="post" class="add_form">
              {{ csrf_field() }}
              <div  class="row">
                <div class="col-lg-4">
                  <label>Select Option</label>
                  <select name="event_for" class="form-control" multiselect-form="true" onchange="callAjax(this,'{{ route('admin.student.idcard.generate.classwise') }}','class_wise')">
                    <option selected disabled>Select Option</option> 
                    @foreach ($eventFors as $eventFor) 
                    <option value="{{ $eventFor->id }}">{{ $eventFor->name }}</option> 
                    @endforeach
                  </select> 
                </div>
                <div id="class_wise"> 
                 </div> 
                <div class="col-lg-4">
                  <label>Select Option</label>
                  <select name="template_name" class="form-control">
                    <option selected disabled>Select Option</option> 
                    @foreach ($studentIDCards as $studentIDCard) 
                    <option value="{{ $studentIDCard->id }}">{{ $studentIDCard->name }}</option> 
                    @endforeach
                  </select> 
                </div>
                
              </div>
              <div class="row text-center">
                <input type="submit" value="Generate" class="btn btn-success" style="margin: 15px">
                
              </div>
                
                
             </form> 
               
            </div> 
        </div>
          

            

           
 
    </section>
    <!-- /.content -->
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
 
@endpush
@push('scripts')
 <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script>
       $('#student_remark_data_table').DataTable();
    </script>
    
@endpush