@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Test Date Wise Send SMS<small></small></h1>
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body">
           <form action="{{ route('admin.exam.classtest.test.date.wise.send.sms.show') }}" method="post" class="add_form" success-content-id="class_test_show" no-reset="true">
             <div class="row">
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
                          <th class="label-warning" style="width: 90px"><input class="checked_all" type="checkbox">Checked</th> 
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
              <div class="col-lg-12 text-center">
               <input type="submit" class="btn btn-primary" value="SMS Send" name="">
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
 </script>
 <script type="text/javascript">
        $('.checked_all').on('change', function() {   
                $('.checkbox').prop('checked', $(this).prop("checked"));              
        });
        //deselect "checked all", if one of the listed checkbox product is unchecked amd select "checked all" if all of the listed checkbox product is checked
        // $('.checkbox').change(function(){ //".checkbox" change 
        //     if($('.checkbox:checked').length == $('.checkbox').length){
        //            $('.checked_all').prop('checked',true);
        //     }else{
        //            $('.checked_all').prop('checked',false);
        //     }
        // });       
</script>
  @endpush
