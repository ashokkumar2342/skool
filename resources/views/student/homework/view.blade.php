<!-- Modal -->
<style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 1px;;
  }
  
</style>
 
  <div class="modal-dialog" style="width:90%"> 
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Homework</h4>
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
       <div class="row"> 
        <div class="col-md-12"> 
          <p>{!! $homeworkList->homework !!}</p>
        </div> 
      </div>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
