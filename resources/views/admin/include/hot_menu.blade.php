<ol class="breadcrumb"> 
  @php
   $hotMenus =App\Helper\MyFuncs::hotMenu($menu_type_id); 
  @endphp
  @foreach($hotMenus as $hotMenu)
  <li><b ><a style="font-size:14px;color:#63696b;" onMouseOver="this.style.color='#222d32'"
   onMouseOut="this.style.color='#63696b'" href="{{ route(''.$hotMenu->url) }}">{{ $hotMenu->name }}</a></b></li>
  @endforeach 
</ol>