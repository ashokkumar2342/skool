 <!DOCTYPE html>
 <html>
 <head>
 	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 	<title></title>
 </head>
  @include('admin.include.boostrap')
 <body>               
 	 

 	<h4 align="center"><b>medicalInfo Details</b></h4><hr> 
 	 
 	                      
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
     <p><li>On Date :- <b>{{ Carbon\Carbon::parse($medicalInfo->ondate)->format('d-m-Y') }}</b></li></p>
   </div> 
   <div class="col-lg-6">
    <p><li>Blood Group :-<b> {{ $medicalInfo->bloodgroups->name or ''}} </b> </li></p>
  </div>
  </div>
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    <p><li>HB :-<b> {{ $medicalInfo->hb }} </b> </li></p>  
  </div> 
  <div class="col-lg-6">
    <p><li>BP Upper/Lower:-<b> {{ $medicalInfo->bp_uper }}/{{ $medicalInfo->bp_lower }}</b> </li></p>
  </div>
  </div>
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    <p><li>Height :-<b> {{ $medicalInfo->height }}</b> </li></p>  
  </div> 
  <div class="col-lg-6">
    <p><li>Weight :-<b> {{ $medicalInfo->weight }} </b> </li></p>
  </div>
  </div> 
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    @if ($medicalInfo->physical_handicapped==0)

    <p><li>Physical Handicapped:-<b>No</b> </li></p>  
    @else
    <p><li>Physical Handicapped :-<b>Yes</b> </li></p>  
    @endif 
  </div> 
  <div class="col-lg-6">
    <p><li>Narration :-<b> {{ $medicalInfo->narration }}</b> </li></p>
  </div>
  </div> 
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    @if ($medicalInfo->alergey==0)

    <p><li>Alergey :-<b>No</b> </li></p>  
    @else
    <p><li>Alergey :-<b>Yes</b> </li></p>  
    @endif 
  </div> 
  <div class="col-lg-6">
   <p><li>Alergey Vacc :-<b> {{ $medicalInfo->alergey_vacc }}</b> </li></p>
  </div>
  </div> 
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
     <p><li>ID Mark 1 :-<b> {{ $medicalInfo->id_marks1 }}</b> </li></p>  
   </div> 
   <div class="col-lg-6">
     <p><li>ID Marks 2 :-<b> {{ $medicalInfo->id_marks2 }}</b> </li></p>
   </div>
  </div>
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
     <p><li>Dental :-<b> {{ $medicalInfo->dental }}</b> </li></p>  
   </div> 
   <div class="col-lg-6">
    <p><li>Vision :-<b> {{ $medicalInfo->vision }}</b> </li></p>
  </div>
  </div> 
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6">
     <p><li>Complextion :-<b> {{ $medicalInfo->complextion }}</b> </li></p>
   </div>
  </div>
    

 </body>
 </html>