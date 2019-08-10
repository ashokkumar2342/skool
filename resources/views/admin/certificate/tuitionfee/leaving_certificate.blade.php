 <!DOCTYPE html>
 <html>
 <head>
   <title>tes</title>
   <style>
    
   </style>
 </head>
  @include('admin.include.boostrap')
 <body>
  <h5 style="padding-top: -40px;float: right">Senior 12334</h5>
  <div align="center">
    <h5 style="padding-top: -20px">Senior Secondary School</h5>
  </div>
   
    <P style="padding-left:13px">School Name : <b>VAISH MODEL SR.SEC.SCHOOL</b><br>
    Block : <b>Bhlwanl</b> &nbsp;&nbsp; District : <b>Bhlwanl</b><br>
    UDISE Code : <b>{{ $CertificateIssueDetail->udise_code }}</b> Department School Code : <b>{{ $CertificateIssueDetail->department_school_code }}</b></P>
     
 <div align="center">
    <h3><u><b>SCHOOL LEAVING CERTIFICATE</b></u></h3>
    <P style="padding-left: 27px;"><h5>(Academic Year:  <b>{{ $CertificateIssueDetail->academicYear->name }}</b> )</h5></P>
  </div> 
  <div style="padding-top: 2px; padding-left: 13px;">
    <p>File No.<b>{{ $CertificateIssueDetail->file_no }}</b><span style="float: right">Date of issue <b>{{ date('d-m-Y',strtotime($CertificateIssueDetail->created_at)) }}</b></span></p>
  </div>
    <div style="padding-top: 2px; padding-left: 13px;"> 
    <p>Pupils Name Mr. <b>{{ $student->name }}</b><br>
    Date of Birth <b>{{ date('d-M-Y',strtotime($student->dob)) }}</b><br>
    Student Registration No.(SRN) <b>{{ $student->registration_no }}</b><span style="padding-left: 50px">No.InAdmission Registre <b>{{ $student->admission_no }}</b></span><br><br>
     Name Of Father/Guardian <b>{{ $student->father_name }}</b><br>
    Mother Mrs.<b>{{ $student->mother_name }}</b></p>
    <p style="padding-top: 5px">Cretified that Mr.<b>{{ $student->name }}</b> attended this school up-to <b>{{ date('d-m-Y') }}</b> He/she has paid all sum due to the school and was allowed on the above date to withdraw his/her name He/she was reading in class <b>{{ $student->classes->name or '' }}</b> in this school</p>
    <p style="padding-top: 5px">1.he/she was examined in <b>{{ $student->classes->name or '' }}</b> and</p>
    <p style="padding-left: 20px">a.was allowed/promised promotion to .............<br>
     b.Passed the examination in the highest class available in the school, OR 
     c.Left the school min-session to join a different school,OR<br>
     d.Falled in............................................subject(s)<br>
    <p style="padding-left: 20px">Note:(please tick and fill whichever is applicable)</p><hr>
    <p>The following particulars are certified to be correct according to the registers of the school and the certificate's produced from previous school attended during the school year:</p><hr>
    <table style="height: 219px; width: 683px;" border="1">
<tbody>
<tr style="height: 46px">
<td style="width: 74px; height: 46px">&nbsp;</td>
<td style="width: 74px; height: 46px">&nbsp;</td>
<td style="width: 74px; height: 46px">&nbsp;</td>
<td style="width: 74px; height: 46px">&nbsp;</td>
<td style="width: 74px; height: 46px">&nbsp;</td>
<td style="width: 74px; height: 46px">&nbsp;</td>
<td style="width: 74px; height: 46px">&nbsp;</td>
<td style="width: 74px; height: 46px">&nbsp;</td>
<td style="width: 74px; height: 46px">&nbsp;</td>
</tr>
<tr style="height: 146px">
<td style="width:  74px; height: 46px">&nbsp;</td>
<td style="width: 74px; height: 46px">&nbsp;</td>
<td style="width: 74px; height: 46px">&nbsp;</td>
<td style="width: 74px; height: 46px">&nbsp;</td>
<td style="width: 74px; height: 46px">&nbsp;</td>
<td style="width: 74px; height: 46px">&nbsp;</td>
<td style="width: 74px; height: 46px">&nbsp;</td>
<td style="width: 74px; height: 46px">&nbsp;</td>
<td style="width: 74px; height: 46px">&nbsp;</td>
</tr>
</tbody>
</table>
     
     
  </div>
  <div style="padding-left:50px;">
    Place:__________<br>
    Date:____________
  </div>
  <div style="float: right;padding-right: 100px;">
    Principal
  </div>
   
 </body>
 </html>