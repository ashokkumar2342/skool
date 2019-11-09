 <!DOCTYPE html>
 <html>
 <head>
 	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 	<title></title>
 </head>
 <style type="text/css">
    .page-breck{
      page-break-before:always; 
    }
  
 </style>
  @include('admin.include.boostrap')
 <body>
         @php
            $student=App\Student::find($student_id);
            $path =storage_path('app/student/profile/'.$student->barcode);
          @endphp
           <div class="row pull-right">
          <div class="col-lg-12">
          <img  src="{{ $path }}" alt="" width="20%" height="10%" >
            
          </div>
        </div>
 	<h4 align="center" style="margin-left: 20px"><b>MedicalInfo Details</b></h4>
  @php
    $key=0;
  @endphp
  @foreach ($medicalInfos as $medicalInfo) 
 	            
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
    <p><li>BP :-<b> {{ $medicalInfo->bp }}</b> </li></p>
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
  </div><hr> 
  @php
    $key++; 
  @endphp
  @if ($key==4)
   <div class="page-breck"></div> 
   @php
    $key=0;
  @endphp
  @endif
  
@endforeach     
   
   
   <div class="page-breck"></div>
                          
    <h4 align="center" style="margin-left: 20px"><b>MedicalInfo Details</b></h4>                                        
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
     <p><li>On Date : ................ <b></b></li></p>
   </div> 
   <div class="col-lg-6">
    <p><li>Blood Group : ................ </li></p>
  </div>
  </div>
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    <p><li>HB : ................</li></p>  
  </div> 
  <div class="col-lg-6">
    <p><li>BP : ................</li></p>
  </div>
  </div>
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    <p><li>Height : ................</li></p>  
  </div> 
  <div class="col-lg-6">
    <p><li>Weight : ................</li></p>
  </div>
  </div> 
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
     

    <p><li>Physical Handicapped : ................</li></p>  
    
      
    
  </div> 
  <div class="col-lg-6">
    <p><li>Narration : ................</li></p>
  </div>
  </div> 
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
    

    <p><li>Alergey : ................</li></p>  
    
  </div> 
  <div class="col-lg-6">
   <p><li>Alergey Vacc : ................</li></p>
  </div>
  </div> 
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
     <p><li>ID Mark 1 : ................</li></p>  
   </div> 
   <div class="col-lg-6">
     <p><li>ID Marks : ................</li></p>
   </div>
  </div>
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6"> 
     <p><li>Dental : ................</li></p>  
   </div> 
   <div class="col-lg-6">
    <p><li>Vision : ................</li></p>
  </div>
  </div> 
  <div class="row" style="margin-left: 80px"> 
   <div class="col-lg-6">
     <p><li>Complextion : ................</li></p>
   </div>
  </div>
  
 </body>
 </html>