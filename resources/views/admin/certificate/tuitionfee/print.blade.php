 <!DOCTYPE html>
 <html>
 <head>
   <title>tes</title>
 </head>
 <style>
   p{
    font-size: 18px;
    letter-spacing: 1px;
    text-align: justify;
   }
 </style>
  @include('admin.include.boostrap')
 <body> 
  @include('schoolDetails.logo_header')
 <div align="center" style="padding-top: 40px">
    <h3><b>Fee Certificate</b></h3>
  </div>
  <div style="padding-top: 10px">
    <p>This is to certify that Km. <b>{{  $student->name }} </b>
    Regis.No. <b>{{  $student->registration_no }}</b> D/o <b>{{  $student->parents[2]->parentInfo->name }}</b> & Smt.<b>{{  $student->parents[0]->parentInfo->name }}.</b> 
    has been a bonafide student of class <b>{{  $student->classes->name or '' }}</b> of this school   </p> 
    <p>The guardian has paid a sum of Rs<b>2345.00</b> (Rs <b>Two thousant three hundred fourty five</b>) 
    towards the fee of his/her ward from <b>April-2019</b> 
    to <b>April-2019</b> as per detail below</p>
    <div class="col-lg-7" style="padding-left: 110px;padding-top: 20px">
      <span style="float: left;"><b>ANNUAL CHARGES</b></span><span style="float: right;">1000.00</span><br>
      <span style="float: left;"><b>BUILDING FUND</b></span><span style="float: right;">10.00</span><br>
      <span style="float: left;"><b>COMPUTRE FEE</b></span><span style="float: right;">1000.00</span><br>
      <span style="float: left;"><b>HOUSE EXAMINATION FEES</b></span><span style="float: right;">99991000.00</span><br>
      <span style="float: left;"><b>I-CARD</b></span><span style="float: right;">1000.00</span><br>
      <span style="float: left;"><b>MAGAZINE FEE</b></span><span style="float: right;">1000.00</span><br>
      <span style="float: left;"><b>MED.INSURANCE</b></span><span style="float: right;">1000.00</span><br>
      <span style="float: left;"><b>STUDENT FUN</b></span><span style="float: right;">1000.00</span><br>
      <span style="float: left;"><b>TUITION FEES</b></span><span style="float: right;">1000.00</span><br>
 
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