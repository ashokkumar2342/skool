@extends('admin.layout.base')
@section('body') 
  <section class="content-header"> 
    <h1>General Report<small>Details</small> </h1> 
    </section>  
    <section class="content">
       <div class="box"> 
        <div class="box-body">
          <form action="{{ route('admin.student.general.report.barcode') }}" method="post" target="blank" >
            {{ csrf_field() }}
            <div class="row">
              <div class="col-lg-3">
                <label>Report For</label>
                <select name="report_for" class="form-control">
                  <option selected disabled>Select Option</option> 
                  <option value="1">Stationery</option> 
                  <option value="2">Address</option> 
                  <option value="3">Identity Card</option> 
                </select> 
              </div>
              <div class="col-lg-3">
              <label>Report Wise</label> 
                <select name="report_wise" class="form-control" select2="true" onchange="callAjax(this,'{{ route('admin.student.general.report.for') }}','report_for_page')">
                  <option selected disabled>Select Option</option>
                  <option value="1">All</option>
                  <option value="2">Student</option>
                  <option value="3">Class</option> 
                </select>
              </div>
              <div id="report_for_page">
                
              </div>
              <div class="col-lg-12 text-center">
                <input type="submit" class="btn btn-success" style="margin-top: 24px"> 
              </div>
              
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
  s
  </script>
  @endpush
     
 
 