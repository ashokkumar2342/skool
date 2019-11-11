 @php
$datas =explode(',', $roles->sub_menu_id);
@endphp 
<div class="col-lg-12" style="margin-top:10px;">
  <table class="table table-condensed "id="menu_role_table" style="width: 100%">
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
      <tr style="{{ in_array($subMenu->id, $datas)?'background-color: #95e49b':'background-color: #ec2020' }}">
        <td>{{ $subMenu->name }}</td>
        <td></td>
            
         <td>@if ( in_array($subMenu->id, $datas)) Yes @else  No @endif  </td> 
    
      </tr>
       @endif 
       @endforeach  
       @endforeach 
    </tbody>
  </table>
</div>