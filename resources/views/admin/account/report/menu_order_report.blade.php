<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html/jpg/png; charset=utf-8"/>
<head>
   <style>
     @page { margin:0px; }
     
   .pagenum:before {
        content: counter(page);
    }
    .page_break{
      page-break-before: always;
    }

  </style>
 @include('admin.include.boostrap')
</head>
<body style="background-color:#fff">
@include('schoolDetails.logo_header')
 <div class="row">
 <div class="col-lg-10" style="margin-left: 60px">
 	
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
      <tr style="background-color: #15c43e">
        <td>{{ $arrayId++ }}</td>
        <td><h3>{{ $menu->name }}</h3></td>
       
       
      </tr>
      @foreach ($subMenus as $subMenu)
         @if ($menu->id==$subMenu->menu_type_id )
      <tr style="background-color: #dbe09e">
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
 </div>
 <div class="row" style="margin-left: 10px">
   <div class="col-lg-4"> 
  Total Record :
   <span style="margin-top: 20px"><b>{{ $arrayId ++ -1 }}</b></span>
 
 </div><div class="col-lg-4"> 
 Total Pages :
   <b><span class="pagenum" style="margin-top: 20px"></span></b>
 
 </div>
 <div class="col-lg-4"> 
  End of Report
 
 </div>
</div>
  
</body>
 
</html>