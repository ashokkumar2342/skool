<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html/jpg/png; charset=utf-8"/>
<head>
    <style>
     @page { margin: 0px; 
     
   margin-top: 0cm;
   margin-bottom: 0cm;
   border: 1px solid blue;
     }
     body { margin: 20px; }
     
   .pagenum:before {
        content: counter(page);
    }

  </style>
    @include('admin.include.boostrap')
</head>



<body >
    @include('schoolDetails.logo_header')
    <div class="row">
        <div class="col-lg-10" style="margin-left: 60px">

            <table id="dataTable" class="table table-striped table-responsive table-condensed table-bordered">
                <thead>
                    <tr>

                        <th>Sr.No.</th>                   
                        <th>Class</th>                   
                        <th>Section</th>  
                    </tr>
                </thead>
                <tbody>
                    @php

                    $subjectId=1;
                    @endphp
                    @foreach($sections as $section)
                    <tr>

                        <td>{{ $subjectId++}}</td>                 
                        <td>{{ $section->classes->name or ''}}</td>                 
                        <td>{{ $section->sectionTypes->name or ''}}</td>                 
                                        

                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div> 
    </div>
<div class="row" style="margin-left: 10px">
   <div class="col-lg-4"> 
  Total Record :
   <span style="margin-top: 20px"><b>{{ $subjectId ++ -1 }}</b></span>
 
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