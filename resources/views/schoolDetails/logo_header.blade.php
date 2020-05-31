@php
  $SchoolDetail=App\School_details::first();  
   
@endphp 
<style> 
 span{
 	text-align:middle;display:inline-block;
 	padding-top: 10px;
 }
 
</style>
<table>
<tbody>
<tr>
<td class="text-nowrap">{!! $SchoolDetail->report_header !!}</td>
</tr>
</tbody>
</table>
 