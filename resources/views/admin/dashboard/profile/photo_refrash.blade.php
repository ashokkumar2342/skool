@php
$admins=Auth::guard('admin')->user();
$profile = route('admin.profile.photo.show',$admins->profile_pic);
@endphp
@if ($admins->profile_pic==null)

<img src="{{asset('front_asset/images/hdg-01.jpg')}}" alt="" class="user-image">
	 
@else
<img src="{{ $profile }}" class="user-image">
@endif
<span class="hidden-xs">{{ Auth::guard('admin')->user()->first_name }}</span>