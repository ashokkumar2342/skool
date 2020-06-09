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
<div class="panel-heading">User : <b style="color:#d02ee7">{{ $usersName->first_name }}  </b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; User Class Assign Report</div>
</div>  
<table class="table table-responsive table-hover table-bordered" id="class_section_list">
    <thead>
        <tr>
            <th>Sr.No.</th>
            <th>Class</th>
            <th>Section</th>
        </tr>
    </thead>
    <tbody>
        @php
          $arrayId=1;  
        @endphp
        @foreach ($userClassTypes as $userClassType)
                    <tr>
                        <td>{{ $arrayId++}}</td>
                        <td>{{ $userClassType->classes->name or ''}}</td>
                        <td>{{ $userClassType->sectionTypes->name or ''}}</td>
                         
                    </tr> 
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