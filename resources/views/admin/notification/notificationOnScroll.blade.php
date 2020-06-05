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
  <a href="#">
     
    <h4 style="margin-left:0px">
      AdminLTE Design Team
      <small><i class="fa fa-clock-o"></i> {{ $notification->created_at->diffForHumans() }}</small>
    </h4>
    {{-- <p>{{ $notification->message }}</p> --}}
  </a>
</li>
@endforeach  