@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    
    <h1>Class Subject Period<small>Details</small> </h1>
       
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
              
          <div class="box"> 
            <div class="box-body"> 
              <form action="{{ route('admin.class.subject.period.store') }}" method="post" class="add_form" content-refresh="class_subject_period_table">
                {{ csrf_field() }}
                <div class="row">
                  <div class="form-group col-lg-4">
                    <label>Class</label></br>
                    <select name="class" class="form-control"    multiselect-form="true" onchange="callAjax(this,'{{ route('admin.class.subject.period.class.wise.section') }}','select_section')">
                     <option selected disabled>Select Class</option>
                   
                      @foreach($classTypes as $classType)
                      <option value="{{ $classType->id }}">{{ $classType->name }}</option> 
                      @endforeach 
                    </select> 
                  </div>
                  <div id="select_section">
                    
                  </div>
                 
                  <div class="form-group col-lg-4">
                    <label>No of Period</label>
                    <input type="text" name="no_of_period" class="form-control" placeholder="Enter No of Period" maxlength="2" onkeypress='return event.charCode >= 48 && event.charCode <= 57'> 
                  </div>
                   <div class="form-group col-lg-4">
                    <label>Period Duration</label>
                    <input type="text" name="period_duration" class="form-control" placeholder="Enter Period Duration" maxlength="2" onkeypress='return event.charCode >= 48 && event.charCode <= 57'> 
                  </div>
                  
                </div>
                <div class="col-lg-12 text-center">
                  
                <input type="submit" class="btn btn-success" value="Submit" style="margin-top: 10px">
                </div> 
              </form>
               
             
          
          <table class="table" id="class_subject_period_table"> 
            <thead>
              <tr>
                <th>Class</th>
                <th>Section</th>
                <th>Subject</th>
                <th>No of Period</th>
                <th>Period Duration</th> 
                <th>Action</th> 
              </tr>
            </thead>
            <tbody>
              @foreach ($classSubjectPeriods as $classSubjectPeriod) 
                      <tr>
                        <td>{{ $classSubjectPeriod->classTypes->name or ''}}</td>
                        <td> {{ $classSubjectPeriod->sectionTypes->name or '' }} </td> 
                        <td>{{ $classSubjectPeriod->subjectType->name or '' }}</td>
                        <td>{{ $classSubjectPeriod->no_of_period }}</td>
                        <td>{{ $classSubjectPeriod->period_duration }}</td>
                        <td><a href="{{ route('admin.class.subject.period.delete',$classSubjectPeriod->id)}}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a></td>
                         
                      </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <!-- /.content -->

@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
     $(document).ready(function(){
        $('#class_subject_period_table').DataTable();
    });
  </script>
   <script type="text/javascript"> 
        // $('#btn_book_accession_table_show').click();
  

  </script>
  @endpush
     
 
 