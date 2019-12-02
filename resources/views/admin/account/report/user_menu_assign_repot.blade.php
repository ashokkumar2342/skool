 
<div class="col-lg-12" style="margin-top:10px;">
   @php
       $admin=App\Admin::find($id);
     @endphp  
        User Name : <span style="color:#d02ee7 ;margin-bottom: 10px"><b>{{ $admin->email or '' }}-( {{ $admin->first_name or '' }} )</b></span> 
  <table class="table table-condensed "id="user_menu_table" style="width: 100%"> 
    <thead> 
      <tr>
        <th>Sub Menu Name</th>
        <th>Main Menu Name</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($menus as $menu)
      <tr>
        <td></td>
        <td>{{ $menu->name }}</td>
        <td></td>
      </tr>
      @foreach ($subMenus as $subMenu)
         @if ($menu->id==$subMenu->menu_type_id )
      <tr style="{{ in_array($subMenu->id, $usersmenus)?'background-color: #95e49b':'background-color: #ec2020' }}">
        <td>{{ $subMenu->name }}</td>
        <td></td>
            
         <td>@if ( in_array($subMenu->id, $usersmenus)) Yes @else  No @endif  </td> 
    
      </tr>
       @endif 
       @endforeach  
       @endforeach 
    </tbody>
  </table>
</div>