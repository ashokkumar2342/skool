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

     <!-- Main content -->
     <section class="content">
       <!-- Small boxes (Stat box) -->
       <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <a href="#" style="color:white" onclick="callPopupLarge(this,'{{ route('admin.student.show.details') }}')" title="Students Details"><h3>{{ $students}}</h3> </a>
              <p>Students</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('admin.student.report') }}"  class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
         <div class="col-lg-3 col-xs-6">
           <!-- small box -->
           <div class="small-box bg-aqua">
             <div class="inner">
              <a href="#" style="color:white" onclick="callPopupLarge(this,'{{ route('admin.student.Registration.details') }}')"  >
               <h3>0</h3> </a>
               <p>New Registration</p>
             </div>
             <div class="icon">
               <i class="ion ion-ios-people-outline"></i>
             </div>
             <a href="{{ route('admin.onlineForm.list') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-xs-6">
           <!-- small box -->
           <div class="small-box bg-green">
             <div class="inner">
               <h3>{{ $feePaid }}</h3> 
               <p>Fee Paid</p>
             </div>
             <div class="icon">
               <i class="fa fa-rupee"></i>
             </div>
             <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
         
         <div class="col-lg-3 col-xs-6">
           <!-- small box -->
           <div class="small-box bg-red">
             <div class="inner">
               <h3>{{ $feeDues }}</h3>

               <p>Fee Due</p>
             </div>
             <div class="icon">
               <i class="fa fa-rupee"></i>
             </div>
             <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
       </div>
       <!-- /.row -->
       <!-- Main row -->
       <div class="row">
         <!-- Left col -->
         <section class="col-lg-7 connectedSortable">
          <!-- quick email widget -->
       
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title"><button type="button" class="btn btn-success btn-xs" onclick="callAjax(this,'{{ route('admin.student.birthday.dashboard') }}','student_birthday')">Today's Birthday &nbsp;&nbsp;<span data-toggle="tooltip" title="" class="badge bg-blue"><b>{{ $studentDOBs->count() }}</b></span></button>&nbsp;&nbsp;&nbsp; <button type="button" class="btn btn-warning btn-xs" onclick="callAjax(this,'{{ route('admin.student.birthday.dashboard.upcoming') }}','student_birthday')" >Upcoming Birthdays</button></h3>&nbsp;
                     
                  <div class="box-tools pull-right">
                    <span class="label label-success"></span>
                    
                     
                    
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding" style="max-height: 305px;overflow-y:auto">
                   <div id="student_birthday">
                     @include('admin.student.birthday.birthday')
                   </div>
              </div>


              <div class="box box-danger no-padding" style="max-height: 150px;overflow-y:auto">
                <div class="box-header with-border">
                  <div class="box-title"><button type="button" class="btn btn-success btn-xs" onclick="callAjax(this,'{{ route('admin.exam.today.class.test') }}','class_test')">Today's Class Test &nbsp;&nbsp;</button>&nbsp;&nbsp;&nbsp; <button type="button" class="btn btn-warning btn-xs" onclick="callAjax(this,'{{ route('admin.exam.upcoming.class.test') }}','class_test')" >Upcoming Class Tests</button></h3>&nbsp;</div> 
                  <div class="box-tools pull-right"> 
                    
                    </button>
                  </div> 
                </div> 
             <div class="box-body no-padding" style="max-height: 305px;overflow-y:auto">
                   <div id="class_test">
                   {{--  @include('admin.exam.classTestDashboard.today') --}} 
                   </div>
              </div>
            </div>  
              <div class="box box-danger" style="max-height: 150px;overflow-y:auto">
                <div class="box-header with-border">
                  <div class="box-title"><button type="button" class="btn btn-success btn-xs" onclick="callAjax(this,'{{ route('admin.event.today.event.dashboard',1) }}','event_today')">Today's Event &nbsp;&nbsp;</button>&nbsp;&nbsp;&nbsp; <button type="button" class="btn btn-warning btn-xs" onclick="callAjax(this,'{{ route('admin.event.today.event.dashboard',2) }}','event_today')" >Upcoming Events</button></h3>&nbsp;</div> 
                  <div class="box-tools pull-right"> 
                     
                    
                    </button>
                  </div> 
                </div>
                <div class="box-body no-padding" style="max-height: 305px;overflow-y:auto">
                   <div id="event_today">
                     
                   </div>
              </div>
              </div>
              
            <div id="barchart_material" style="width: 100%; height: 500px;"></div>
            <div id="barchart_material_2" style="width: 100%; height: 500px;margin-top: 20px"></div>
            
            <!-- /.box-body -->
         

                
         
           
          {{-- <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Quick SMS</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <form action="{{ route('admin.quick.sms') }}" method="post" class="add_form">
              {{ csrf_field() }} 
                <div class="form-group">
                  <input type="text" class="form-control" name="number" placeholder="Mobile No.">
                </div>
                <div>
                  <textarea class="textarea" name="message" placeholder="Message"
                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
             
            </div>
            <div class="box-footer clearfix">
              <button type="submit" class="pull-right btn btn-default" id="sendEmail">Send
                <i class="fa fa-arrow-circle-right"></i></button>
            </div>
          </form>
          </div>
          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Quick Email</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
               <form action="{{ route('admin.quick.email') }}" method="post" class="add_form">
              {{ csrf_field() }} 
                <div class="form-group">
                  <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" placeholder="Subject">
                </div>
                <div>
                  <textarea class="textarea" name="message" placeholder="Message"
                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
              
            </div>
            <div class="box-footer clearfix">
              <button type="submit" class="pull-right btn btn-default" id="sendEmail">Send
                <i class="fa fa-arrow-circle-right"></i></button>
            </div>
            </form>
          </div> --}}
       
         </section>
         <!-- /.Left col -->
         <!-- right col (We are only adding the ID to make the widgets sortable)-->
         <section class="col-lg-5 connectedSortable">

           <!-- Map box -->
           <div class="box box-solid bg-light-blue-gradient">
             <div class="box-header">
               
               
               <h3 class="box-title">
                 Attendance
                <a  class="btn btn-danger btn-xs" onclick="callPopupLarge(this,'{{ route('admin.attendance.student.attendance.continue') }}','attendence')" title="">Absent For Last 3 Days</a>

                 <a  class="btn btn-danger btn-xs" onclick="callPopupLarge(this,'{{ route('admin.attendance.student.attendance.continue') }}','attendence')" title="">Absent 4 Days In Last 7 Dyas</a>
                
               </h3>
             </div>
             <div class="box-body">
              
                  <div id="piechart_3d" style="width: 100%; height: 290px;"></div>
                  <input type="hidden" name="present" id="present" value="{{ $present }}">
                  <input type="hidden" name="absent" id="absent" value="{{ $absent }}"> 
             </div>
             <!-- /.box-body-->
              
           </div>
           <!-- /.box -->

           <!-- solid sales graph -->
           <div class="box box-solid bg-teal-gradient">
             <div class="box-header">
               <i class="fa fa-th"></i>

               <h3 class="box-title">Class Wise Students</h3>

               <div class="box-tools pull-right">
                 <button type="button" class="btn bg-teal btn-sm" id="class_wise_tudents"><i class="fa fa-minus"></i>
                 </button>
                 <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                 </button>
               </div>
             </div>
             <div class="box-body border-radius-none" id="div_class_wise_tudents">
               <div id="classWiseStudent" style="width: 100%; height: 400px;"></div>
             </div>
             <!-- /.box-body -->
            
              

      

     </section>
     <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
  
