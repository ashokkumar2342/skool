@php
  $SchoolDetail=App\School_details::first();  
   
@endphp
<div class="row"> 

    {!! $SchoolDetail->report_header !!}
 
</div>