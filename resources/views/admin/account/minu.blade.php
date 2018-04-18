@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box">
            <div class="box-header">
              <div class="row">
                  <div class="col-md-6">
                   <h3 class="box-title">Minu List</h3>                    
                  </div>
                  <div class="col-md-6 text-right">
                    <a href="{{ route('admin.account.list') }}" title="back" class="btn btn-success">Back</a>                    
                  </div>
              </div>       
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sn</th>                  
                  <th>Minu Name</th>                   
                  <th>R - W - D</th>                  
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>

                @foreach($minus as $minu)
                <tr>
                  <td>{{ $minu->id }}</td>
                  <td>{{ $minu->minutypes->name }}</td>                  
                  <td>                   
                  <a href="{{ route('admin.minu.r_status',$minu->id) }}" data-parent="tr" class="label {{ ($minu->r_status == 1) ?'btn-success':'btn-danger'}} btn btn-xs">{{ ($minu->r_status == 1)? 'A' : 'D' }}</a>
                  <a href="{{ route('admin.minu.w_status',$minu->id) }}" data-parent="tr" class="label {{ ($minu->w_status == 1) ?'btn-success':'btn-danger'}} btn btn-xs">{{ ($minu->w_status == 1)? 'A' : 'D' }}</a>
                  <a href="{{ route('admin.minu.d_status',$minu->id) }}" data-parent="tr" class="label {{ ($minu->d_status == 1) ?'btn-success':'btn-danger'}} btn btn-xs">{{ ($minu->d_status == 1)? 'A' : 'D' }}</a>
                   
                  </td>
                  <td>
                    <a href="{{ route('admin.minu.status',$minu->id) }}" data-parent="tr" class="label {{ ($minu->status == 1) ?'btn-success':'btn-danger'}} btn btn-xs">{{ ($minu->status == 1)? 'Active' : 'Inactive' }}</a>
                  </td>                  
                   
                </tr> 
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
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