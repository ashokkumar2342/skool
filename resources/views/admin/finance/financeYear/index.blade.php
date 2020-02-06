@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <a href="#" class="btn-sm btn-info pull-right" onclick="callPopupLarge(this,'{{ route('admin.finance.year.add.form')}}')">Add Finance Year</a>
    <h1>Finance Year<small>List</small> </h1> 
    </section>  
    <section class="content"> 
          <div class="box"> 
            <div class="box-body">
              <table class="table" id="table_finance_year">
                <thead>
                  <tr>
                    <th>Sr.No.</th>
                    <th>Finance Year</th>
                    <th>Start Date</th> 
                    <th>End Date</th> 
                    <th>Description</th> 
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $arrayId=1;
                  @endphp
                  @foreach ($financeYears as $financeYear)
                        <tr>
                          <td>{{ $arrayId++ }}</td> 
                          <td>{{ $financeYear->name }}</td> 
                          <td>{{ $financeYear->start_date }}</td> 
                          <td>{{ $financeYear->end_date }}</td> 
                          <td>{{ $financeYear->description }}</td> 
                          <td>
                            @if(App\Helper\MyFuncs::menuPermission()->r_status == 1)
                               <a href="#" class="btn btn-xs btn-info" onclick="callPopupLarge(this,'{{ route('admin.finance.year.add.form',Crypt::encrypt($financeYear->id))}}')"><i class="fa fa-edit"></i></a>
                                @endif 
                                @if(App\Helper\MyFuncs::menuPermission()->d_status == 1)
                               <a href="{{ route('admin.finance.year.delete',Crypt::encrypt($financeYear->id))}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                @endif 
                          </td> 
                        </tr> 
                  @endforeach
                </tbody>
              </table>
           
            </div>
          </div>
        </div>
      </div>
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
        $('#table_finance_year').DataTable();
    });

     
  </script>
  @endpush
     
 
 