@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <button type="button" class="btn-sm btn-info pull-right" onclick="callPopupLarge(this,'{{ route('admin.hr.master.deduction.add')}}')">Add Deduction</button>
    <h1>Deductions<small>List</small> </h1> 
    </section>  
    <section class="content"> 
          <div class="box"> 
            <div class="box-body">
              <table class="table" id="departments_table">
                <thead>
                  <tr>
                    <th>Sr.No.</th>
                    <th>Deduction</th>
                    <th>Description</th> 
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $arrayId=1;
                  @endphp
                  @foreach ($deductions as $deduction)
                        <tr>
                          <td>{{ $arrayId++ }}</td>
                          <td>{{ $deduction->deduction }}</td>
                          <td>{{ $deduction->description }}</td>
                          
                          <td>
                            <a href="#" title="Edit" class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.hr.master.deduction.add',Crypt::encrypt($deduction->id))}}')"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('admin.hr.master.deduction.delete',Crypt::encrypt($deduction->id)) }}" title="Delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></td>
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
        $('#departments_table').DataTable();
    });

     
  </script>
  @endpush
     
 
 