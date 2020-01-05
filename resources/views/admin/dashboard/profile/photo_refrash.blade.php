@php
$admins=Auth::guard('admin')->user();
$profile = route('admin.profile.photo.show',$admins->profile_pic);
@endphp
 
<img  src="{{ ($admins->profile_pic)? $profile : asset('profile-img/user.png') }}" class="user-image">
{{-- <img src="{{asset('front_asset/images/hdg-01.jpg')}}" alt="" class="user-image">
	  --}}
 
<span class="hidden-xs">{{ Auth::guard('admin')->user()->first_name }}</span>