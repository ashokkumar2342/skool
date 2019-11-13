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
  	
 <table id="class_section" class="table table-bordered table-striped table-hover">
    <thead>
    <tr>
         
      <th>Sr.No.</th>                   
      <th>Section Name</th>                   
      <th>Section Code</th>  
    </tr>
    </thead>
    <tbody>
      @php 
       $sectionId=1;
      @endphp
    @foreach($sections as $section)
    <tr>
       
      <td>{{ $sectionId++ }}</td>                 
      <td>{{ $section->name }}</td>                 
      <td>{{ $section->code }}</td>                 
              
    </tr>
    @endforeach
    </tbody>
     
  </table>
  </div> 
 </div>
  <div class="col-lg-2" style="float: right;"><h4>
  Total Record :
   <span style="margin-top: 20px"><b>{{ $sectionId ++ -1 }}</b></span><br>
  Total Pages :
   <b><span class="pagenum" style="margin-top: 20px"></span></b><br> 
  
  End of Reports
   <span></span> 
   
 </h4></div> 
</body>
 
</html>