@extends('student.layouts.app')
@section('contant')
@push('links')
<style>
  .table td, .table th {
      padding: .0rem; 
      vertical-align: top;
      border-top: 1px solid #dee2e6;

  }
</style>
@endpush

 <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             
              
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            
               
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
          <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner"> 
                     {{-- <h3>{{ $cashbooks->sum('receipt_amount') }} <sup style="font-size: 20px">Fee Paid Upto</sup></small></h3> 
                    <span>Last Date : {{$lastFee['receipt_date']==null?'': date('d-m-Y',strtotime($lastFee['receipt_date'])) }}</span><br>
                    <span>Receipt No. : {{ $lastFee['receipt_no'] }}</span><br>
                    <span>Amount. : {{ $lastFee['receipt_amount'] }}</span> --}}
                    
                  </div>
                  <div class="icon">
                    {{-- <i class="ion ion-bag"></i> --}}
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>15000 <sup style="font-size: 20px">Next Due Amount</sup></small></h3>

                    <span>Next Due Date : {{ date('d-m-Y') }}</span><br>
                    <span>&nbsp;</span><br>
                    <span>&nbsp;</span><br>
                    <span></span>
                     
                  </div>
                  <div class="icon">
                    {{-- <i class="ion ion-stats-bars"></i> --}}
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning" style="font-size: 15.5px">
                  <div class="inner">

                     <span>Working Days : <b>{{-- {{ $workingDays }} --}}</b></span>

                    <table class="table" style="font-size:14px;">
                     
                      <tbody>
                        <tr>
                          <td style="font-size:14px;color:#000;font-weight: 800px">Attendance</td>
                          <td style="font-size:14px;color:#000;font-weight: 800px">Present</td>
                          <td style="font-size:14px;color:#000;font-weight: 800px">Absent</td>
                        </tr>
                         <tr>
                          <td>Till Date</td>
                          <td><small class="badge badge-success"> {{-- {{ $tillPresent }} --}}</small></td>
                          <td><small class="badge badge-danger"> {{-- {{ $tillAbsent }} --}}</small></td>
                        </tr>
                         <tr>
                          <td>Current Month</td>
                          <td><small class="badge badge-success"> {{-- {{$monthlyPresent }} --}}</small></td>
                          <td><small class="badge badge-danger"> {{-- {{ $monthlyAbsent }} --}}</small></td>
                        </tr>
                         <tr>
                          <td>Current Week</td>
                         <td><small class="badge badge-success"> {{-- {{ $weeklyPresent }} --}}</small></td>
                          <td><small class="badge badge-danger"> {{-- {{ $weeklyAbsent }} --}}</small></td>
                        </tr>
                      </tbody>
                    </table>
 
                  </div>
                  <div class="icon">
                    {{-- <i class="ion ion-person-add"></i> --}}
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
              <!-- Left col -->
              <section class="col-lg-6 connectedSortable ui-sortable"> 
                <!-- class Test -->
                <div class="card">
                  <div class="card-header ui-sortable-handle" style="cursor: move;">
                    <h3 class="card-title">
                      <i class="ion ion-clipboard mr-1"></i>
                      Class Test
                    </h3> 
                     
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
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
                       {{--  @foreach ($classTests as $classTest) 
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
                  <!-- /.card-body --> 
                </div>
                <!-- /.card -->
              </section>
              <!-- /.Left col -->
              <!-- right col (We are only adding the ID to make the widgets sortable)-->
              <section class="col-lg-6 connectedSortable ui-sortable">  
               <div class="card">
                 <div class="card-header ui-sortable-handle" style="cursor: move;">
                   <h3 class="card-title">
                     <i class="ion ion-clipboard mr-1"></i>
                    UpComming Class Test
                   </h3> 
                    
                 </div>
                 <!-- /.card-header -->
                 <div class="card-body">
                 </div>
                 <!-- /.card-body --> 
               </div>
               <!-- /.card -->
              </section>
              <!-- right col -->
              <section class="col-lg-6 connectedSortable ui-sortable"> 
                <!-- class Test -->
                <div class="card">
                  <div class="card-header ui-sortable-handle" style="cursor: move;">
                    <h3 class="card-title">
                      <i class="ion ion-clipboard mr-1"></i>
                        Homework
                    </h3> 
                     
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table m-0">
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
                          <td>{{ mb_strimwidth($homework->homework, 0, 40, "...") }}  </td>
                          <td>
                              <button type="homework" onclick="callPopupLarge(this,'{{ route('student.homework.view',$homework->id) }}')" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></button>
                               <a href="{{ url('storage/homework/'.$homework->homework_doc) }}" class="btn btn-success btn-sm {{ $homework->homework_doc!=null?'':'disabled' }} " target="_blank" title=""><i class="fa fa-download"></i></a>
                          </td>
                           
                        </tr>
                        @endforeach --}}
                       
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- /.card-body --> 
                 
                </div>
                <!-- /.card -->
              </section>
              <section class="col-lg-6 connectedSortable ui-sortable"> 
                <!-- class Test -->
                <div class="card direct-chat direct-chat-primary" style="position: relative; left: 0px; top: 0px;">
                  <div class="card-header ui-sortable-handle" style="cursor: move;">
                    <h3 class="card-title">Teacher Remark</h3>

                    <div class="card-tools"> 
                      
                      <button type="button" class="btn btn-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                      </button> 
                       
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table class="table m-3"> 
                       <thead>
                         <tr>
                           <th>Teacher Name</th>
                           <th>Remark</th>
                           <th>Action</th>
                         </tr>
                       </thead>
                       <tbody>
                        {{-- @foreach ($studentRemarks as $studentRemark) 
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
                     
                        <!-- /.direct-chat-text -->
                      </div>
                      <!-- /.direct-chat-msg -->

                       
                    </div>
                    <!-- /.direct-chat-pane -->
                  </div>
                  <!-- /.card-body -->
                  
                  <!-- /.card-footer-->
                </div>
                <!-- /.card -->
              </section>
            </div>
            <!-- /.row (main row) -->
          </div><!-- /.container-fluid -->
         </section>
    <!-- /.content -->


@endsection