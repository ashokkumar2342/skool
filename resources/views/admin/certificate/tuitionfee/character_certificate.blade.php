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
    <h3><u><b>CHARACTER CERTIFICATE</b></u></h3>
  </div>
   <p style="padding-left:10px">this is to certify that Master/Miss <b>{{ $student->name }}</b> Son/Daughter of Smt. <b> </b>  and Sh. <b>{{ $student->f_name }}</b> has passed <b>{{ $student->classes->name or ''}}</b> Examination vide Roll No.<b>{{ $student->roll_no }}</b>  held in {{ date('d-m-Y') }} as a regular student of this institution His/her Date of Birth as per our school record is <b>{{ date('d-M-Y',strtotime($student->dob)) }}</b></p>
   <p style="padding-top: 20px;padding-left:10px">To the best of my knowledge He/she bears a good moral character He/she participated in the following co-curricular activities during his/her period of study in this school.</p>
   <p style="padding-left:100px">__________________</p>
   <p style="padding-left:100px">__________________</p>
   <p style="padding-left:100px">__________________</p>
   <p style="padding-left:100px;padding-top: 100">Principal</p>
   
 </body>
 </html>
 