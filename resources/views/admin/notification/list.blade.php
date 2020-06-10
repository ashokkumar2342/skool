@foreach ($notifications as $notification) 
@php
  $style ='';
@endphp
@if ($notification->status==0)
 @php
   $style ='background-color: #dadada;border-bottom: 1px solid #ab9e9e;'
 @endphp

@endif
<li style="{{ $style }}">
  <a href="{{ $notification->link!=null?route(''.$notification->link):'' }}">
     
    <h4 style="margin-left:0px" onclick="callAjax(this,'{{ route('notification.read.status',Crypt::encrypt($notification->id)) }}')">
      {{ $notification->message }}
      <small><i class="fa fa-clock-o"></i> {{ $notification->created_at != null?$notification->created_at->diffForHumans():'' }}</small>
    </h4>
    {{-- <p>{{ $notification->message }}</p> --}}
  </a>
</li>
@endforeach                