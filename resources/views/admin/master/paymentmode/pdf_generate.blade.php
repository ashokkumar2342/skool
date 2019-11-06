<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html/jpg/png; charset=utf-8"/>
<head>
	<style>
		 @page { margin:0px; }
     .GFG{ 
         height: 120px; 
         width: 50%; 
         border: 5px solid black; 
         font-size:42px; 
         font-weight:bold; 
         color:green; 
         margin-left:50px; 
         margin-top:50px; 
         } 
	</style>
 @include('admin.include.boostrap')
</head>
    
 
  
<body style="background-color:#fff">
@include('schoolDetails.logo_header')
 <div class="row">
 <div class="col-lg-8" style="margin-left: 120px">
  	
 <table class="table table-striped table-responsive table-condensed table-bordered">
                         
      <thead>
          <tr>
              <th>Sr.No.</th>
              <th>Payment Mode</th>
              <th>Sorting Order No</th> 
          </tr>
      </thead>
      <tbody>
        @php
          $arrayId=1;
        @endphp
          @foreach ($PaymentMode as $PaymentMode) 
              <tr> 
                  <td>{{ $arrayId ++ }}</td>
                  <td>{{ $PaymentMode->name }}</td> 
                  <td>{{ $PaymentMode->sorting_order_id }}</td> 
              </tr>
           @endforeach
      </tbody>
  </table>
  </div> 
 </div>
   
</body>
 
</html>