 <!DOCTYPE html>
 <html>
 <head>
   <title>tes</title>
 </head>
 <style>
   p{
    font-size: 18px;
    letter-spacing: 1px;
   }
 </style>
  @include('admin.include.boostrap')
 <body>
   
  <div class="row"> 
        <div class="col-lg-2 pull-left" style="margin-right: 30px">
          @php
            $path =storage_path('app/public/logo/Logo_vaish_Model1.jpg');
          @endphp
          <img  src="{{ $path }}" alt="" width="170%"> 
        </div>
        <div class="col-lg-10" style="margin-left:110px ">
          <h2 style="color:#7f2809;"><b>VAISH MODEL SR.SEC.SCHOOL</b></h2><h6>(Affiliated to C.B.S.E, New Delhi)</h6><h6>Affiliation No 3456789 | School Code 47789</h6><h5><b>Loharu Road Bhiwani - 123456 (Hr.)</b></h5> 
        </div>
       </div>
 <div align="center" style="padding-top: 40px">
    <h3><b>Fee Certificate</b></h3>
  </div>
  <div style="padding-top: 10px">
    <p>This is to certify that Km. <b>{{  $student->name }} </b>
    Admn.No. <b>{{  $student->admission_no }}</b> D/o <b>{{  $student->father_name }}</b> & Smt.<b>{{  $student->mother_name }}.</b> 
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