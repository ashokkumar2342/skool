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
    
 
  
<body style="background-color:#fff">
@include('schoolDetails.logo_header')
 <div class="row">
 <div class="col-lg-10" style="margin-left: 60px">
  	
 <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                 <tr>
                   <th>Sr.No.</th>
                   <th>Class</th>
                   <th>Section </th>
                   <th>Room No</th>
                   
                 </tr>
               </thead>
               <tbody>
                @php
                  $arrayId=1;
                @endphp
                @foreach ($classWiseRooms as $classWiseRoom)
                           <tr>
                             <td>{{ $arrayId++ }}</td>
                             <td>{{ $classWiseRoom->classType->name or '' }}</td>
                             <td>{{ $classWiseRoom->sectionTypes->name or ''}}</td>
                             <td>{{ $classWiseRoom->roomType->name or ''}}</td>
                            

                        
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