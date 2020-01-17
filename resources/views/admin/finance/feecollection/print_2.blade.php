 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml">
 <head><title>

 </title>
     <style type="text/css">
         .style1
         {
             width: 184px;
             font-weight: bold;
             font-size: small;
             font-family: "Arial";
         }
         .style4
         {
             width: 891px;
         }
     </style>
 </head>
 <body>
 <br> 
 <div>
   
     
     <div id="p1" style="font-family:Arial;">    
         <center>
            @php
                $net_amount =0.0;

            @endphp
            @foreach ($students as $student)  
            @foreach ($student as $student)
             <table>
                 <tr>
                     <td>
                         <div style="width: 450px;">
                             <table width="100%">
                                 <tr>
                                     <td colspan="4">
                                         <div style="width: 450px;" align="center">
                                             <img src="{{asset('images/logo.png')}}" alt="" height="50px" /><br />
                                             <span id="lblheader" style="font-family:Arial;font-size:Small;">{!! $feedefaultvalue->rec_header !!} 
                                                <br/>
                                             </span>
                                             <hr />
                                         </div>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td align="left" style="font-weight: bold; font-size: small;">
                                         <span id="lblRegistraionFees0" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Receipt No : </span>
                                     </td>
                                     <td class="style4">
                                         <span id="lblReceiptNo" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">{{ $student->rec_no }}</span>
                                     </td>
                                     <td align="left" style="font-weight: bold; font-size: small;">
                                         <span id="lblRegistraionFees4" style="font-family:Arial;font-size:Small;text-align: left;">Date :</span>
                                     </td>
                                     <td>
                                         <span id="lblReceiptDate" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">{{ date('d-m-Y',strtotime($student->rec_date)) }}</span>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td align="left" style="font-weight: bold; font-size: small;">
                                         <span id="lblRegistraionFees1" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Registration No : </span>
                                     </td>
                                     <td class="style4">
                                         <span id="lblStudentId" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">{{ $student->registration_no }}</span>
                                     </td>
                                     <td align="left" style="font-weight: bold; font-size: small;">
                                         <span id="lblRegistraionFees5" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Class : </span>
                                     </td>
                                     <td>
                                         <span id="lblClass" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">{{ $student->class_name }}</span>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td align="left" style="font-weight: bold; font-size: small;">
                                         <span id="lblStudentName" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Name: </span>
                                     </td>
                                     <td>
                                         <span id="lblName" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">{{ $student->stu_name }}</span>
                                     </td>
                                     <td align="left" style="font-weight: bold; font-size: small;">
                                         <span id="lblRegistraionFees6" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Section:</span>
                                     </td>
                                     <td>
                                         <span id="lblSection" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;"></span>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td align="left" style="font-weight: bold; font-size: small;">
                                         <span id="lblRegistraionFees3" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Father's Name:</span>
                                     </td>
                                     <td>
                                         <span id="lblFather" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">{{ $student->f_name }}</span>
                                     </td>
                                     <td class="style1">
                                         
                                         <span id="lblRegistraionFees7" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Mother's Name:</span>
                                     </td>
                                     <td>
                                         
                                         <span id="lblMother1" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;"></span>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td class="style1">
                                        
                                        <span id="lblRegistraionFees7" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Period:</span>
                                    </td>
                                    <td>

                                        <span id="lblMother1" style="display:inline-block;font-family:Arial;font-size:Small;text-align: left;">{{ $student->rec_period }}</span> 
                                    </td>
                                     <td class="style1">
                                         
                                         <span id="lblRegistraionFees7" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Mobile No:</span>
                                     </td>
                                     <td>
                                         
                                         <span id="lblMother1" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;"></span>
                                     </td>
                                 </tr>
                                 <tr >
                                      <td class="style1">
                                         
                                         <span id="lblRegistraionFees7" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Address:</span>
                                     </td>
                                     <td colspan="2">

                                         <span id="lblMother1" style="display:inline-block;font-family:Arial;font-size:Small;text-align: left;"></span> 
                                     </td>
                                 </tr>
                             </table>
                         </div>
                         <div style="width: 450px; margin-top: 10px;">
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
                                 @foreach ($feeDetailss[0] as $feeDetail) 
                                  
                                      <tr>
                                          <td align="left" style="font-weight: bold; font-size: small;">
                                              <span id="lblRegistraionFees" style="display:inline-block;font-family:Arial;font-size:Small;text-align: left;">{{ $feeDetail->name}}  </span>
                                          </td>
                                          <td align="right" style="font-size: small;">
                                              <span id="lblRegFees" style="font-family:Arial;font-size:Small;">{{ $feeDetail->fee_amt}}  </span>
                                          </td>
                                      </tr>
                                       
                                 @endforeach
                                
                               {{--   @if ($studentFee->discountType->id!=1)
                                   <tr>
                                       <td align="Right" style="font-weight: bold; font-size: small;">
                                           <span id="lblSSDiscount2" style="display:inline-block;font-family:Arial;font-size:Small;text-align: left;"> {{ $studentFee->discountType->name or '' }} Discount (-)</span>
                                       </td>
                                       <td align="right">
                                           <span id="lblOtherDiscount" style="font-family:Arial;font-size:Small;">{{$studentFee->discount}}</span>
                                       </td>
                                   </tr>   
                                 @endif --}}
                                 <tr>
                                     <td  style="font-weight: bold; font-size: small;">
                                         <span id="lblSSDiscount2" style="display:inline-block;font-family:Arial;font-size:Small;text-align: left;">  Net Amount</span>
                                     </td>
                                     <td  align="right">
                                         <span id="lblOtherDiscount" style="font-family:Arial;font-size:Small;">{{ $student->rec_amt  }}</span>
                                     </td>
                                 </tr>
                            
                                  
                                 <tr>
                                     <td  style="font-weight: bold; font-size: small;">
                                         <span id="lblSSDiscount3" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Amount Deposit  </span>
                                     </td>
                                     <td align="right" style="border-style: solid none Solid none; font-size: small;">
                                         <span id="lblOtherDiscount" style="font-family:Arial;font-size:Small;">{{ $student->amt_deposit }}</span>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td  style="font-weight: bold; font-size: small;">
                                         <span id="lblSSDiscount3" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Balance Amount  </span>
                                     </td>
                                     <td align="right" style="font-size: small;">
                                         <span id="lblOtherDiscount" style="font-family:Arial;font-size:Small;"></span>
                                     </td>
                                 </tr>
                                 
                             </table>
                             <hr />
                         </div>
                         <div style="width: 450px;" align="Left">
                             <table width="100%">
                                 <tr>
                                     <td>
                                         <span id="Label1" style="font-weight: bold;
                                             font-size: small;">Rupees (In Words):</span>
                                         <span id="lblRupee"  style="font-size: small;"> {{ $student->amt_in_words }}</span>
                                     </td>
                                 </tr>  
                                 {{-- <tr>
                                     <td>
                                         <span id="Label1" style="font-weight: bold;
                                             font-size: small;">Payment Mode: </span>
                                         <span  style="font-size: small;">{{ $studentFee->paymentMode->name or '' }} </span>
                                     </td>
                                 </tr>
                                 @if ( $studentFee->payment_mode==2)
                                         <tr>
                                     <td>
                                         <span id="Label2" style="font-weight: bold;
                                             font-size: small;">Cheque no:</span>
                                         <span id="lblChequeNo" style="font-size: small;">{{($studentFee->cheque_no)?$studentFee->cheque_no:'_______'}}</span>
                                         &nbsp;<span id="Label3" style="font-weight: bold;
                                             font-size: small;">Date:</span>
                                         <span id="lblbankName" style="font-size: small;">{{($studentFee->cheque_date)?$studentFee->cheque_date:'________'}}</span>
                                         
                                         &nbsp;<span id="Label4" style="font-weight: bold;
                                             font-size: small;">Bank Name: </span>
                                              <span id="lblChequeDate" style="font-size: small;">{{($studentFee->bank_name)?$studentFee->bank_name:'__/__/____'}}</span>
                                         
                                     </td>
                                 </tr>  
                                 @endif --}}
                           
                                 <tr>
                                     <td align="left">
                                        <span id="Label2" style="font-weight: bold;
                                             font-size: small;">Note: {!! $feedefaultvalue->rec_note !!} </span> 
                                         
                                     </td>
                                 </tr>
                                 <tr>
                                     <td align="right">
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
         <td>
            @endforeach
            <div class="page-break">
                
            </div>
            @endforeach
                         {{--  --}}
             </table>
         </center>
     
 </div>


 </body>
 </html>


