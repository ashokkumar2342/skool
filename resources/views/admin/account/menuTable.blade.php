 {{ Form::label('sub_menu','Menu',['class'=>' control-label']) }} 
<select class="form-control" multiple  name="sub_menu[]" multiselect-form="true" id="menu_list" size="30" style="height: 100%;"> 
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
