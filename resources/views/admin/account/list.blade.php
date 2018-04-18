@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Account List</h3>
            </div>
              

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sn</th>
                  <th>Date</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Role</th>
                  <th>Email Id</th>
                  <th>R - W - D</th>                  
                  <th>Status</th>                  
                  <th>Menu</th>                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($accounts as $account)
                <tr>
                  <td>{{ $account->id }}</td>
                  <td> {{ $account->created_at->format('d-m-Y') }} </td>
                  <td>{{ $account->first_name }} {{ $account->first_last}}</td>
                  <td>{{ $account->mobile }}</td>
                  <td>{{ $account->roles->name }}</td>
                  <td>{{ $account->email }}</td>
                  <td>
                   
                  <a href="{{ route('admin.account.r_status',$account->id) }}" data-parent="tr" class="label {{ ($account->r_status == 1) ?'btn-success':'btn-danger'}} btn btn-xs">{{ ($account->r_status == 1)? 'A' : 'D' }}</a>
                  <a href="{{ route('admin.account.w_status',$account->id) }}" data-parent="tr" class="label {{ ($account->w_status == 1) ?'btn-success':'btn-danger'}} btn btn-xs">{{ ($account->w_status == 1)? 'A' : 'D' }}</a>
                  <a href="{{ route('admin.account.d_status',$account->id) }}" data-parent="tr" class="label {{ ($account->d_status == 1) ?'btn-success':'btn-danger'}} btn btn-xs">{{ ($account->d_status == 1)? 'A' : 'D' }}</a>
                   
                  </td>
                  <td>
                    <a href="{{ route('admin.account.status',$account->id) }}" data-parent="tr" class="label {{ ($account->status == 1) ?'btn-success':'btn-danger'}} btn btn-xs">{{ ($account->status == 1)? 'Active' : 'Inactive' }}</a>
                  </td>  
                  <td>
                  <a href="{{ route('admin.account.minu',[$account->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-bars"></i></a>
                  </td>                
                  <td>
                  @if(Auth::guard('admin')->user()->w_status == 1)
                  <a href="{{ route('admin.account.edit',[$account->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                  @endif
                  @if(Auth::guard('admin')->user()->d_status == 1)

                  <a  href="{{ route('admin.account.delete',$account->id) }}" onclick="return confirm('Are you sure to delete this data ?')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                  @endif
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