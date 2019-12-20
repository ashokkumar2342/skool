@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Cloning Fee Details<small></small> </h1>
       
    </section>  
    <section class="content"> 
          <div class="box"> 
            <div class="box-body">
              <form action="{{ route('admin.finance.cloning.fee.all.details.show') }}" method="post" class="add_form" success-content-id="cloning_fee_all_details_result" no-reset="true">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-lg-3 form-group">
                    <label>Reference Academic Year</label>
                    <select name="reference_academic_year" class="form-control">
                      <option selected disabled>Select Reference Academic Year</option>
                      @foreach ($academicYears as $academicYear)
                        <option value="{{ $academicYear->id }}">{{ $academicYear->name }}</option>  
                       @endforeach 
                    </select> 
                  </div>
                  <div class="col-lg-3 form-group">
                    <label>New Academic Year</label>
                    <select name="new_academic_year" class="form-control">
                      <option selected disabled>Select New Academic Year</option>
                      @foreach ($academicYears as $academicYear)
                        <option value="{{ $academicYear->id }}">{{ $academicYear->name }}</option>  
                       @endforeach 
                    </select> 
                  </div>
                  <div class="col-lg-3 form-group">
                    <label>For Class</label>
                    <select name="class_id" class="form-control">
                      <option selected disabled>Select Class</option>
                      @foreach ($classTypes as $classType)
                        <option value="{{ $classType->id }}">{{ $classType->name }}</option>  
                       @endforeach 
                    </select> 
                  </div>
                  <div class="col-lg-3 form-group">
                    <input type="submit" class="btn btn-success" id="bnt_cloning_fee_all_details_show" style="margin-top: 24px" value="Show">
                     
                  </div> 
                </div> 
              </form>
              <form action="{{ route('admin.finance.cloning.fee.all.details.store') }}" method="post" class="add_form" button-click="bnt_cloning_fee_all_details_show">
                {{ csrf_field() }}
                <div id="cloning_fee_all_details_result"> 
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
     $(document).ready(function(){
        $('#event_type_data_table').DataTable();
    });

     $('#btn_event_type_table_show').click();
  </script>
  @endpush
     
 
 