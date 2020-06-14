<!DOCTYPE html>
  <html>
  <head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title></title>
  	<link rel="stylesheet" href="">
  	<style type="text/css">
  	 
  		    .page{
  		      			margin-left: 30px;
  		      			 
  		      		}
  		 

  	</style>
  </head>
  <body class="page">
    @include('schoolDetails.logo_header')
  	    <div id="p1" style="font-family:Arial;text-align:center">    
  	        <center>
  	            @php
  	                $net_amount =0.0;
  	            @endphp 
  	            @foreach ($student as $key=>$student)
  	            <table align="center">
  	            	   	    <tr>
  	            	   	        <td>
  	            	   	            <div style="width: 600px;">
  	            	   	                <table width="100%">
  	            	   	                    <tr>
  	            	   	                        <td colspan="4">
  	            	   	                            <div style="width: 600px;" align="center" > 
  	            	   	                                <span id="lblheader" style="font-family:Arial;font-size:20;">{!! $feedefaultvalue->rec_header !!} </span>
  	            	   	                                <hr />
  	            	   	                            </div>
  	            	   	                        </td>
  	            	   	                    </tr>
  	            	   	                    <tr>
  	            	   	                        <td align="left" style="font-weight: bold; font-size: small;">
  	            	   	                            <span id="lblRegistraionFees0" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Receipt No : </span>
  	            	   	                        </td>
  	            	   	                        <td class="style4">
  	            	   	                            <span id="lblReceiptNo" style="font-size:Small;">{{ $student->rec_no }}</span>
  	            	   	                        </td>
  	            	   	                        <td align="left" style="font-weight: bold; font-size: small;">
  	            	   	                            <span id="lblRegistraionFees4" style="font-family:Arial;font-size:Small;text-align: left;">Date :</span>
  	            	   	                        </td>
  	            	   	                        <td>
  	            	   	                            <span id="lblReceiptDate" style="font-size:Small;">{{ date('d-m-Y',strtotime($student->rec_date)) }}</span>
  	            	   	                        </td>
  	            	   	                    </tr>
  	            	   	                    <tr>
  	            	   	                        <td align="left" style="font-weight: bold; font-size: small;">
  	            	   	                            <span id="lblRegistraionFees1" style="display:inline-block;font-family:Arial;font-size:Small;width:130px;text-align: left;">Registration No : </span>
  	            	   	                        </td>
  	            	   	                        <td class="style4">
  	            	   	                            <span id="lblStudentId" style="font-size:Small;">{{ $student->registration_no }}</span>
  	            	   	                        </td>
  	            	   	                        <td align="left" style="font-weight: bold; font-size: small;">
  	            	   	                            <span id="lblRegistraionFees5" style="display:inline-block;font-family:Arial;font-size:Small;width:130px;text-align: left;">Class : </span>
  	            	   	                        </td>
  	            	   	                        <td>
  	            	   	                            <span id="lblClass" style="font-size:Small;">{{ $student->class_name }}</span>
  	            	   	                        </td>
  	            	   	                    </tr>
  	            	   	                    <tr>
  	            	   	                        <td align="left" style="font-weight: bold; font-size: small;">
  	            	   	                            <span id="lblStudentName" style="display:inline-block;font-family:Arial;font-size:Small;width:180px;text-align: left;">Name: </span>
  	            	   	                        </td>
  	            	   	                        <td>
  	            	   	                            <span id="lblName" style="font-size:Small;">{{ $student->stu_name }} </span>
  	            	   	                        </td>
  	            	   	                        <td class="style1">
  	            	   	                            
  	            	   	                            <span id="lblRegistraionFees7" style="font-weight: bold; display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Mobile No.:</span>
  	            	   	                        </td>
  	            	   	                        <td>
  	            	   	                            
  	            	   	                            <span id="lblMother1" style="font-size:Small;">4444444444</span>
  	            	   	                        </td>
  	            	   	                        
  	            	   	                    </tr>
  	            	   	                    <tr>
  	            	   	                        <td align="left" style="font-weight: bold; font-size: small;">
  	            	   	                            <span id="lblRegistraionFees3" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Father's Name:</span>
  	            	   	                        </td>
  	            	   	                        <td>
  	            	   	                            <span id="lblFather" style="font-size:Small;">{{ $student->f_name }}</span>
  	            	   	                        </td>
  	            	   	                         
  	            	   	                        <td class="style1">
  	            	   	                            
  	            	   	                            <span id="lblRegistraionFees7" style="font-weight: bold; display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Period:</span>
  	            	   	                        </td>
  	            	   	                        <td>
  	            	   	                            
  	            	   	                            <span id="lblMother1" style="font-size:Small;">{{ $student->rec_period }}</span>
  	            	   	                        </td>
  	            	   	                    </tr>
  	            	   	                </table>
  	            	   	            </div>
  	            	   	            <div style="width: 600px; margin-top: 10px;">
  	            	   	                <table width="100%" cellpadding="1">
  	            	   	                    <tr>
  	            	   	                        <td align="left" style="border-style: solid none solid none; font-weight: bold; font-size: small;">
  	            	   	                            Particulars
  	            	   	                        </td>
  	            	   	                        <td align="right" style="border-style: solid none solid none; font-weight: bold;
  	            	   	                            font-size: small;">
  	            	   	                            Amount
  	            	   	                        </td>
  	            	   	                    </tr>
  	            	   	                  
  	            	   	                    @foreach ($feeDetails as $feeDetail) 
  	            	   	                     
  	            	   	                         <tr>
  	            	   	                             <td align="left" style="font-weight: bold; font-size: small;">
  	            	   	                                 <span id="lblRegistraionFees" style="display:inline-block;font-family:Arial;font-size:Small;text-align: left;">{{ $feeDetail->name}}  </span>
  	            	   	                             </td>
  	            	   	                             <td align="right" style="font-size: small;">
  	            	   	                                 <span id="lblRegFees" style="font-family:Arial;font-size:Small;">{{ $feeDetail->fee_amt}}  </span>
  	            	   	                             </td>
  	            	   	                         </tr>
  	            	   	                          
  	            	   	                    @endforeach
  	            	   	                    
  	            	   	                    <tr>
  	            	   	                        <td  style="font-weight: bold; font-size: small;">
  	            	   	                            <span id="lblSSDiscount3" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Net Amount</span>
  	            	   	                        </td>
  	            	   	                        <td align="right">
  	            	   	                            <span id="lblNetPaid" style="font-family:Arial;font-size:Small;">{{ $student->rec_amt  }}</span>
  	            	   	                        </td>
  	            	   	                    </tr>
  	            	   	                    <tr>
  	            	   	                        <td  style="font-weight: bold; font-size: small;">
  	            	   	                            <span id="lblSSDiscount3" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Amount Deposit </span>
  	            	   	                        </td>
  	            	   	                        <td align="right" style="border-style: solid none Solid none; font-size: small;">
  	            	   	                            <span id="lblNetPaid" style="font-family:Arial;font-size:Small;">{{ $student->amt_deposit }}</span>
  	            	   	                        </td>
  	            	   	                    </tr>
  	            	   	                    @php
  	            	   	                    	$balance =$student->rec_amt - $student->amt_deposit;
  	            	   	                    @endphp
  	            	   	                     @if ($balance !=0)
  	            	   	                     	<tr>  
  	            	   	                     	   <td  style="font-weight: bold; font-size: small;">
  	            	   	                     	        <span id="lblLessLbl" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Balance Amount </span>
  	            	   	                     	    </td>
  	            	   	                     	   
  	            	   	                     	    
  	            	   	                     	    <td align="right" style=" font-size: small;">
  	            	   	                     	        <span id="lblLess" style="font-family:Arial;font-size:Small;">{{ $balance  }}</span>
  	            	   	                     	    </td>
  	            	   	                     	</tr> 
  	            	   	                     @endif
  	            	   	                     
  	            	   	                </table>
  	            	   	                <hr />
  	            	   	            </div>
  	            	   	            <div style="width: 600px;" align="Left">
  	            	   	                <table width="100%"> 
  	            	   	                    <tr>
  	            	   	                        <td>
  	            	   	                            <span id="Label1" style="font-weight: bold;
  	            	   	                                font-size: small;">Rupees (In Words):</span>
  	            	   	                            <span id="lblRupee" style="font-size: small;">{{ $student->amt_in_words }}</span>
  	            	   	                        </td>
  	            	   	                    </tr> 
  	            	   	                    <tr>
  	            	   	                        <td>
  	            	   	                            <span id="Label1" style="font-weight: bold;
  	            	   	                                font-size: small;">Payment Details</span> 
  	            	   	                        </td>
  	            	   	                        <td align="right" style=" font-size: small;">
  	            	   	                            <span id="lblLess" style="font-family:Arial;font-size:Small;"></span>
  	            	   	                        </td>
  	            	   	                      
  	            	   	                    </tr>
  	            	   	                </table>
  	            	   	                <table width="100%" style=" font-size: small;">
  	            	   	                    <tr>
  	            	   	                        <th align="left" width="150px">
  	            	   	                            Payment Mode 
  	            	   	                        </th>
  	            	   	                        <th align="left">
  	            	   	                            Cheque No. 
  	            	   	                        </th>
  	            	   	                        <th align="left">
  	            	   	                            Bank Name 
  	            	   	                        </th>
  	            	   	                        
  	            	   	                    </tr>  
  	            	   	                    @foreach ($payment_mode as $key=>$value) 
  	            	   	                    <tr>
  	            	   	                        <td>{{ $value->name }}</td>    	                         
  	            	   	                        <td>{{ $cheeque_no[$key] }}</td>
  	            	   	                        <td>{{ $bank_name[$key] }}</td> 
  	            	   	                    </tr>
  	            	   	                    @endforeach
  	            	   	                    <tr>
  	            	   	                        <td align="left" colspan="3">
  	            	   	                           <p><b>Note:</b> {!! $feedefaultvalue->rec_note !!} </p> 
  	            	   	                            
  	            	   	                        </td>
  	            	   	                    </tr>
  	            	   	                    <tr>
  	            	   	                        <td align="right" colspan="3">
  	            	   	                            <div style="margin-top: 30px;">
  	            	   	                                <span id="Label5" style="font-size: small;">Auth. Sign.</span>
  	            	   	                            </div>
  	            	   	                        </td>
  	            	   	                    </tr>
  	            	   	                </table>
  	            	   	            </div>
  	            	   	        </td>
  	            	   	        <td>
  	            	   	            <div style="width: 50px;">
  	            	   	            </div>
  	            	   	        </td>
  	            	   	       
  	            	   	    </tr>
  	            	   	</table>
  	            @endforeach
  	        </center>
  	    
  	</div>
  </body>
  </html>  
<div>
    
