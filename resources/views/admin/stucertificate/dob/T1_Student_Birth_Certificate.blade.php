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
      .underlin{ 
        border-bottom: 1px solid black;
        line-height: 25px;
        width: 350px;
      }
      .underlin2{ 
        border-bottom: 1px solid black;
        line-height: 25px;
        width: 150px;
      }
      .underlin3{ 
        border-bottom: 1px solid black;
        line-height: 25px;
        width: 300px;
      }
      .underlin4{ 
        border-bottom: 1px solid black;
        line-height: 25px;
        width: 200px;
      }
      
     p{
      font-size: 18px;
      padding-bottom: 15px; 
      text-align: justify;

     }
    
    </style>
    @include('admin.include.boostrap')
</head> 
<body > 
@include('schoolDetails.logo_header')
<div class="row" style="margin-top: -20px">
<div class="panel panel">
  <div class="panel-heading text-center"><u><h3><b>TO Whomsoever It May Concern</b></h3></u></div> 
   <div class="col-lg-12">
    <p>Certified that Master/Miss <b><span class="underlin text-center"> {{ $student->name }} </span></b>Son/Daughter of  
    (Mother's Name) Smt. <b><span class="underlin text-center"> {{ $student->parents[1]->parentInfo->name or ''}} </span></b> & (Father's Name) 
     Sh. <b><span class="underlin3 text-center"> {{ $student->parents[0]->parentInfo->name or ''}}</span></b> Admission No. <b><span class="underlin4 text-center">{{ $CharCertIssueDetail->AdmissionNo }} </span></b>  
     <p>is a bonafide student  of Clss <b>{{ $student->classes->name or '' }}</b> of this school His/Her date of birth as per our school record is 
     <b><span class="underlin2 text-center"> {{ date('d-M-Y',strtotime($CharCertIssueDetail->DOB)) }} </span></b>(Eigtheenth November Two Thousand Six). Guardian has submitted D.O.B Certificate (issued By Municipal Committed) in our school as a proof of it.
     </p>
   </p>  
   
      <p>To the best of my  knowledge  he/she bear a <b><span class="underlin2 text-center"> {{ $CharCertIssueDetail->CharacterType }}  </span></b>  moral character 
     He/She participated in the following co-curricular activities during his/her period of study in this school.
      </p> 
  </div> 
  <div class="col-lg-10"> 
  <p style="float: right;padding-top: 400">Principal</p>  
  </div>
  </div>  
 </body> 
 </html>