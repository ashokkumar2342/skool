 
   <form action="{{ route('admin.account.menu.permission.check') }}" method="post" no-reset="true" class="add_form">
                {{ csrf_field() }} 
    <section class="content">
      <div class="modal-dialog" style="width:90%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Menu List</h4>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box">
            <div class="box-header">
              <div class="row">
             
                 
                  <div class="row">
                    <div class="col-lg-12 text-right">
                      <input type="submit" class="btn btn-success" value="Submit" >
                    </div>
                  </div>
              </div>       
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sn</th>                  
                  <th>Menu Name</th>                   
                  <th>Sub Menu</th>                   
                  <th>R - W - D</th>                  
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>

                @foreach($minus as $minu)
                <tr>
                  <td>{{ $minu->id }}</td>
                  <td>{{ $minu->minutypes->name or ''}}</td>                  
                  <td>{{ $minu->subMenuTypes->name or '' }}</td>                  
                  <td> 
                  <input type="hidden" name="r_status[{{ $minu->id }}]"  value="0"> 
                  <input type="checkbox" name="r_status[{{ $minu->id }}]" {{$minu->r_status==1?'checked':''}} value="1">                
                  <input type="hidden" name="w_status[{{$minu->id  }}]"  value="0"> 
                  <input type="checkbox" name="w_status[{{$minu->id  }}]" {{$minu->w_status==1?'checked':''}} value="1">  
                  <input type="hidden" name="d_status[{{ $minu->id }}]"  value="0">               
                  <input type="checkbox" name="d_status[{{ $minu->id }}]" {{$minu->d_status==1?'checked':''}}  value="1">                
                 {{--  <a href="{{ route('admin.minu.r_status',$minu->id) }}" data-parent="tr" class="label {{ ($minu->r_status == 1) ?'btn-success':'btn-danger'}} btn btn-xs">{{ ($minu->r_status == 1)? 'A' : 'D' }}</a>
                  <a href="{{ route('admin.minu.w_status',$minu->id) }}" data-parent="tr" class="label {{ ($minu->w_status == 1) ?'btn-success':'btn-danger'}} btn btn-xs">{{ ($minu->w_status == 1)? 'A' : 'D' }}</a>
                  <a href="{{ route('admin.minu.d_status',$minu->id) }}" data-parent="tr" class="label {{ ($minu->d_status == 1) ?'btn-success':'btn-danger'}} btn btn-xs">{{ ($minu->d_status == 1)? 'A' : 'D' }}</a> --}}
                   
                  </td>
                  <td>
                    <a href="{{ route('admin.minu.status',$minu->id) }}" data-parent="tr" class="label {{ ($minu->status == 1) ?'btn-success':'btn-danger'}} btn btn-xs">{{ ($minu->status == 1)? 'Active' : 'Inactive' }}</a>
                  </td>                  
                   
                </tr> 
                @endforeach
                </tbody>
              </table>
            </div>
            <div class="row">
              <div class="col-lg-12 text-center">
                <input type="submit" class="btn btn-success" value="Submit" >
              </div>
            </div>
            
          </form> 
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
    </div>
  </div>
</div>

      <!-- /.row -->
    </section>
    <!-- /.content -->

 @push('scripts')
<script type="text/javascript">
//  $( "#status" ).click(function() {
//   $.ajax({
//     method:"post",
//     url:"";
//     data:
//   })
//     $.ajax({
//           method: "get",
//           url: "",
//           data: { id: $(this).val() }
//         })
//         .done(function( response ) {            
//             if(response.length>0){
//                 $('#class').html('<option value="">Select Class</option>');
//                 for (var i = 0; i < response.length; i++) {
//                     $('#class').append('<option value="'+response[i].id+'">'+response[i].alias+'</option>');
//                 } 
//             }
//             else{
//                 $('#class').html('<option value="">Not found</option>');
//             }
            
//         });
//     });
// });
 
</script>
@endpush