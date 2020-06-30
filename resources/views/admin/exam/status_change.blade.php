@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Status Change For Class Test<small></small></h1>
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body">
           <form action="{{ route('admin.exam.classtest.test.date.wise.send.sms.show') }}" method="post" class="add_form" success-content-id="class_test_show" no-reset="true">
             <div class="row">
              @php
                $date=date('Y-m-d');
              @endphp
              <div class="col-lg-4 form-group">
                <label>Test Date</label>
                <input type="date" name="test_date" class="form-control"> 
              </div>
              <div class="col-lg-4 form-group"> 
                <input type="submit"   class="btn btn-success form-control" value="Test Show" style="margin-top: 24px"> 
              </div> 
              </div> 
             </form>
             <form action="{{ route('admin.mark.detail.send.sms.marks.test.filter.send') }}" method="post" class="add_form">
              <table id="route_table" class="display table">                     
                  <thead>
                      <tr>
                          <th style="width: 90px"><input class="checked_all" type="checkbox"></th> 
                          <th>Year</th> 
                          <th>Class/Section</th>  
                          <th>Subject</th>                                             
                          <th>Date</th>                                          
                          <th>M marks</th>                                            
                          <th>H Marks</th>                      
                          <th>A Marks</th>                                            
                          <th>Description</th>                    
                      </tr>
                  </thead>
                  <tbody id="class_test_show">
                      
                  </tbody> 
              </table>
              <div class="panel panel-primary"> 
              <div class="col-lg-10 text-center" style="margin: 10px">
                <label>Status</label>
                <select name="status" class="" style="width: 110px">
                  <option selected disabled>Select Status</option>
                  <option value="">Add Marks</option>
                  <option value="">Verify Marks</option>
                  <option value="">Compile</option>
                  <option value="">Send Test Info</option>
                  <option value="">Send Marks Info</option>
                </select>
               <input type="submit" class="btn btn-primary btn-sm" value="Status Change" name="">
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
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
    $(document).ready(function(){
        $('#room_table').DataTable();
    });
     $('.checked_all').on('change', function() {   
                $('.checkbox').prop('checked', $(this).prop("checked"));              
        });
 </script>
  @endpush
