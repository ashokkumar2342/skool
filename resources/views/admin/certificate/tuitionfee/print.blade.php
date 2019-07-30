 <!DOCTYPE html>
 <html>
 <head>
   <title>tes</title>
 </head>
 <body>
 <div align="center">
    <h1>Fee Certificate</h1>
  </div>
  <div style="padding-top: 50px; padding-left: 100px;">
    <p>This is to certify that Km. <b>{{  $students->name }} </b></p>
    <p>Admn.No. <b>{{  $students->admission_no }}</b> D/o <b>{{  $students->father_name }}</b> & Smt.<b>{{  $students->mother_name }}</b> </p>
    <p>This been a bonafide student of class <b>{{  $students->classes->name or '' }}</b> of this school   </p> 
    <p style="padding-top: 50px">The guardian has paid a sum of _____2345.00____</p>
    <p>(___Rs Twent Seven THousant___)</p>
    <p>towards the fee of his/her ward from___April-2019___</p>
    <p>to _____March-2019____ =as per detail below</p>
             <p style="padding-left:60px;padding-top:40px">ANNUAL CHARGES <span style="padding-left: 60px">34567894567</span> </p>
             <p style="padding-left: 60px">ANNUAL CHARGES</p>
             <p style="padding-left: 60px">ANNUAL CHARGES</p>
             <p style="padding-left: 60px">ANNUAL CHARGES</p>
             <p style="padding-left: 60px">ANNUAL CHARGES</p>
             <p style="padding-left: 60px">ANNUAL CHARGES</p>
             <p style="padding-left: 60px">ANNUAL CHARGES</p>
  </div>
  <div style="padding-left:100px;padding-top: 100px;">
    Place:__________<br>
    Date:____________
  </div>
  <div style="float: right;padding-right: 100px;">
    Principal
  </div>
   
 </body>
 </html>