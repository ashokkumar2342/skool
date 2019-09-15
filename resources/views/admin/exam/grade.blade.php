@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Grade </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
	                <form action="{{ route('admin.exam.grade.detail.grade.store') }}" method="post" class="add_form" content-refresh="grade_table">
                    {{ csrf_field() }}
                   <div class="row">
                    <div class="col-lg-2">
                      <label>From Marks</label>
                      <input type="text" name="from_marks" class="form-control" required=""> 
                    </div>
                    <div class="col-lg-2">
                      <label>To Marks</label>
                      <input type="text" name="to_marks" class="form-control" required=""> 
                    </div>
                    <div class="col-lg-2">
                      <label>Grade Short</label>
                      <input type="text" name="grade_short" class="form-control" required=""> 
                    </div>
                    <div class="col-lg-3">
                      <label>Grade Full</label>
                      <input type="text" name="grade_full" class="form-control" required=""> 
                    </div>
                    <div class="col-lg-3">
                      <label>Color</label>
                      <select name="color" class="form-control" >
                         <option selected disabled>Select Color</option>
                         <option value="label label-success">Green</option>
                         <option value="label label-warning">Yellow</option>
                         <option value="label label-primary">Blue</option>
                         <option value="label label-danger">Red</option>
                         
                          
                       </select> 
                    </div> 
                    <div class="col-lg-12 text-center">
                      <input type="submit" class="btn btn-success" style="margin-top:  10px">
                      
                    </div>
                   </div>
                  </form>
                </div> 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

            <div class="box">             
              <!-- /.box-header -->
                <div class="box-body">
                    <table class="table" id="grade_table">   
                       <thead>
                         <tr>
                           <th>From Marks</th>
                           <th>To Marks</th>
                           <th>Grade Short</th>
                           <th>Grade Full</th>
                           <th>Color</th>
                         </tr>
                       </thead>
                       <tbody>
                        @foreach($grades as $grade)
                         <tr>
                           <td>{{ $grade->from_marks }}</td>
                           <td>{{ $grade->to_marks }}</td>
                           <td>{{ $grade->grade_short }}</td>
                           <td>{{ $grade->grade_full }}</td>
                           <td>{{ $grade->color }}</td>
                         </tr>
                         @endforeach
                       </tbody>
                     </table> 
                </div>
            </div>    

           
 
    </section>
    <!-- /.content -->
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
 
@endpush
@push('scripts')
 <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript">
   
 </script>
   
    
@endpush