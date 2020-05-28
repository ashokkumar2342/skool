@php
  $SchoolDetail=App\School_details::first();  
   
@endphp
<header style="border: 2px solid #5f0202;">
	
<table>
<tbody>
<tr>
<td class="text-nowrap">{!! $SchoolDetail->report_header !!}</td>
</tr>
</tbody>
</table>
</header>