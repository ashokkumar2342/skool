 {{ Form::label('sub_menu','Menu',['class'=>' control-label']) }} <br>
<select class="multiselect" multiple="multiple"  name="sub_menu[]" > 
  @foreach ($menus as $menu) 
    <optgroup label="{{ $menu->name }}"> 
      @foreach ($subMenus as $subMenu)
      @if ($menu->id==$subMenu->menu_type_id )
          <option value="{{ $subMenu->id }}" {{ in_array($subMenu->id, $usersHotMenus)?'selected':'' }} >{{ $subMenu->name }}</option> 
      @endif
       
       @endforeach 
    </optgroup>
  @endforeach  
     
</select>