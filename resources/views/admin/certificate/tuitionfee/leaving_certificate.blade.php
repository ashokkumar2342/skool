 <!DOCTYPE html>
 <html>
 <head>
   <title>tes</title>
 </head>
 <body>
  <div align="center">
    <h5>Senior Secondary School</h5>
  </div>
    <P style="padding-left: 27px">School Name ____________________________</P>
    <P style="padding-left: 27px">Block :________ </P> 
 <div align="center">
    <h3><u>SCHOOL LEAVING CERTIFICATE</u></h3>
    <P style="padding-left: 27px;"><h5>(Academic Year: 2019-2019)</h5></P>
  </div> 
  <div style="padding-top: 2px; padding-left: 100px;">
    <p>File No.2344 <span style="padding-left: 300px">Date of issue</span></p>
  </div>
    <div style="padding-top: 2px; padding-left: 100px;"> 
    <p>Pupils Name Mr. <b>{{ $students->name }}</b></p>
    <p>Date of Birth <b>{{ date('d-M-Y',strtotime($students->dob)) }}</b></p>
    <p>Student Registration No.(SRN) <b>{{ $students->registration_no }}</b><span style="padding-left: 50px">No.InAdmission Registre <b>{{ $students->admission_no }}</b></span></p>
    <p style="padding-top: 2px">Name Of Father/Guardian <b>{{ $students->father_name }}</b></p>
    <p>Mother Mrs.<b>{{ $students->mother_name }}</b></p>
    <p style="padding-top: 5px">Cretified that Mr.<b>{{ $students->name }}</b> attended this school up-to 17-jul-2019 He/she has paid all sum due to the school and was allowed on the above date to withdraw his/her name He/she was reading in class <b>{{ $students->classes->name or '' }}</b> in this school</p>
    <p style="padding-top: 5px">1.he/she was examined in <b>{{ $students->classes->name or '' }}</b> and</p>
    <p style="padding-left: 20px">a.was allowed/promised promotion to .............</p>
    <p style="padding-left: 20px">b.Passed the examination in the highest class available in the school, OR</p>
    <p style="padding-left: 20px">c.Left the school min-session to join a different school,OR</p>
    <p style="padding-left: 20px">d.Falled in............................................subject(s)</p>
    <p style="padding-left: 20px">Note:(please tick and fill whichever is applicable)</p><hr>
    <p>The following particulars are certified to be correct according to the registers of the school and the certificate's produced from previous school attended during the school year:</p><hr>
    <table style="height: 70px;" border="1" width="643">
<tbody>
<tr>
<td style="width: 65px;">&nbsp;</td>
<td style="width: 65px;">&nbsp;</td>
<td style="width: 65px;">&nbsp;</td>
<td style="width: 65px;">&nbsp;</td>
<td style="width: 65px;">&nbsp;</td>
<td style="width: 65px;">&nbsp;</td>
<td style="width: 65px;">&nbsp;</td>
<td style="width: 65px;">&nbsp;</td>
<td style="width: 65px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 65px;">&nbsp;</td>
<td style="width: 65px;">&nbsp;</td>
<td style="width: 65px;">&nbsp;</td>
<td style="width: 65px;">&nbsp;</td>
<td style="width: 65px;">&nbsp;</td>
<td style="width: 65px;">&nbsp;</td>
<td style="width: 65px;">&nbsp;</td>
<td style="width: 65px;">&nbsp;</td>
<td style="width: 65px;">&nbsp;</td>
</tr>
</tbody>
</table>
     
     
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