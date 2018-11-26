 @php
 	$datas =explode(',', $roles->sub_menu_id);
 @endphp

 {{ Form::label('sub_menu','Menu',['class'=>' control-label']) }} 
<select class="form-control multiselect" multiple="multiple"  name="sub_menu[]" multiselect-form="true" id="menu_list" > 
  @foreach ($menus as $menu) 
    <optgroup label="{{ $menu->name }}"> 
      @foreach ($subMenus as $subMenu)
      @if ($menu->id==$subMenu->menu_type_id )
          <option value="{{ $subMenu->id }}" {{ in_array($subMenu->id, $datas)?'selected':'' }} >{{ $subMenu->name }}</option> 
      @endif
       
       @endforeach 
    </optgroup>
  @endforeach  
     
</select>