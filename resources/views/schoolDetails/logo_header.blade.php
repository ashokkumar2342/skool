@php
  $SchoolDetail=App\School_details::first();  
   
@endphp
<table style="height: 150px;" width="619">
<tbody>
<tr>
<td style="width: 100%;">{!! $SchoolDetail->report_header !!}</td>
</tr>
</tbody>
</table>