@endsection
@push('scripts')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script> --}}
<script src="{{ asset('admin_asset/plugins/chartjs/Chart.js') }}"></script>
<script src="{{ asset('admin_asset/dist/js/adminlte.min.js') }}"></script>
{{-- <script src="../../dist/js/adminlte.min.js"></script> --}}
<script>
  $(document).ready(function(){
  $("#collapse").click(function(){
    $("#bar_chart").slideToggle();
  });
  $("#class_wise_tudents").click(function(){
    $("#div_class_wise_tudents").slideToggle();
    $(this).addClass('fa fa-plus');
  });

});
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas)

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Electronics',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
        {
          label               : 'Digital Goods',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        }
      ]
    }

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions)

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    var lineChart                = new Chart(lineChartCanvas)
    var lineChartOptions         = areaChartOptions
    lineChartOptions.datasetFill = false
    lineChart.Line(areaChartData, lineChartOptions)

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      {
        value    : 700,
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'Chrome'
      },
      {
        value    : 500,
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'IE'
      },
      {
        value    : 400,
        color    : '#f39c12',
        highlight: '#f39c12',
        label    : 'FireFox'
      },
      {
        value    : 600,
        color    : '#00c0ef',
        highlight: '#00c0ef',
        label    : 'Safari'
      },
      {
        value    : 300,
        color    : '#3c8dbc',
        highlight: '#3c8dbc',
        label    : 'Opera'
      },
      {
        value    : 100,
        color    : '#d2d6de',
        highlight: '#d2d6de',
        label    : 'Navigator'
      }
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  })
</script>

    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() { 
        var present = parseInt(document. getElementById("present"). value);
        var absent = parseInt(document. getElementById("absent"). value); 
        var datas = [

          ['Task', 'Daily Attendance'],
          ['Present',     present],
          ['Absent',      absent],
          
        ]
        var data = google.visualization.arrayToDataTable(datas);
        var options = {
          title: 'Student Daily Attendance',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
      google.charts.setOnLoadCallback(classWiseStudent);

    function classWiseStudent() {

      var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        @foreach ($classTypes as $classType)
           @php
              $students=App\Student::where('class_id',$classType->id)->get()->count(); 
               
           @endphp
        ['{{ $classType->name }}', {{ $students }}],
        @endforeach
        // ['Class II',      2],
        // ['Class III',  2],
        // ['Class IV', 10],
        // ['Class VI',    12],
        // ['Class VII',    20],
        // ['Class VIII',    7],
        // ['Class IX',    7],
        // ['Class X',    7],
        // ['Class XI',    7],
        // ['Class XII',    7],
      ]);

      var options = {
        title: 'Class Wise Students'
      };

      var chart = new google.visualization.PieChart(document.getElementById('classWiseStudent'));

      chart.draw(data, options);
    }
    </script>
    <script type="text/javascript">
          google.charts.load('current', {'packages':['bar']});
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Month',  'Paid Fee ', 'Due Fee '],
        @php
        $academic=new App\Helper\MyFuncs();
        $uptoMonthYear=$academic->getMonthYear();
        @endphp
        @foreach ($uptoMonthYear as $uptoMonthYea)
        @php
          $studentFeePaid=App\Model\StudentFeeDetail::where('paid',1)->where('due_month',date('m',strtotime($uptoMonthYea)))->where('due_year',date('Y',strtotime($uptoMonthYea)))->sum('fee_amount');
          $studentFeeDue=App\Model\StudentFeeDetail::where('paid',0)->where('due_month',date('m',strtotime($uptoMonthYea)))->where('due_year',date('Y',strtotime($uptoMonthYea)))->sum('fee_amount');
        @endphp
        ['{{ date('M',strtotime($uptoMonthYea))}}', {{ $studentFeePaid }}, {{ $studentFeeDue }}],
        @endforeach
              
            ]);
            @php 
            $academicYear=App\Model\AcademicYear::where('status',1)->first(); 
            @endphp 
            var options = {
              chart: {
                title: 'School Fee Details',
                subtitle: 'Paid Fee, and Due Fee: {{ $academicYear->name }}',
              },
              bars: 'vartival' // Required for Material Bar Charts.
            };

            var chart = new google.charts.Bar(document.getElementById('barchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
          }
        </script>
        <script type="text/javascript">
          google.charts.load('current', {'packages':['bar']});
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Classes',  'Present ', 'Absent '],
        @foreach ($classTypes as $classType)
           @php
              $students=App\Student::where('class_id',$classType->id)->pluck('id')->toArray();
              $presentStudents=App\Model\StudentAttendance::whereIn('student_id',$students)->where('verified_attendance_type_id',1)->where('verified',1)->where('date',date('Y-m-d'))->count();
              $absentStudents=App\Model\StudentAttendance::whereIn('student_id',$students)->where('verified_attendance_type_id',2)->where('verified',1)->where('date',date('Y-m-d'))->count();
           @endphp
        ['{{ $classType->name }}',{{ $presentStudents }},{{ $absentStudents }}],
        @endforeach
            ]);

            var options = {
              chart: {
                title: 'Class Wise Attendance',
                subtitle: 'Present, and Absent: Today',
              },
              bars: 'vartival' // Required for Material Bar Charts.
            };

            var chart = new google.charts.Bar(document.getElementById('barchart_material_2'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
          }
        </script>
</body>


@endpush
