  <!DOCTYPE html>
 <html>
 <head>
   <title>tes</title>
 </head>
 <style>
   p{
    font-size: 14px;
    letter-spacing: 1px;
    -spacing: 2px;
   }
 </style>
 @include('admin.include.boostrap')
 <body>
        @include('schoolDetails.logo_header')
 <div align="center" style="padding-top: 30px">
    <h3><u><b>TO Whomsoever It May Concern</b></u></h3>
  </div>
   <p style="padding-left:10px;padding-top: 20px">this is to certify that Master/Miss <b>{{ $student->name }}</b> Son/Daughter of Smt.<b>{{ $student->parents[1]->parentInfo->name or ''}}</b> and Sh. <b>{{ $student->parents[0]->parentInfo->name or ''}}</b> Adm. No. <b>{{ $student->admission_no }}</b> is a bonafide student  of Clss 8th of this school His/Her date of birth as per our school record is <b>{{ date('d-M-Y',strtotime($student->dob)) }}</b>
    (Eigtheenth November Two Thousand Six). Guardian has submitted D.O.B Certificate (issued By Municipal Committed) in our school as a proof of it.</p>
   <p style="padding-top: 20px;padding-left:10px">He/She bears a good moral character.</p>
   <p style="padding-left:100px;padding-top:150px">Principal</p>
    
    
   
 </body>
 </html>
 