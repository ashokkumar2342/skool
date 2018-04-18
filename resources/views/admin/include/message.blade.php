@if(Session::has('message'))
@php
$admin = Auth::guard('admin')->user();
$data = new App\Model\Activity();
$data->admin_id = $admin->id;
$data->message = Session::get('message');
$data->save();
@endphp
<script type="text/javascript">
    Command: toastr["{{ Session::get('class') }}"]("{{ Session::get('message') }}");
</script>
@endif