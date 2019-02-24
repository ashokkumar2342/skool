<!-- Modal -->
<style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:100%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reciept List</h4>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
          @if ($datas=='student_required')
             <p>Registration Number Required</p>
           @else
            @include('admin.finance.cashbook.daterange_result')
          @endif

           
        </div> 
      </div>
    </div>
  </div> 
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
