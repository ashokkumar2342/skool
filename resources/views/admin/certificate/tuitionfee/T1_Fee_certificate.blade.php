  <!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html/jpg/png; charset=utf-8"/>
<head>
    <style> 
     p{
    font-size: 18px;
    letter-spacing: 1px;
    text-align: justify;
   }
    </style>
    @include('admin.include.boostrap')
</head> 
<body > 
@include('schoolDetails.logo_header')
 <div align="center" style="padding-top: 40px">
    <h3><b>Fee Certificate</b></h3>
  </div>
  <div style="padding-top: 10px">
    <p>This is to certify that Km. <b>{{  $student->name }} </b>
    Regis.No. <b>{{  $student->registration_no }}</b> D/o <b>{{  $student->parents[2]->parentInfo->name or ''}}</b> & Smt.<b>{{  $student->parents[0]->parentInfo->name or ''}}.</b> 
    has been a bonafide student of class <b>{{  $student->classes->name or '' }}</b> of this school   </p> 
    <p>The guardian has paid a sum of Rs<b>{{ $studentFeeTotal[0]->FAmount }}</b> (<b>{{ $studentFeeTotal[0]->FAmtWords }}</b>) 
    towards the fee of his/her ward from <b>{{ date('F-Y',strtotime($academicYears->start_date)) }}</b> 
    to <b>{{ date('F-Y',strtotime($academicYears->end_date)) }}</b> as per detail below</p>
    <div class="col-lg-7" style="padding-left: 110px;padding-top: 20px;font-size: 16px">
      @foreach ($studentFees as $studentFee) 
           <span style="float: left;"><b>{{ $studentFee->name }}</b></span><span style="float: right;">{{ $studentFee->FAmount }}</span><br> 
        @endforeach 
    </div>    
  </div>
  <div style="padding-top: 350px">
    <span>
      Place:__________<br>
      Date:____________
    </span>
    <span style="float: right;">
       Principal
    </span>
   
  </div>
  
   
 </body>
 </html>