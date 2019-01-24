@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1> New Student  <small>List</small> </h1>
      <ol class="breadcrumb">
              
      </ol>
</section>

    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table"> 
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Father's Name</th>
                            <th>Mother's Name</th>
                            <th>Admissin No</th>
                            <th>Registration No</th>
                            <th>Action</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                         @foreach($students as $student)
                   <tr> 
                     <td>{{ $student->name }}</td>
                     <td>{{ $student->classes->name or '' }}</td>
                     <td>{{ $student->father_name }}</td>
                     <td>{{ $student->mother_name }}</td>
                     <td> {{ $student->admission_no }} </td>
                     <td>{{ $student->registration_no }}</td>
                     <td>
                         <a href="{{ route('admin.new.student.status.change',Crypt::encrypt($student->id)) }}" class="btn btn-success">Final Admission</a>
                     </td>
                   </tr>
                   @endforeach
                    </tbody>
                </table> 
           
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- Trigger the modal with a button -->



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
        $('.table').DataTable();
    });
     
 </script>
@endpush