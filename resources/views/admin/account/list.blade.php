@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
            <!-- /.box-header -->            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List Users</h3> 
            </div> 
            <div class="box-body">
            <form action="{{ route('admin.account.list.user.generate') }}" method="post" target="blank">
            {{ csrf_field() }} 
            <button type="submit" class="btn btn-primary btn-sm pull-right" title="" style="margin:5px">PDF Generate</button>
              <div class="col-lg-12">
              <div class="table-responsive">
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Sr.No.</th> 
                  <th>Name</th>
                  <th>Mobile</th> 
                  <th>Email Id</th>
                  <th>Role</th> 
                 {{--  <th>R - W - D</th>  --}}                 
                  <th>Status</th>                  
                  <th>Menu</th>                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @php
                  $arrayId=1;
                     
                  @endphp
                @foreach($accounts as $account)
                {{-- @if ($account->id==1)
                  @continue
                @endif --}}
                <tr>
                  <td>{{ $arrayId ++ }}</td>
                  <input type="hidden" name="user_id[]" value="{{ $account->id }}"> 
                  <td>{{ $account->first_name }} {{ $account->first_last}}</td>
                  <td>{{ $account->mobile }}</td> 
                  <td>{{ $account->email }}</td>
                  <td>{{ $account->roles->name or '' }}</td>
                  {{-- <td>
                   
                  <a href="{{ route('admin.account.r_status',$account->id) }}" data-parent="tr" class="label {{ ($account->r_status == 1) ?'btn-success':'btn-danger'}} btn btn-xs">{{ ($account->r_status == 1)? 'A' : 'D' }}</a>
                  <a href="{{ route('admin.account.w_status',$account->id) }}" data-parent="tr" class="label {{ ($account->w_status == 1) ?'btn-success':'btn-danger'}} btn btn-xs">{{ ($account->w_status == 1)? 'A' : 'D' }}</a>
                  <a href="{{ route('admin.account.d_status',$account->id) }}" data-parent="tr" class="label {{ ($account->d_status == 1) ?'btn-success':'btn-danger'}} btn btn-xs">{{ ($account->d_status == 1)? 'A' : 'D' }}</a>
                   
                  </td> --}}
                  <td>
                    <a href="{{ route('admin.account.status',$account->id) }}" data-parent="tr" class="label {{ ($account->status == 1) ?'btn-success':'btn-danger'}} btn btn-xs">{{ ($account->status == 1)? 'Active' : 'Inactive' }}</a>
                  </td>  
                  <td>
                    
                     <a class="btn btn-info btn-xs"  onclick="callPopupLarge(this,'{{ route('admin.account.minu',[$account->id]) }}')"><i class="fa fa-bars"></i></a>
                   
                  </td>                
                  <td> 
                     
                  @if(App\Helper\MyFuncs::menuPermission()->r_status == 1)
                  <a href="#" onclick="callPopupLarge(this,'{{ route('admin.account.edit',[$account->id]) }}')" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                  @endif
                
                  @if(App\Helper\MyFuncs::menuPermission()->d_status == 1)

                  <a  href="{{ route('admin.account.delete',Crypt::encrypt($account->id)) }}" onclick="return confirm('Are you sure to delete this data ?')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                   
                  @endif
                  </td>
                </tr> 
                @endforeach
                </tbody>
              </table>
            </div>
            </div>
            </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
     $(document).ready(function(){
        $('#dataTable').DataTable();
    });
     
 
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
<script crossorigin src="https://unpkg.com/react@16/umd/react.development.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
   
@endpush