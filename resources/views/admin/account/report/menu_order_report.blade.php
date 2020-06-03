 <!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html/jpg/png; charset=utf-8"/>
<head>
    <style> 
        .pagenum:before {
            content: counter(page);
        }
        .page_break{
            page-break-before:always;  
        } 
    </style>
    @include('admin.include.boostrap')
</head> 
<body > 
@include('schoolDetails.logo_header')
<div class="row" style="margin-top: -20px">
<div class="panel panel-warning">
  <div class="panel-heading text-center">Menu Report</div>
  </div>  
 <table class="table table-condensed table-bordered table-striped"id="menu_role_table" style="width: 100%">
    <thead>
    
      <tr>
        <th>Sr.No.</th>
        <th>Menus</th>
        
        
      </tr>
    </thead>
    @php
      $arrayId=1;
    @endphp
    <tbody>
        @foreach ($menus as $menu)
      <tr style="background-color: #a24e30">
        <td><h3>{{ $arrayId++ }}</h3></td>
        <td><h3>{{ $menu->name }}</h3></td>
       
       
      </tr>
      @foreach ($subMenus as $subMenu)
         @if ($menu->id==$subMenu->menu_type_id )
      <tr style="background-color: #ecd50a">
        <td></td>
        <td>{{ $subMenu->name }}</td>
       
            
         
    
      </tr>
       @endif 
       @endforeach
       @if ($optradio=='menu_wise')
        
      <tr>
        <td colspan="4">
           <div class="page_break"></div>
        </td>
      </tr>
       @endif
       @endforeach 
    </tbody>
  </table>
   </div> 
      <div class="row">
        <div class="col-lg-4"> 
           Total Record :<b>{{ $arrayId ++ -1 }}</b> 
        </div>
        <div class="col-lg-4"> 
           Total Pages :
           <b class="pagenum"></b> 
        </div>
        <div class="col-lg-4"> 
           End of Report 
        </div>
     </div>  
  </body> 
  </html>