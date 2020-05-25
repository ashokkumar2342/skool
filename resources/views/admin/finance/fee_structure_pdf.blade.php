<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html/jpg/png; charset=utf-8"/>
<head>
	<style>
		 @page { margin:0px; }
     
   .pagenum:before {
        content: counter(page);
    }

	</style>
 @include('admin.include.boostrap')
</head>
    
 
  
<body>
@include('schoolDetails.logo_header')
 <div class="row">
 <div class="col-lg-10" style="margin-left: 60px">
  	
 <table class="table  table-bordered">
                         
      <thead>
          <tr>
            <th class="text-nowrap">SR.No.</th>
            <th class="text-nowrap">Fee Structure Code</th>
            <th class="text-nowrap">Fee Structure Name</th>
            <th class="text-nowrap">Fee Account Name</th>
            <th class="text-nowrap">Fine Scheme</th>
            <th class="text-nowrap">Refundable</th>                                                            
                                                                      
        </tr>
      </thead>
      <tbody>
        @php
          $arrayId=1;
        @endphp
         @foreach ($feeStructures as $feeStructure)
            <tr>
              <td>{{ $arrayId++ }}</td>
              <td>{{ $feeStructure->code }}</td>
              <td>{{ $feeStructure->name }}</td>
                  <td>{{ $feeStructure->feeAccounts->name or '' }}</td>
                  <td>{{ $feeStructure->fineSchemes->name or '' }}</td>
              <td>{{ $feeStructure->is_refundable == 1 ?'yes':'No' }}</td>
              
            </tr>    
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