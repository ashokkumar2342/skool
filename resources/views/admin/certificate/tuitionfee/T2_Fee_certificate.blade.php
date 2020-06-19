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
        line-height: 15px;
        width: 200px;
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
      .underlin5{ 
        border-bottom: 1px solid black;
        line-height: 25px;
        width: 500px;
      }
      .underlin6{ 
        border-bottom: 1px solid black;
        line-height: 25px;
        width: 105px;
      }
      
     p{
      font-size: 18px; 
      text-align: justify;

     }
     table{
      font-size: 18px; 
      font:bold; 
      

     }
    
    </style>
    @include('admin.include.boostrap')
</head> 
<body > 
@include('schoolDetails.logo_header')
<div class="row" style="margin-top: -20px">
<div class="panel panel">
  <div class="panel-heading text-center"><u><h3><b>FEE CERTIFICATE</b></h3></u></div> 
   <div class="col-lg-12">
    <p>Certified that Master/Miss <b><span class="underlin text-center"> {{ $student->name }} </span></b>Son/Daughter of  
    (Mother's Name) Smt. <b><span class="underlin text-center"> {{ $student->parents[1]->parentInfo->name or ''}} </span></b> & (Father's Name) 
     Sh. <b><span class="underlin3 text-center"> {{ $student->parents[0]->parentInfo->name or ''}} </span></b> Admission No.<b><span class="underlin2 text-center"> {{ $student->admission_no}} </span></b> 
     <p>Has been a bona fide student of class <b><span class="underlin2 text-center"> {{ $student->classes->name or ''}} </span></b>  of this school.</p>  
     </p>
     </p> 
     <p style="margin-top: 30px">The guardian has paid a sum of Rs. <b><span class="underlin2 text-center">1234</span></b><br>
     <b>(<span class="underlin5 text-center"> One Thousand Three Hundred Forty Only </span>)</b><br> towards the fee of his/her ward from<b><span class="underlin6 text-center">April-2020</span></b> To <b><span class="underlin6 text-center">March-2020</span></b> as per detail below:<b>-</b> 
      <table style="height: 122px; width: 471px;" class="text-center">
      <tbody>
      <tr>
      <td style="width: 329px;">Annual Charge</td>
      <td style="width: 126px;" class="text-right">1234567.00</td>
      </tr>
      <tr>
      <td style="width: 329px;">Annual Charge</td>
      <td style="width: 126px;" class="text-right">1234567.00</td>
      </tr>
      <tr>
      <td style="width: 329px;">Annual Charge</td>
      <td style="width: 126px;" class="text-right">4567.00</td>
      </tr>
      <tr>
      <td style="width: 329px;">Annual Charge</td>
      <td style="width: 126px;" class="text-right">1234567.00</td>
      </tr>
      <tr>
      <td style="width: 329px;">Annual Charge</td>
      <td style="width: 126px;" class="text-right">1234567.00</td>
      </tr>
      <tr>
      <td style="width: 329px;">Annual Charge</td>
      <td style="width: 126px;" class="text-right">567.00</td>
      </tr>
      </tbody>
      </table>
     <p style="margin-top: 30px">The School academic session is from <b>April</b> to <b>March</b></p>
   </p>
  </div> 
  <div class="col-lg-10"> 
  <p style="float: right;padding-top: 400">Principal</p>  
  </div>
  </div>  
 </body> 
 </html>