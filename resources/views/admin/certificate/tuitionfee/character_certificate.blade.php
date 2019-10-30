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
       
           @include('schoolDetails.logo_header')
     
 <div align="center" style="padding-top: 30px">
    <h3><u><b>CHARACTER CERTIFICATE</b></u></h3>
  </div>
   <p style="padding-left:10px">this is to certify that Master/Miss <b>{{ $student->name }}</b> Son/Daughter of Smt. <b> {{ $student->parents[1]->parentInfo->name or ''}}</b>  and Sh. <b>{{ $student->parents[0]->parentInfo->name or ''}}</b> has passed <b>{{ $student->classes->name or ''}}</b> Examination vide Roll No.<b>{{ $student->roll_no }}</b>  held in {{ date('d-m-Y') }} as a regular student of this institution His/her Date of Birth as per our school record is <b>{{ date('d-M-Y',strtotime($student->dob)) }}</b></p>
   <p style="padding-top: 20px;padding-left:10px">To the best of my knowledge He/she bears a good moral character He/she participated in the following co-curricular activities during his/her period of study in this school.</p>
   <p style="padding-left:100px">__________________</p>
   <p style="padding-left:100px">__________________</p>
   <p style="padding-left:100px">__________________</p>
   <p style="padding-left:100px;padding-top: 100">Principal</p>
   
 </body>
 </html>
 