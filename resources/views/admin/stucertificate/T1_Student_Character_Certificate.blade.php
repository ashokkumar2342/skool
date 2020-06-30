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
<body> 
@include('schoolDetails.logo_header')
<div class="row" style="margin-top: -20px">
<div class="panel panel">
  <div class="panel-heading text-center"><u><h3><b>CHARACTER CERTIFICATE</b></h3></u></div> 
   <div class="col-lg-12">
    <p style="padding-left:10px">this is to certify that Master/Miss <b>{{ $student->name }}</b> Son/Daughter of Smt. <b> {{ $student->parents[1]->parentInfo->name or ''}}</b>  and Sh. <b>{{ $student->parents[0]->parentInfo->name or ''}}</b> has passed <b>{{ $CharCertIssueDetail->classes->name or '' }}</b> Examination vide Roll No.<b>{{ $CharCertIssueDetail->ExamRollNo or '' }}</b>  held in {{ date('d-m-Y') }} as a regular student of this institution His/her Date of Birth as per our school record is <b>{{ date('d-m-Y',strtotime($CharCertIssueDetail->DOB)) }}</b></p>
   <p style="padding-top: 20px;padding-left:10px">To the best of my knowledge He/she bears a good moral character He/she participated in the following co-curricular activities during his/her period of study in this school.</p>
   <p style="padding-left:100px">__________________</p>
   <p style="padding-left:100px">__________________</p>
   <p style="padding-left:100px">__________________</p>
   <p style="padding-left:100px;padding-top: 100">Principal</p>  
  </div>
  </div>  
 </body> 
 </html>