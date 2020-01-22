@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
    <button type="button" class="btn-sm btn-info pull-right" onclick="callPopupLarge(this,'{{ route('admin.hr.master.experience.add')}}')">Add Experience</button>
    <h1>Experiences<small>List</small> </h1>
       
    </section>  
    <section class="content"> 
          <div class="box"> 
            <div class="box-body">
              <table class="table" id="experience_table">
                <thead>
                  <tr>
                    <th>Sr.No.</th>
                    <th>Experience</th>
                    <th>experience Code</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $arrayId=1;
                  @endphp
                  @foreach ($experiences as $experience)
                        <tr>
                          <td>{{ $arrayId++ }}</td>
                          <td>{{ $experience->name }}</td>
                          <td>{{ $experience->code }}</td>
                          <td>{{ $experience->description }}</td>
                          <td>
                            <a href="#" title="Edit" class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.hr.master.experience.add',Crypt::encrypt($experience->id))}}')"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('admin.hr.master.experience.delete',Crypt::encrypt($experience->id)) }}" title="Delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></td>
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
        $('#experience_table').DataTable();
    });

     
  </script>
  @endpush
     
 
 