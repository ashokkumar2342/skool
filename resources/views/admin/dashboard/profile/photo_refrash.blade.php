@php
$admins=Auth::guard('admin')->user();
$profile = route('admin.profile.photo.show',$admins->profile_pic);
@endphp
<img src="{{ $profile }}" class="user-image">
<span class="hidden-xs">{{ Auth::guard('admin')->user()->first_name }}</span>