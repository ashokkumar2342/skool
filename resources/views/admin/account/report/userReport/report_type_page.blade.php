@if ($reportType==1)
<label>Role</label> 
<select name="role_id" class="form-control form-group">
	<option value="all">All</option>
	@foreach ($datas as $data)
	   <option value="{{ $data->id }}">{{ $data->name }}</option> 
	@endforeach 
</select> 
@endif
@if ($reportType==2)
<label>Users</label> 
<select name="user_id" class="form-control form-group select2"> 
	@foreach ($datas as $data)
	   <option value="{{ $data->id }}">{{ $data->email }}&nbsp;&nbsp;&nbsp;&nbsp; ({{ $data->first_name }})</option> 
	@endforeach 
</select> 
@endif
@if ($reportType==3)
 {{ Form::label('sub_menu','Menu',['class'=>' control-label']) }} <br>
<select class="form-control"  name="sub_menu_id" > 
  @foreach ($menus as $menu) 
    <optgroup label="{{ $menu->name }}"> 
      @foreach ($subMenus as $subMenu)
      @if ($menu->id==$subMenu->menu_type_id )
          <option value="{{ $subMenu->id }}">{{ $subMenu->name }}</option> 
      @endif
       
       @endforeach 
    </optgroup>
  @endforeach  
     
</select>
 
@endif