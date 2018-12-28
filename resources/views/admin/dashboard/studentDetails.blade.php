

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
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Students Details</h4>
      </div>
      <div class="modal-body"> 
        <table class="table">
          <thead>
            <tr>
              <th>Class</th>
              <th>Students</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($classes as $class)
             <tr>
              <td>{{ $class->name }}</td>
              <td>{{ $students->where('class_id',$class->id)->count()  }}</td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
      </div>   
    </div>

  </div>

 