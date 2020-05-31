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
    <table id="fine_scheme_table" class="display table table-bordered"> 
        <thead>
            <tr>
                <th class="text-nowrap">Sr.No.</th>
                <th class="text-nowrap">Code</th>
                <th class="text-nowrap">Name</th>
                <th class="text-nowrap">Amount 1</th>
                <th class="text-nowrap">Amount 2</th>
                <th class="text-nowrap">Amount 3</th>
                <th class="text-nowrap">Days After 1</th>
                <th class="text-nowrap">Days After 2</th>
                <th class="text-nowrap">Fine Period</th> 
            </tr>
        </thead> 
        <tbody>
            @php
            $arrayId=1;
            @endphp
            @foreach ($fineSchemes as $fineScheme)
            <tr>
                <td>{{ $arrayId++ }}</td>
                <td>{{ $fineScheme->code }}</td>
                <td>{{ $fineScheme->name }}</td>
                <td>{{ $fineScheme->fine_amount1 }}</td>
                <td>{{ $fineScheme->fine_amount2 }}</td>
                <td>{{ $fineScheme->fine_amount2 }}</td>
                <td>{{ $fineScheme->day_after1 }}</td>
                <td>{{ $fineScheme->day_after2 }}</td>
                <td>{{ $fineScheme->finePeriods->name }}</td> 
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