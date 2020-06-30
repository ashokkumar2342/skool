 <!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html/jpg/png; charset=utf-8"/>
<head>
    <style> 
        .pagenum:before {
            content: counter(page);
        }
        .page_break{
            page-break-before:always;  
        }
        .underlin2{ 
        border-bottom: 1px solid black;
        line-height: 25px;
        width: 150px;
      } 
    </style>
    @include('admin.include.boostrap')
</head> 
<body > 
@include('schoolDetails.logo_header')
<div class="col-lg-12 text-center" style="margin-top: -40px">
<div class="panel panel">
  <div class="panel-heading text-center"><u><h3><b>SCHOOL LEAVING CERTIFICATE</b></h3></u></div>
  <table style="width: 597px;" class="">
<tbody>
<tr>
<td style="width: 40px;">Sr.No.</td>
<td style="width: 244px;"><b>{{$SLCIssueDetails->SlCSrNo }}</b></td>
<td style="width: 147px;"></td> 
<td style="width: 147px;">&nbsp;Old Admission No.</td>
<td style="width: 140px;"><b>{{$SLCIssueDetails->OldAdmissionNo }}</b></td>
</tr>
</tbody>
</table>
<table style="width: 597px;">
<tbody>
<tr>
<td style="width: 289px;"></td>
<td style="width: 147px;"></td>
<td style="width: 130px;">New Addmission No.</td>
<td style="width: 140px;"><b>&nbsp;&nbsp;&nbsp;{{ $student->admission_no }}</b></td>
</tr>
</tbody>
</table>
<table style="width: 370px;">
<tbody>
<tr>
<td style="width: 28px;">01.</td>
<td style="width: 151px;">Name of the Pupil : -</td>
<td style="width: 169px;"><b>{{ $student->name }}</b></td>
</tr>
<tr>
<td style="width: 28px;">02.</td>
<td style="width: 151px;">Mother's Name : -</td>
<td style="width: 169px;"><b>{{ $student->parents[1]->parentInfo->name or ''}}</b></td>
</tr>
<tr>
<td style="width: 28px;">03.</td>
<td style="width: 151px;">Father's Name : -</td>
<td style="width: 169px;"><b>{{ $student->parents[0]->parentInfo->name or ''}}</b></td>
</tr>
<tr>
<td style="width: 28px;">04.</td>
<td style="width: 151px;">Nationnality</td>
<td style="width: 169px;"><b>INDIAN</b></td>
</tr>
</tbody>
</table>
</table>
<table style="width: 600px;">
<tbody>
<tr>
<td style="width: 28px;">05.</td>
<td style="width: 400px;">Weather the candidate belongs to Schedule or tribe : -</td>
<td ><b>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</b></td>
</tr>
</tbody>
<table style="width: 720px;">
<tbody>
<tr>
<td style="width: 28px;">06.</td>
<td style="">Date of First Admission in the school (In figures) &nbsp; <b>{{date('d-M-Y',strtotime($SLCIssueDetails->DateofAdmission)) }}</b> &nbsp;Class <b>{{$SLCIssueDetails->ClassAdmitteds->name or '' }}</b> to which admitted </td>
</tr>
</tbody>
</table>
</table>
<table width="710">
<tbody>
<tr>
<td style="width: 28px;">07.</td>
<td>Date of Birth (In {{$SLCIssueDetails->Categorys->name or '' }}) according to Admission Register (In Figures)&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>{{date('d-M-Y',strtotime($SLCIssueDetails->DOB)) }}</b> &nbsp; &nbsp;</td>
</tr>
</tbody>
</table>
<table width="710">
<tbody>
<tr>
<td style="width: 28px;"></td>
<td style="height: 12px">(in Words):- <b>Second September Two Thousend</b></td>
</tr>
</tbody>
</table>
<table style="width: 450px;">
<tbody>
<tr>
<td style="width: 28px;">08.</td>
<td style="width: 481px;">Class in which the student last studies (In figures) : -&nbsp;&nbsp;</td>
<td style="width: 42px;"><b>{{$SLCIssueDetails->LastClass->name or '' }}</b></td>
</tr>
</tbody>
</table>
<table style="width: 450px;">
<tbody>
<tr>
<td style="width: 28px;">09.</td>
<td style="width: 481px;">SchoolBoard Annual Examinationlast taken with Result  : -&nbsp;&nbsp;</td>
<td style="width: 102px;"><b>{{$SLCIssueDetails->LastResult }}</b></td>
</tr>
</tbody>
</table>
<table style="width: 600px;margin-top: 20px">
<tbody>
<tr>
<td style="width: 28px;">10.</td>
<td style="width: 481px;">Whether failed, if so once/twice in the same class</td> 
</tr>
</tbody>
</table>
<table style="width: 600px;">
<tbody>
<tr>
<td style="width: 28px;">11.</td>
<td style="width: 481px;">Subject Studied :- 
  @foreach ($Slcsubjects as $Slcsubject)
  <b>{{ $Slcsubject->subjects->name or '' }},</b>
  @endforeach
