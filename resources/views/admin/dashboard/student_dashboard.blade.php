@extends('admin.layout.base')
@push('links')
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endpush
@section('body')
<section class="content-header">
<h1>
Dashboard
<small>Control panel</small>
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Dashboard</li>
</ol>
</section>
<section class="content">    
    <div class="row">
        <div class="col-md-4">
            <div class="box box-widget widget-user-2">
                <div class=" bg-yellow pd-5">
                    <div class="widget-user-header label-success"> 
                        <h3><i class="fa fa-rupee"></i>100000 &nbsp;&nbsp; Fee Paid Upto</h3>
                    </div>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <li><a href="#">Last Date <span class="pull-right badge bg-blue">31-03-2020</span></a></li>
                        <li><a href="#">Receipt No. <span class="pull-right badge bg-aqua">1001</span></a></li>
                        <li><a href="#">Amount <span class="pull-right badge bg-green">1200000</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-widget widget-user-2">
                <div class=" bg-yellow pd-5">
                    <div class="widget-user-header label-danger">
                        <h3><i class="fa fa-rupee"></i>10000 &nbsp;&nbsp; Next Due Amount</h3>
                    </div>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <li><a href="#">Next Due Date <span class="pull-right badge bg-blue">10-06-2020</span></a></li>
                        <li><a href="#">Next Due Date <span class="pull-right badge bg-red">10-06-2020</span></a></li>
                        <li><a href="#">Next Due Date <span class="pull-right badge bg-green">10-06-2020</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-widget widget-user-2">
                <div class=" bg-yellow pd-5">
                    <div class="widget-user-header label-info"> 
                        <h3>0 &nbsp;&nbsp;&nbsp;&nbsp;  Working Days</h3>
                    </div>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <li><a href="#">Till Date  
                            <span class="pull-right badge bg-red" title="Absent">0</span> 
                            <span class="pull-right badge bg-green" title="Present">0</span>
                        </a></li>
                        <li><a href="#">Current Week  
                            <span class="pull-right badge bg-red" title="Absent">0</span> 
                            <span class="pull-right badge bg-green" title="Present">0</span>
                        </a></li>
                        <li><a href="#">Current Month 
                            <span class="pull-right badge bg-red" title="Absent">0</span> 
                            <span class="pull-right badge bg-green" title="Present">0</span>
                        </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="box box-success direct-chat direct-chat-warning" style="max-height: 350px;overflow-y:auto">
                <div class="box-header with-border label label-success">
                  <h3 class="box-title">Class Test</h3>

                  <div class="box-tools pull-right">
                    {{-- <span data-toggle="tooltip" title="" class="badge bg-yellow" data-original-title="3 New Messages">3</span> --}}
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    <table class="table" id="class_test_table"> 
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Maximum Marks</th>
                                <th>Test Date</th>
                                <th>Discriptoin</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($classTests as $classTest) 
                            <tr> 
                                <td>{{ $classTest->subjects->name or '' }}</td>
                                <td>{{ $classTest->max_marks }}</td>
                                <td>{{ date('d-m-Y',strtotime($classTest->test_date)) }}</td>
                                <td>{{ $classTest->discription }}</td> 
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="box box-warning direct-chat direct-chat-warning" style="max-height: 350px;overflow-y:auto">
                <div class="box-header with-border label label-warning">
                  <h3 class="box-title">Upcoming Class Test</h3>

                  <div class="box-tools pull-right">
                    {{-- <span data-toggle="tooltip" title="" class="badge bg-yellow" data-original-title="3 New Messages">3</span> --}}
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    <table class="table" id="upcoming_class_test_table"> 
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Maximum Marks</th>
                                <th>Test Date</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($classTests as $classTest) 
                            <tr> 
                                <td>{{ $classTest->subjects->name or '' }}</td>
                                <td>{{ $classTest->max_marks }}</td>
                                <td>{{ date('d-m-Y',strtotime($classTest->test_date)) }}</td>
                                <td>{{ $classTest->discription }}</td> 
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-6">
            <div class="box box-primary direct-chat direct-chat-warning" style="max-height: 350px;overflow-y:auto">
                <div class="box-header with-border label label-primary">
                  <h3 class="box-title">Homework</h3>

                  <div class="box-tools pull-right">
                    {{-- <span data-toggle="tooltip" title="" class="badge bg-yellow" data-original-title="3 New Messages">3</span> --}}
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    <table class="table" id="homework_table"> 
                        <thead>
                            <tr>
                                <th>Date</th> 
                                <th>Homework</th>
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($homeworks as $homework)   
                            <tr>
                                <td>{{ date('d-m-Y',strtotime($homework->date)) }}</td>
                                <td>{!! mb_strimwidth($homework->homework, 0, 40, "...") !!}  </td>
                                <td>
                                    <a  onclick="callPopupLarge(this,'{{ route('student.homework.view',$homework->id) }}')" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>
                                    <a href="{{ url('storage/homework/'.$homework->homework_doc) }}" target="blank" title="Download" class="btn_parents_image btn btn-success btn-xs {{ $homework->homework_doc==null?'disabled':'' }}"><i class="fa fa-download "></i>
                                    </a> 
                                </td>
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
          </div> 
        <div class="col-lg-6">
          <div class="box box-danger direct-chat direct-chat-warning" style="max-height: 350px;overflow-y:auto">
              <div class="box-header with-border label label-danger">
                <h3 class="box-title">Teacher Remark</h3>

                <div class="box-tools pull-right">
                  {{-- <span data-toggle="tooltip" title="" class="badge bg-yellow" data-original-title="3 New Messages">3</span> --}}
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table" id="teacher_remark"> 
                      <thead>
                          <tr>
                              <th>Teacher Name</th>
                              <th>Remark</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                         {{--  @foreach ($studentRemarks as $studentRemark) 
                          <tr>
                              <td>{{ $studentRemark->admin->first_name }}</td>
                              <td>{{ mb_strimwidth($studentRemark->remark, 0, 40, "...") }}</td>
                              <td>
                                  <button type="button" class="btn btn-info btn-sm" datatable-view="true" title="Reply" onclick="callPopupLarge(this,'{{ route('student.reply.remarks',$studentRemark->id) }}')"><i class="fa fa-reply"></i></button>
                                  <button type="button" class="btn btn-success btn-sm" title="View" onclick="callPopupLarge(this,'{{ route('student.remarks.details.view',$studentRemark->id) }}')"><i class="fa fa-eye"></i></button> 
                              </td>
                          </tr>
                          @endforeach --}}
                      </tbody>
                  </table>
              </div>
              </div>
          </div>
        </div>               
    </div>
</div>
</section>
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
<script src="{{ asset('admin_asset/plugins/chartjs/Chart.js') }}"></script>
<script src="{{ asset('admin_asset/dist/js/adminlte.min.js') }}"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#class_test_table').DataTable();
$('#upcoming_class_test_table').DataTable();
$('#homework_table').DataTable();
$('#teacher_remark').DataTable();
});
</script>
@endpush
