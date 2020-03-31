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
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <a href="#" style="color:white">
                        <h3>1000000</h3> </a>
                        <p>Next Due Amount</p>
                    </div>
                    <div class="icon">
                         <i class="fa fa-rupee"></i>
                    </div>
                    <a class="small-box-footer">Next Due Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10-02-10000</a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <a href="#" style="color:white">
                            <h3>0</h3> </a>
                            <p>New Registration</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-rupee"></i>
                        </div>
                        <a href="{{ route('admin.onlineForm.list') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <a href="#" style="color:white">
                                <h3>0</h3> </a>
                                <p>New Registration</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-people-outline"></i>
                            </div>
                            <a href="{{ route('admin.onlineForm.list') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <a href="#" style="color:white">
                                    <h3>0</h3> </a>
                                    <p>New Registration</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios-people-outline"></i>
                                </div>
                                <a href="{{ route('admin.onlineForm.list') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box box-widget widget-user-2">
                                <div class=" bg-yellow pd-5">
                                    <div class="widget-user-header bg-yellow"> 
                                        <h3>100000 &nbsp;&nbsp;&nbsp;&nbsp; Fee Paid Upto</h3>
                                    </div>
                                </div>
                                <div class="box-footer no-padding">
                                    <ul class="nav nav-stacked">
                                        <li><a href="#">Last Date <span class="pull-right badge bg-blue">31</span></a></li>
                                        <li><a href="#">Receipt No. <span class="pull-right badge bg-aqua">5</span></a></li>
                                        <li><a href="#">Amount <span class="pull-right badge bg-green">12</span></a></li>
                                        
                                    </ul>
                                </div>
                            </div><!-- /.widget-user -->
                        </div><!-- /.col -->
                        <div class="col-md-4">
                            <div class="box box-widget widget-user-2">
                                <div class=" bg-yellow pd-5">
                                    <div class="widget-user-header bg-green"> 
                                        <h3>{{ $workingDays }} &nbsp;&nbsp;&nbsp;&nbsp;  Working Days</h3>
                                    </div>
                                </div>
                                <div class="box-footer no-padding">
                                    <ul class="nav nav-stacked">
                                        <li><a href="#">Till Date  
                                            <span class="pull-right badge bg-red" title="Absent">{{ $tillAbsent }}</span> 
                                            <span class="pull-right badge bg-green" title="Present">{{ $tillPresent }}</span>
                                        </a></li>
                                        <li><a href="#">Current Week  
                                            <span class="pull-right badge bg-red" title="Absent">{{$monthlyAbsent }}</span> 
                                            <span class="pull-right badge bg-green" title="Present">{{$monthlyPresent }}</span>
                                        </a></li>
                                        <li><a href="#">Current Month 
                                            <span class="pull-right badge bg-red" title="Absent">{{ $weeklyAbsent }}</span> 
                                            <span class="pull-right badge bg-green" title="Present">{{ $weeklyPresent }}</span>
                                        </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="row">
                    <div class="col-lg-6">
                      <div class="box box-danger no-padding" style="max-height: 150px;overflow-y:auto">
                        <div class="box-header with-border">
                          <div class="box-title">Class Test</div>
                            <table class="table"> 
                              <thead>
                                <tr>
                                  <th>Subject</th>
                                  <th>Maximum Marks</th>
                                  <th>Test Date</th>
                                  <th>Discriptoin</th>
                                </tr>
                              </thead>
                              <tbody>
                             @foreach ($classTests as $classTest) 
                                <tr> 
                                  <td>{{ $classTest->subjects->name or '' }}</td>
                                  <td>{{ $classTest->max_marks }}</td>
                                  <td>{{ date('d-m-Y',strtotime($classTest->test_date)) }}</td>
                                  <td>{{ $classTest->discription }}</td> 
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div> 
                        </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="box box-danger no-padding" style="max-height: 150px;overflow-y:auto">
                        <div class="box-header with-border">
                          <div class="box-title">Homework</div>
                            <table class="table"> 
                              <thead>
                        <tr>
                          <th>Date</th> 
                          <th>Homework</th>
                          <th>Action</th> 
                        </tr>
                        </thead>
                        <tbody>
                         @foreach ($homeworks as $homework)   
                        <tr>
                          <td>{{ date('d-m-Y',strtotime($homework->date)) }}</td>
                          <td>{!! mb_strimwidth($homework->homework, 0, 40, "...") !!}  </td>
                          <td>
                        <a  onclick="callPopupLarge(this,'{{ route('student.homework.view',$homework->id) }}')" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>
                        <a href="{{ url('storage/homework/'.$homework->homework_doc) }}" target="blank" title="Download" class="btn_parents_image btn btn-success btn-xs {{ $homework->homework_doc==null?'disabled':'' }}"><i class="fa fa-download "></i>
                       </a> 
                          </td>
                           
                        </tr>
                        @endforeach
                       
                        </tbody>
                            </table>
                          </div> 
                        </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="box box-danger no-padding" style="max-height: 150px;overflow-y:auto">
                        <div class="box-header with-border">
                          <div class="box-title">Teacher Remarks</div>
                            <table class="table"> 
                              <thead>
                         <tr>
                           <th>Teacher Name</th>
                           <th>Remark</th>
                           <th>Action</th>
                         </tr>
                       </thead>
                       <tbody>
                        @foreach ($studentRemarks as $studentRemark) 
                         <tr>
                           <td>{{ $studentRemark->admin->first_name }}</td>
                           <td>{{ mb_strimwidth($studentRemark->remark, 0, 40, "...") }}</td>
                           <td>
                              <button type="button" class="btn btn-info btn-sm" datatable-view="true" title="Reply" onclick="callPopupLarge(this,'{{ route('student.reply.remarks',$studentRemark->id) }}')"><i class="fa fa-reply"></i></button>

                              <button type="button" class="btn btn-success btn-sm" title="View" onclick="callPopupLarge(this,'{{ route('student.remarks.details.view',$studentRemark->id) }}')"><i class="fa fa-eye"></i></button> 
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
                @endsection
                @push('scripts')
                <script src="{{ asset('admin_asset/plugins/chartjs/Chart.js') }}"></script>
                <script src="{{ asset('admin_asset/dist/js/adminlte.min.js') }}"></script>
            </body>
            @endpush
