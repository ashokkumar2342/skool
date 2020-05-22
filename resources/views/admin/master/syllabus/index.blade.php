  @extends('admin.layout.base')
  @section('body')
    <!-- Main content -->
    <section class="content-header">
     <button onclick="callPopupLarge(this,'{{ route('admin.master.syllabus.add.form') }}')" class="btn btn-sm btn-info pull-right">Add Syllabus</button>     
      <h1>Syllabus <small>List</small> </h1>       
      </section>  
      <section class="content">
        <div class="box"> 
             <div class="box-body">
             <form action="{{ route('admin.master.syllabus.show') }}" method="post" class="add_form" success-content-id="syllsbus_list_show">
             {{csrf_field()}} 
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group"> 
                      <label >Academic Year</label>  
                      <select name="academic_year_id" id="fee_paid_upto" class="form-control">
                        
                        @foreach ($academicYears as $academicYear)
                         <option value="{{$academicYear->id}}"{{$academicYear->status==1?'selected':''}}>{{$academicYear->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group"> 
                      <label>Class</label>
                      <select name="class_id" class="form-control" id="class_id">
                         
                        @foreach ($classTypes as $classType) 
                        <option value="{{ $classType->id }}">{{ $classType->name or '' }}</option> 
                         @endforeach 
                      </select> 
                  </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group"> 
                      <input type="submit" value="Show" class="btn btn-success form-control" style="margin-top: 24px">
                  </div>
                </div>
              </div>
            </form>
            <div id="syllsbus_list_show">
              
            </div>  
          </div>
        </div>    
      </section>
      <!-- /.content -->

  @endsection
  @push('links')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">

  @endpush
  @push('scripts')
  <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript">
       $(document).ready(function(){
          $('#syllabus_last_table').DataTable();
      }); 
    </script>
  @endpush
       
   
   