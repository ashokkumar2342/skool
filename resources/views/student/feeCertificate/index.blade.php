  @extends('admin.layout.base')
  @section('body')
    <!-- Main content -->
    <section class="content-header">     
      <h1>Fee Certificate<small>List</small> </h1>       
      </section>  
      <section class="content">
        <div class="box"> 
             <div class="box-body"> 
                    
                      <div class="col-lg-3">
                                  <label>Academic Year</label>
                                   <select name="academic_year_id" id="academic_year_id" class="form-control">
                                    @foreach ($academicYears as $academicYear)
                                    <option value="{{$academicYear->id}}"{{$academicYear->status==1?'selected':''}}>{{$academicYear->name}}</option>
                                    @endforeach
                                   </select> 
                                  </div>
                    
                <div class="row">
                  <div class="col-xs-12">
                  @php
                   $userIdBySibling=new App\Helper\MyFuncs();    
                   $siblings= $userIdBySibling->getSiblingById(); 
                   $students=App\Student::whereIn('id',$siblings)->get();
                  @endphp
                  @foreach ($students as $student)
                  <div class="panel panel-danger" style="margin-top: 20px">
                       <div class="panel-body">
                          <div class="row">
                              <div class="col-lg-3">
                              Name : <b>{{ $student->name }}</b>
                              </div> 
                              <div class="col-lg-3"> 
                              Registration No. : <b>{{ $student->registration_no }}</b> 
                              </div> 
                              <div class="col-lg-2">
                              Class : <b>{{ $student->classes->name or '' }}</b>
                              </div>
                              <div class="col-lg-2">
                              Section : <b>{{ $student->sectionTypes->name or '' }}</b>
                              </div> 
                              <div class="col-lg-2">
                              <a href="{{ route('student.fee.certificate.download',$student->id) }}" target="blank" title="Fee Certificate Download" class="btn btn-xs btn-success"><i class="fa fa-download"></i></a>
                              </div>  
                          </div>
                        </div>
                      </div>    
                    @endforeach  
                  </div>
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
          $('#class_fee_details_data_table').DataTable();
      }); 
    </script>
  @endpush
       
   
   