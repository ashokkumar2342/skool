@foreach ($notifications as $notification) 
<li>
  <a href="#">
     
    <h4 style="margin-left:0px">
      AdminLTE Design Team
      <small><i class="fa fa-clock-o"></i> {{ date('d M-Y', strtotime($notification->created_at)) }}</small>
    </h4>
    {{-- <p>{{ $notification->message }}</p> --}}
  </a>
</li>
@endforeach                