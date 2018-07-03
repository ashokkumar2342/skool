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
           <div class="small-box bg-aqua">
             <div class="inner">
               <h3>50</h3> 
               <p>New Orders</p>
             </div>
             <div class="icon">
               <i class="ion ion-bag"></i>
             </div>
             <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-xs-6">
           <!-- small box -->
           <div class="small-box bg-green">
             <div class="inner">
               <h3>53<sup style="font-size: 20px">%</sup></h3>

               <p>Bounce Rate</p>
             </div>
             <div class="icon">
               <i class="ion ion-stats-bars"></i>
             </div>
             <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-xs-6">
           <!-- small box -->
           <div class="small-box bg-yellow">
             <div class="inner">
               <h3>{{ totalStudent() }}</h3> 
               <p>Students</p>
             </div>
             <div class="icon">
               <i class="ion ion-person-add"></i>
             </div>
             <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-xs-6">
           <!-- small box -->
           <div class="small-box bg-red">
             <div class="inner">
               <h3>65</h3>

               <p>Unique Visitors</p>
             </div>
             <div class="icon">
               <i class="ion ion-pie-graph"></i>
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
           <!-- Custom tabs (Charts with tabs)-->
           <div class="nav-tabs-custom">
             <!-- Tabs within a box -->
             <ul class="nav nav-tabs pull-right">
               <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
               <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
               <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
             </ul>
             
             <div class="tab-content no-padding">
               <!-- Morris chart - Sales -->
               <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
               <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
             </div>
           </div>
           <!-- /.nav-tabs-custom -->
           <div class="box box-danger">
               <div class="box-header with-border">
                 <h3 class="box-title">Donut Chart</h3>

                 <div class="box-tools pull-right">
                   <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                   </button>
                   <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                 </div>
               </div>
               <div class="box-body">
                 <canvas id="pieChart" style="height: 323px; width: 647px;" width="647" height="323"></canvas>
               </div>
               <!-- /.box-body -->
             </div>

           <!-- Chat box -->
           <div class="box box-success">
             <div class="box-header">
               <i class="fa fa-comments-o"></i>

               <h3 class="box-title">Chat</h3>

               <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                 <div class="btn-group" data-toggle="btn-toggle">
                   <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>
                   </button>
                   <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                 </div>
               </div>
             </div>
             <div class="box-body chat" id="chat-box">
               <!-- chat item -->
               <div class="item">
                 <img src="dist/img/user4-128x128.jpg" alt="user image" class="online">

                 <p class="message">
                   <a href="#" class="name">
                     <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                     Mike Doe
                   </a>
                   I would like to meet you to discuss the latest news about
                   the arrival of the new theme. They say it is going to be one the
                   best themes on the market
                 </p>
                 <div class="attachment">
                   <h4>Attachments:</h4>

                   <p class="filename">
                     Theme-thumbnail-image.jpg
                   </p>

                   <div class="pull-right">
                     <button type="button" class="btn btn-primary btn-sm btn-flat">Open</button>
                   </div>
                 </div>
                 <!-- /.attachment -->
               </div>
               <!-- /.item -->
               <!-- chat item -->
               <div class="item">
                 <img src="dist/img/user3-128x128.jpg" alt="user image" class="offline">

                 <p class="message">
                   <a href="#" class="name">
                     <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                     Alexander Pierce
                   </a>
                   I would like to meet you to discuss the latest news about
                   the arrival of the new theme. They say it is going to be one the
                   best themes on the market
                 </p>
               </div>
               <!-- /.item -->
               <!-- chat item -->
               <div class="item">
                 <img src="dist/img/user2-160x160.jpg" alt="user image" class="offline">

                 <p class="message">
                   <a href="#" class="name">
                     <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
                     Susan Doe
                   </a>
                   I would like to meet you to discuss the latest news about
                   the arrival of the new theme. They say it is going to be one the
                   best themes on the market
                 </p>
               </div>
               <!-- /.item -->
             </div>
             <!-- /.chat -->
             <div class="box-footer">
               <div class="input-group">
                 <input class="form-control" placeholder="Type message...">

                 <div class="input-group-btn">
                   <button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
                 </div>
               </div>
             </div>
           </div>
           <!-- /.box (chat box) -->

           <!-- TO DO List -->
           <div class="box box-primary">
             <div class="box-header">
               <i class="ion ion-clipboard"></i>

               <h3 class="box-title">To Do List</h3>

               <div class="box-tools pull-right">
                 <ul class="pagination pagination-sm inline">
                   <li><a href="#">&laquo;</a></li>
                   <li><a href="#">1</a></li>
                   <li><a href="#">2</a></li>
                   <li><a href="#">3</a></li>
                   <li><a href="#">&raquo;</a></li>
                 </ul>
               </div>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
               <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
               <ul class="todo-list">
                 <li>
                   <!-- drag handle -->
                   <span class="handle">
                         <i class="fa fa-ellipsis-v"></i>
                         <i class="fa fa-ellipsis-v"></i>
                       </span>
                   <!-- checkbox -->
                   <input type="checkbox" value="">
                   <!-- todo text -->
                   <span class="text">Design a nice theme</span>
                   <!-- Emphasis label -->
                   <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                   <!-- General tools such as edit or delete-->
                   <div class="tools">
                     <i class="fa fa-edit"></i>
                     <i class="fa fa-trash-o"></i>
                   </div>
                 </li>
                 <li>
                       <span class="handle">
                         <i class="fa fa-ellipsis-v"></i>
                         <i class="fa fa-ellipsis-v"></i>
                       </span>
                   <input type="checkbox" value="">
                   <span class="text">Make the theme responsive</span>
                   <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                   <div class="tools">
                     <i class="fa fa-edit"></i>
                     <i class="fa fa-trash-o"></i>
                   </div>
                 </li>
                 <li>
                       <span class="handle">
                         <i class="fa fa-ellipsis-v"></i>
                         <i class="fa fa-ellipsis-v"></i>
                       </span>
                   <input type="checkbox" value="">
                   <span class="text">Let theme shine like a star</span>
                   <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                   <div class="tools">
                     <i class="fa fa-edit"></i>
                     <i class="fa fa-trash-o"></i>
                   </div>
                 </li>
                 <li>
                       <span class="handle">
                         <i class="fa fa-ellipsis-v"></i>
                         <i class="fa fa-ellipsis-v"></i>
                       </span>
                   <input type="checkbox" value="">
                   <span class="text">Let theme shine like a star</span>
                   <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
                   <div class="tools">
                     <i class="fa fa-edit"></i>
                     <i class="fa fa-trash-o"></i>
                   </div>
                 </li>
                 <li>
                       <span class="handle">
                         <i class="fa fa-ellipsis-v"></i>
                         <i class="fa fa-ellipsis-v"></i>
                       </span>
                   <input type="checkbox" value="">
                   <span class="text">Check your messages and notifications</span>
                   <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                   <div class="tools">
                     <i class="fa fa-edit"></i>
                     <i class="fa fa-trash-o"></i>
                   </div>
                 </li>
                 <li>
                       <span class="handle">
                         <i class="fa fa-ellipsis-v"></i>
                         <i class="fa fa-ellipsis-v"></i>
                       </span>
                   <input type="checkbox" value="">
                   <span class="text">Let theme shine like a star</span>
                   <small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
                   <div class="tools">
                     <i class="fa fa-edit"></i>
                     <i class="fa fa-trash-o"></i>
                   </div>
                 </li>
               </ul>
             </div>
             <!-- /.box-body -->
             <div class="box-footer clearfix no-border">
               <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
             </div>
           </div>
           <!-- /.box -->

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
               <form action="#" method="post">
                 <div class="form-group">
                   <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control" name="subject" placeholder="Subject">
                 </div>
                 <div>
                   <textarea class="textarea" placeholder="Message"
                             style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                 </div>
               </form>
             </div>
             <div class="box-footer clearfix">
               <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
                 <i class="fa fa-arrow-circle-right"></i></button>
             </div>
           </div>

         </section>
         <!-- /.Left col -->
         <!-- right col (We are only adding the ID to make the widgets sortable)-->
         <section class="col-lg-5 connectedSortable">

           <!-- Map box -->
           <div class="box box-solid bg-light-blue-gradient">
             <div class="box-header">
               

               <h3 class="box-title">
                 Attendance
               </h3>
             </div>
             <div class="box-body">
                  <div id="piechart_3d" style="width: 100%; height: 290px;"></div>
                  <input type="hidden" name="present" id="present" value="{{ presentStudent() }}">
                  <input type="hidden" name="absent" id="absent" value="{{ absentStudent() }}"> 
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
                 <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                 </button>
                 <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                 </button>
               </div>
             </div>
             <div class="box-body border-radius-none">
               <div id="classWiseStudent" style="width: 100%; height: 400px;"></div>
             </div>
             <!-- /.box-body -->
             <div class="box-footer no-border">
               <div class="row">
                 <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                   <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                          data-fgColor="#39CCCC">

                   <div class="knob-label">Mail-Orders</div>
                 </div>
                 <!-- ./col -->
                 <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                   <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                          data-fgColor="#39CCCC">

                   <div class="knob-label">Online</div>
                 </div>
                 <!-- ./col -->
                 <div class="col-xs-4 text-center">
                   <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                          data-fgColor="#39CCCC">

                   <div class="knob-label">In-Store</div>
                 </div>
                 <!-- ./col -->
               </div>
               <!-- /.row -->
             </div>
             <!-- /.box-footer -->
           </div>
           <!-- /.box -->

           <!-- Calendar -->
           <div class="box box-solid bg-green-gradient">
             <div class="box-header">
               <i class="fa fa-calendar"></i>

               <h3 class="box-title">Calendar</h3>
               <!-- tools box -->
               <div class="pull-right box-tools">
                 <!-- button with a dropdown -->
                 <div class="btn-group">
                   <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                     <i class="fa fa-bars"></i></button>
                   <ul class="dropdown-menu pull-right" role="menu">
                     <li><a href="#">Add new event</a></li>
                     <li><a href="#">Clear events</a></li>
                     <li class="divider"></li>
                     <li><a href="#">View calendar</a></li>
                   </ul>
                 </div>
                 <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                 </button>
                 <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                 </button>
               </div>
               <!-- /. tools -->
             </div>
             <!-- /.box-header -->
             <div class="box-body no-padding">
               <!--The calendar -->
               <div id="calendar" style="width: 100%"></div>
             </div>
             <!-- /.box-body -->
             <div class="box-footer text-black">
               <div class="row">
                 <div class="col-sm-6">
                   <!-- Progress bars -->
                   <div class="clearfix">
                     <span class="pull-left">Task #1</span>
                     <small class="pull-right">90%</small>
                   </div>
                   <div class="progress xs">
                     <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
                   </div>

                   <div class="clearfix">
                     <span class="pull-left">Task #2</span>
                     <small class="pull-right">70%</small>
                   </div>
                   <div class="progress xs">
                     <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                   </div>
                 </div>
                 <!-- /.col -->
                 <div class="col-sm-6">
                   <div class="clearfix">
                     <span class="pull-left">Task #3</span>
                     <small class="pull-right">60%</small>
                   </div>
                   <div class="progress xs">
                     <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                   </div>

                   <div class="clearfix">
                     <span class="pull-left">Task #4</span>
                     <small class="pull-right">40%</small>
                   </div>
                   <div class="progress xs">
                     <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                   </div>
                 </div>
                 <!-- /.col -->
               </div>
               <!-- /.row -->
             </div>
           </div>
           <!-- /.box -->

      

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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
        ['Class I',     11],
        ['Class II',      2],
        ['Class III',  2],
        ['Class IV', 10],
        ['Class VI',    12],
        ['Class VII',    20],
        ['Class VIII',    7],
        ['Class IX',    7],
        ['Class X',    7],
        ['Class XI',    7],
        ['Class XII',    7],
      ]);

      var options = {
        title: 'Class Wise Students'
      };

      var chart = new google.visualization.PieChart(document.getElementById('classWiseStudent'));

      chart.draw(data, options);
    }
    </script>
</body>


@endpush