</td> 
</tr>
</tbody>
</table>
<table style="width: 450px;margin-top: 20px">
<tbody>
<tr>
<td style="width: 28px;">12.</td>
<td style="width: 481px;">Whether qualified for promotion of the higher class : - &nbsp;&nbsp;</td>
<td style="width: 42px;"><b>{{$SLCIssueDetails->ClassQualifieds->name or '' }}</b></td>
</tr>
</tbody>
</table>
<table style="width: 450px;">
<tbody>
<tr>
<td style="width: 28px;"></td> 
<td style="width: 481px;">If so, to which class (in figure): -&nbsp;&nbsp;In Words</td>
<td style="width: 42px; height: 12px"><b> {{$SLCIssueDetails->ClassQualifiedWords }}</b></td>
</tr>
</tbody>
</table>
<table style="width: 450px;margin-top: 20px">
<tbody>
<tr>
<td style="width: 28px;">13.</td>
<td style="width: 481px;">Month up to which the Pupil has paid School dues: - &nbsp;&nbsp;</td>
<td style="width: 200px;"><b>{{ date('M-Y',strtotime($SLCIssueDetails->FeePaidUpto)) }}</b></td>
</tr>
</tbody>
</table>
<table style="width: 450px;">
<tbody>
<tr>
<td style="width: 28px;">14.</td>
<td style="width: 481px;">Any Fee Concession availed of, If so, the nature of such concession : - &nbsp;&nbsp;</td>
<td style="width: 200px;"><b>{{$SLCIssueDetails->AnyFeeConcession }}</b></td>
</tr>
</tbody>
</table>
<table style="width: 450px;">
<tbody>
<tr>
<td style="width: 28px;">15.</td>
<td style="width: 481px;">Date of joining the class last studies : - &nbsp;&nbsp;</td>
<td style="width: 200px;"><b>{{date('d-M-Y',strtotime($SLCIssueDetails->DateOfJoinLastClass)) }}</b></td>
</tr>
</tbody>
</table>
<table style="width: 450px;">
<tbody>
<tr>
<td style="width: 28px;">16.</td>
<td style="width: 481px;">Pupils Attendance during the session : - &nbsp;&nbsp;</td>
<td style="width: 200px;"><b>{{$SLCIssueDetails->Attendance }}</b></td>
</tr>
</tbody>
</table>
<table style="width: 450px;">
<tbody>
<tr>
<td style="width: 28px;">17.</td>
<td style="width: 481px;">Whether NCC Cadet/Boy Scout/Girl guide (Detail may e given) : - &nbsp;&nbsp;</td>
<td style="width: 200px;"><b>{{$SLCIssueDetails->NCCDetail }}</b></td>
</tr>
</tbody>
</table>
<table style="width: 450px;">
<tbody>
<tr>
<td style="width: 28px;">17.</td>
<td style="width: 481px;">Participation in Co-Curricular Activities : - &nbsp;&nbsp;</td>
<td style="width: 200px;"><b>{{$SLCIssueDetails->ExtraActivity }}</b></td>
</tr>
</tbody>
</table>
<table style="width: 470px;margin-top: 10px">
<tbody>
<tr>
<td style="width: 28px;">19.</td>
<td style="width: 251px;">General Conduct : -</td>
<td style="width: 169px;"><b>{{$SLCIssueDetails->CharacterType }}</b></td>
</tr>
<tr>
<td style="width: 28px;">20.</td>
<td style="width: 251px;">Date of application for certificate : -</td>
<td style="width: 169px;"><b>{{date('d-M-Y',strtotime($SLCIssueDetails->ApplicationDate)) }}</b></td>
</tr>
<tr>
<td style="width: 28px;">21.</td>
<td style="width: 251px;">Date of issue of certificate : -</td>
<td style="width: 169px;"><b>{{date('d-M-Y',strtotime($SLCIssueDetails->IssueDate)) }}</b></td>
</tr>
<tr>
<td style="width: 28px;">22.</td>
<td style="width: 251px;">Reasons for leaving the school</td>
<td style="width: 169px;"><b>{{$SLCIssueDetails->ReasonLeaving }}</b></td>
</tr>
<tr>
<td style="width: 28px;">23.</td>
<td style="width: 251px;">Any other Remarks</td>
<td style="width: 169px;"><b>{{$SLCIssueDetails->Remarks }}</b></td>
</tr>
</tbody>
</table>
<div style="margin-top: 40px">
<label>Prepared By :- _______________</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label>Checked By :- _______________</label><br><br> 
 <label>Principal's Signature :- _______________</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label>Counter Signature :- _______________</label> 
 </div>    
  </div>  
  </div>
 </body> 
 </html>