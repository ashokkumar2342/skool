@php
$image = route('admin.parents.image.show',$parent_id); 
@endphp 
<img  class="profile-user-img img-responsive img-circle" src="{{ ($image)? $image : asset('profile-img/user.png') }}" alt="" width="103px" height="103px" style="float: right; border:solid 2px Black" onclick="callPopupLarge(this,'{{ route('admin.parents.image',$parent_id) }}')">