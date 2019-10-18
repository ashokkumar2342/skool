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
    <h3><u><b>TO Whomsoever It May Concern</b></u></h3>
  </div>
   <p style="padding-left:10px;padding-top: 20px">this is to certify that Master/Miss <b>{{ $student->name }}</b> Son/Daughter of Smt.<b>{{ $studentM->m_name }} </b> and Sh. <b>{{ $student->f_name }}</b> Adm. No. <b>{{ $student->admission_no }}</b> is a bonafide student  of Clss 8th of this school His/Her date of birth as per our school record is <b>{{ date('d-M-Y',strtotime($student->dob)) }}</b>
    (Eigtheenth November Two Thousand Six). Guardian has submitted D.O.B Certificate (issued By Municipal Committed) in our school as a proof of it.</p>
   <p style="padding-top: 20px;padding-left:10px">He/She bears a good moral character.</p>
   <p style="padding-left:100px;padding-top:150px">Principal</p>
    
    
   
 </body>
 </html>
 