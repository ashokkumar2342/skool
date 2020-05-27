 
<div class="col-lg-6"> 
 {{ Form::label('sub_menu','Menu',['class'=>' control-label']) }} <br>
<select class="multiselect" multiple="multiple"  name="sub_menu[]" > 
  @foreach ($menus as $menu) 
    <optgroup label="{{ $menu->name }}"> 
      @foreach ($subMenus as $subMenu)
      @if ($menu->id==$subMenu->menu_type_id )
          <option value="{{ $subMenu->id }}" {{ in_array($subMenu->id, $usersmenus)?'selected':'' }} >{{ $subMenu->name }}</option> 
      @endif
       
       @endforeach 
    </optgroup>
  @endforeach 
</select> 
</div>
 <div class="col-md-1" style="margin-top: 24px"> 
 <button type="submit"  class="btn btn-success">Save</button>  
  
   
 </div>  <div class="col-md-1" style="margin-top: 24px"> 
  
  <a href="{{ route('admin.account.user.menu.assign.report',Crypt::encrypt($id)) }}" class="btn btn-primary" target="blank" title="">PDF</a>
  
   
 </div> 
 
 
 @include('admin.account.report.user_menu_assign_repot')

 
        

</div> 
