
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
            <h4 class="modal-title text-center"> Add Fee Group</h4>
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
                            <th ><button type="button" onclick="callChecked(this)" data-click="no" id="no" class="btn btn-danger btn-xs"><i class="fa fa-check"></i> Is Applicable</button>  </th> 
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $loopId=1;
                        @endphp
                        @foreach ($feeStructures as $feeStructure)
                        @php
                            $checked =App\Model\FeeGroupDetail::where('isapplicable_id',1)->where('fee_group_id',@$feeGroups)->where('fee_structure_id',$feeStructure->id)->count()?'checked':'';
                            $checked2 =App\Model\FeeGroupDetail::where('isapplicable_id',2)->where('fee_group_id',@$feeGroups)->where('fee_structure_id',$feeStructure->id)->count()?'checked':'';
                             $success = (\App\Model\FeeGroupDetail::where(['fee_structure_id'=>$feeStructure->id,'isapplicable_id'=>1,'fee_group_id'=>@$feeGroups]))->first(); 
                             $danger = (\App\Model\FeeGroupDetail::where(['fee_structure_id'=>$feeStructure->id,'isapplicable_id'=>2,'fee_group_id'=>@$feeGroups]))->first(); 
                         $color ='';
                        if(!empty($success)){
                        $color = 'lebel label-success';
                        }else if(!empty($danger)){
                        $color = 'lebel label-danger';
                        } 
                       @endphp
           
                       <tr id="tr-{{ $feeStructure->id }}" class="{{ $color }}">
                            <td>{{ $loopId++ }}</td> 
                            <td>{{ $feeStructure->name }}</td> 
                            <td><input type="radio" {{ $checked }} name="value[{{ $feeStructure->id  }}]" value="1" onclick="$('#subject{{ $feeStructure->id }}').prop('checked', true);
                          if(this.value==1){
                            $('#tr-{{ $feeStructure->id }}').removeClass('lebel label-danger') 
                            $('#tr-{{ $feeStructure->id }}').addClass('lebel label-success')
                          } 

                          " class="yes{{ str_replace(' ', '_', strtolower(1)) }}"> Yes</td>

                            <td><input type="radio" {{ $checked2 }} name="value[{{ $feeStructure->id  }}]" value="2" onclick="$('#subject{{ $feeStructure->id }}').prop('checked', true);
                          if(this.value==2){
                            $('#tr-{{ $feeStructure->id }}').addClass('lebel label-danger') 
                            $('#tr-{{ $feeStructure->id }}').removeClass('lebel label-success')
                          } 

                          "  class="no{{ str_replace(' ', '_', strtolower(2)) }}"> No</td> 

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
 
 function callChecked(obj) { 
    var value =obj.getAttribute('data-click'); 
     if(value=='yes'){
        $('.yes1').prop('checked', true);
     }else if(value=='no'){
        $('.no2').prop('checked', true);
     } 
  }    
 
   
   
 </script>
<!-- /.content -->


