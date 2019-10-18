  <table id="route_table" class="display table">                     
    <thead>
        <tr>
            <th>Sr.no</th >
     
            <th>Boarding Points</th>  
            <th>Morning Time</th> 
            <th>Evening Time</th> 
            <th>Action</th>                                                            
        </tr>
    </thead>
    <tbody>

        @if (!$routesDetail ==null)
            
        
        <?php $datas = explode(',',$routesDetail->boarding_point_id);   ?>
        <?php $morning_times = explode(',',$routesDetail->morning_time);   ?>

        @foreach ($boardingPoints as $boardingPoint)
           @if(in_array($boardingPoint->id, $datas))  
           <tr> 
        <td>
                         
                  <td>{{ ++$loop->index }}</td>
           
        </td>   
        <td>
                         
                 {{ $boardingPoint->name  }}
           
        </td>        
         <td>
         </td>
         <td>
         </td>
     </td>

        
           <td>
             @if(App\Helper\MyFuncs::menuPermission()->d_status == 1)
             <a href="{{ route('admin.routesDetail.delete',Crypt::encrypt($routesDetail->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn_delete btn btn-danger btn-xs"    ><i class="fa fa-trash"></i></a>
             @endif
        </td>

        </tr>    

         
           @endif
           @endforeach
       
        @endif
    </tbody>
         

</table>