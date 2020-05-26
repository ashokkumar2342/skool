<div class="col-lg-3"> 
 {{ Form::label('sub_menu','Menu',['class'=>' control-label']) }} <br>
<select class="multiselect" multiple="multiple"  name="sub_menu[]" id="role_id"> 
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
</div>
 <div class="col-md-1" style="margin-top: 24px"> 
  <button type="submit"  class="btn btn-success">Save</button> 
  
   
 </div>
</form>
 <form action="{{ route('admin.account.default.user.role.report.generate',Crypt::encrypt($id)) }}" method="post" target="blank">
  {{ csrf_field() }}
     
     
 <div class="col-md-4" style="margin-top: 12px;">
 <div class="panel panel-default">
  <div class="panel-body">
    <label class="radio-inline"><input type="radio" name="optradio" value="selected">Only Selected</label>
    <label class="radio-inline"><input type="radio" name="optradio" checked value="all">All</label>
   {{-- <a href="{{ route('admin.account.default.user.role.report.generate',Crypt::encrypt($id)) }}'+'?time_table_type_id='+$('#optradio').val()" class="btn btn-primary pull-right" target="blank" title="">PDF</a> --}}
   <input type="submit" value="PDF" class="btn btn-primary pull-right">
  </div>
</div>  
 </div> 
   </form>  
 
 
 @include('admin.account.report.result')

 
        

</div> 