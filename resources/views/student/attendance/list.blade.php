@extends('admin.layout.base')
@section('body')
@push('links')
<link rel="stylesheet" href="{{ asset('student_assets/plugins/fullcalendar/fullcalendar.min.css') }}">
<link rel="stylesheet" href="{{ asset('student_assets/plugins/fullcalendar/fullcalendar.print.css') }}" media="print">
<style>
    .table td, .table th {
        padding: .0rem; 
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }
    .border_bottom{
        border-bottom: solid 1px #eee; 
    }  
    b{
        color:#275064;
        align-items: right;
    }
    .fs{
        float: right; font-weight:800;padding-right: 10px;
    }
    .fc-time{
        display : none;
    }
    .fc-title{
        font-size:18px;
    }
</style>
@endpush
<section class="content-header">     
    <h1>Attendance<small>List</small> </h1>       
</section>  
<section class="content">
    <div class="box">
        <div class="box-body">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Calender</a></li>
                <li><a data-toggle="tab" href="#menu1">Table</a></li>
            </ul>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <div class="box box-primary">
                        <div class="box-body no-padding">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Present/Absent</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $key=>$attendance)
                            <tr>
                                <td>{{ date('d-m-Y', strtotime( $attendance->date)) }}</td>
                                <td>{{ $attendance->attendance->name or '' }}</td>
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
<!-- jQuery -->

<!-- fullCalendar 2.2.5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset('student_assets/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
<!-- Page specific script -->
<script>
    $(function () {

/* initialize the external events
-----------------------------------------------------------------*/
function ini_events(ele) {
    ele.each(function () {

// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
// it doesn't need to have a start or end
var eventObject = {
title: $.trim($(this).text()) // use the element's text as the event title
}

// store the Event Object in the DOM element so we can get to it later
$(this).data('eventObject', eventObject)

// make the event draggable using jQuery UI
$(this).draggable({
    zIndex        : 1070,
revert        : true, // will cause the event to go back to its
revertDuration: 0  //  original position after the drag
})

})
}

ini_events($('#external-events div.external-event'))

/* initialize the calendar
-----------------------------------------------------------------*/
//Date for the calendar events (dummy data)
var date = new Date()
var d    = date.getDate(),
m    = date.getMonth(),
y    = date.getFullYear()
$('#calendar').fullCalendar({
    header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month'
    },
    buttonText: {
        today: 'today',
        month: 'month',

    },
//Random default events
events    : [
@foreach ($attendances as $key=>$attendance)

{
    title          : '{{ $attendance->attendance_type_id==2?'Absent':'Present' }}',
    start          : '{{ $attendance->date }}',
    @if ($attendance->attendance_type_id==2)
backgroundColor: '#f56954', //red
borderColor    : '#f56954', //red
textColor: '#FFF'
@else
backgroundColor: '#008000', //red
borderColor    : '#008000', //red
textColor: '#FFF'
@endif

},
@endforeach 

],
allDay: false,
editable  : false,
droppable : false, // this allows things to be dropped onto the calendar !!!
drop      : function (date, allDay) { // this function is called when something is dropped

// retrieve the dropped element's stored Event Object
var originalEventObject = $(this).data('eventObject')

// we need to copy it, so that multiple events don't have a reference to the same object
var copiedEventObject = $.extend({}, originalEventObject)

// assign it the date that was reported
copiedEventObject.start           = date
copiedEventObject.allDay          = allDay
copiedEventObject.backgroundColor = $(this).css('background-color')
copiedEventObject.borderColor     = $(this).css('border-color')

// render the event on the calendar
// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
$('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

// is the "remove after drop" checkbox checked?
if ($('#drop-remove').is(':checked')) {
// if so, remove the element from the "Draggable Events" list
$(this).remove()
}

}
})

/* ADDING EVENTS */
var currColor = '#3c8dbc' //Red by default
//Color chooser button
var colorChooser = $('#color-chooser-btn')
$('#color-chooser > li > a').click(function (e) {
    e.preventDefault()
//Save color
currColor = $(this).css('color')
//Add color effect to button
$('#add-new-event').css({
    'background-color': currColor,
    'border-color'    : currColor
})
})
$('#add-new-event').click(function (e) {
    e.preventDefault()
//Get value and make sure it is not null
var val = $('#new-event').val()
if (val.length == 0) {
    return
}

//Create events
var event = $('<div />')
event.css({
    'background-color': currColor,
    'border-color'    : currColor,
    'color'           : '#fff'
}).addClass('external-event')
event.html(val)
$('#external-events').prepend(event)

//Add draggable funtionality
ini_events(event)

//Remove event from text input
$('#new-event').val('') 
})
})
</script>
@endpush
