@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Marks Details </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
                                 
                   <div class="col-lg-12">                         
                      <div class="form-group">
                          {{ Form::label('exam_schedule','Exam Schedule',['class'=>' control-label']) }}
                           <select name="exam_schedule" class="form-control" onchange="callAjaxUrl('{{ route('admin.mark.detail.studentSearch') }}'+'?exam_schedule='+this.value+'','student_details_Result')">
                             <option value="" selected disabled>Select Exam Schedule</option>
                             @foreach ($examSchedules as $examSchedule)
                                <option value="{{ $examSchedule->id }}">Class: {{ $examSchedule->classes->name }},  &nbsp;&nbsp;&nbsp; Subject: {{ $examSchedule->subjects->name }}</option>
                             @endforeach 
                           </select>
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
                
                    <form class="add_form"  action="{{ route('admin.exam.mark.detail.store') }}" no-reset="true" method="post">              
                  {{ csrf_field() }}  
                  
                    <table id="route_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>Sn</th>  
                                <th>student Name</th> 
                                <th>student Registration No</th>                             
                                <th>Marks</th>                                               
                                <th>any remarks</th>                                        
                            </tr>
                        </thead>
                        <tbody id="student_details_Result">
                        
                           
                        </tbody>
                             

                    </table>
                    <div class="text-center">
                      <input type="submit" class="btn btn-success " value="submit">
                    </div>
                    </form>
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
 <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    
 </script>
    
@endpush