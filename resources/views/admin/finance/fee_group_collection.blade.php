
<!-- Main content -->

<style type="text/css" media="screen">
    .bd{
        border-bottom: #eee solid 1px;;
    }

</style>

<div class="modal-dialog" style="width:50%">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center">{{ @$feeGroups?'Edit' : 'Add' }} Fee Group</h4>
        </div>
        <div class="modal-body">

            <form action="{{ route('admin.feeGroupDetail.post',@$feeGroups) }}" method="post" class="add_form" button-click="btn_close" content-refresh="fee_group_table">
                {{ csrf_field() }}
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <input type="hidden" name="fee_group_id" value="{{ @$feeGroups }}">
                            <th>Sr.No.</th>
                            <th>Fee Structure Name</th>  
                            <th><button type="button" onclick="callChecked(this)" data-click="yes" id="yes" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Is Applicable</button> </th>
                            <th ><button type="button" onclick="callChecked(this)" data-click="no" id="no" class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Is Applicable</button>  </th> 
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $loopId=1;
                        @endphp
                        @foreach ($feeStructures as $feeStructure)
                        <tr>
                            <td>{{ $loopId++ }}</td> 
                            <td>{{ $feeStructure->name }}</td> 
                            <td><input type="radio" name="value[{{ $feeStructure->id  }}]" value="1" onclick="$('#yes').prop('checked', true)" class="{{ str_replace(' ', '_', strtolower(1)) }}"> Yes</td> 
                            <td><input type="radio" name="value[{{ $feeStructure->id  }}]" value="2" onclick="$('#no').prop('checked', true)" class="{{ str_replace(' ', '_', strtolower(2)) }}"> No</td> 

                        </tr>
                        @endforeach
                    </tbody>
                </table>  
                <div class="text-center">
                    <input type="submit" class="btn btn-success" >

                </div>
            </form>  
        </div>

    </div>
</div>
<script>
  function callChecked(obj) { 
    var value =obj.getAttribute('data-click');
    
     if(value=='yes'){
        $('#yes').prop('checked', true);
     }else if(value=='no'){
        $('#no').prop('checked', true);
     } 
  }    
 
   
   
 </script>
<!-- /.content -->


