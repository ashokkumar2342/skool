    <table class="table"> 
      <thead>
        <tr>
          <th>Event</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>Event For</th> 
        </tr>
      </thead>
      <tbody>
        @foreach($events as $event)
        <tr>
           <td>{{ $event->event_name}}</td>
           <td>{{ date('d-m-Y', strtotime($event->start_date )) }}</td> 
           <td>{{  date('d-m-Y',strtotime($event->end_date)) }}</td> 
           <td>{{ $event->eveneFor->name or '' }}</td>
           
        </tr>
        @endforeach
      </tbody>
    </table>