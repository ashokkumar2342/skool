
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
            <table>
                <tr>
                    <td>
                        <div style="width: 450px;">
                            <table width="100%">
                                <tr>
                                    <td colspan="4">
                                        <div style="width: 450px;" align="center">
                                            <img src="" alt="" height="50px" /><br />
                                            <span id="lblheader" style="font-family:Arial;font-size:20;">Iskool, Jhajhar, Tele : +91-8397068001</br>Fee Receipt  Session : 2018-2019</span>
                                            <hr />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblRegistraionFees0" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Receipt No : </span>
                                    </td>
                                    <td class="style4">
                                        <span id="lblReceiptNo" style="font-size:Small;">{{ $cashbook->receipt_no }}</span>
                                    </td>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblRegistraionFees4" style="font-family:Arial;font-size:Small;text-align: left;">Date :</span>
                                    </td>
                                    <td>
                                        <span id="lblReceiptDate" style="font-size:Small;">{{ $cashbook->receipt_date }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblRegistraionFees1" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Student Id : </span>
                                    </td>
                                    <td class="style4">
                                        <span id="lblStudentId" style="font-size:Small;">{{ $cashbook->registration_no }}</span>
                                    </td>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblRegistraionFees5" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Class : </span>
                                    </td>
                                    <td>
                                        <span id="lblClass" style="font-size:Small;">{{ $cashbook->class }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblStudentName" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Name: </span>
                                    </td>
                                    <td>
                                        <span id="lblName" style="font-size:Small;">{{ $cashbook->name }}</span>
                                    </td>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblRegistraionFees6" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Section:</span>
                                    </td>
                                    <td>
                                        <span id="lblSection" style="font-size:Small;">Crystal</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblRegistraionFees3" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Father's Name:</span>
                                    </td>
                                    <td>
                                        <span id="lblFather" style="font-size:Small;">{{ $cashbook->father_name }}</span>
                                    </td>
                                    <td class="style1">
                                        
                                        <span id="lblRegistraionFees7" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Mother's Name:</span>
                                    </td>
                                    <td>
                                        
                                        <span id="lblMother1" style="font-size:Small;">KANCHAN</span>
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
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblRegistraionFees" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Registration Fee</span>
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblRegFees" style="font-family:Arial;font-size:Small;">0</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblAdmissionFee" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Admission Fee</span>
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblAdmissionFees" style="font-family:Arial;font-size:Small;">0</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblAdmissionFee" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Admission Form Fee</span>
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblAdmissionFees" style="font-family:Arial;font-size:Small;">0</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblDevelopmentCharges" style="display:inline-block;font-family:Arial;font-size:Small;width:220px;text-align: left;">Annual Development Charges</span>
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblAnnualCharges" style="font-family:Arial;font-size:Small;">0</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblCaution" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Caution Money</span>
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblCautionMoney" style="font-family:Arial;font-size:Small;">0</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        Tuition Fee
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblTutionFees" style="font-family:Arial;font-size:Small;">5970</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        Smart Class
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblSmartClass" style="font-family:Arial;font-size:Small;">750</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        SMS
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblSMS" style="font-size:Small;">240</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        Activity Charges
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblActivity" style="font-family:Arial;font-size:Small;">750</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        Transport Maintenance Charges
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblTransport" style="font-family:Arial;font-size:Small;">0</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblLateFeeFine" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;"></span>
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblFineAmt" style="font-family:Arial;font-size:Small;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                    </td>
                                    <td align="right" style="font-size: small;">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="Right" style="font-weight: bold; font-size: small;">
                                        <span id="lblSSDiscount1" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Payable Fee</span>
                                    </td>
                                    <td align="right" style="border-style: solid none none none; font-size: small;">
                                        <span id="lblPayableFees" style="font-family:Arial;font-size:Small;">7710</span>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td align="Right" style="font-weight: bold; font-size: small;">
                                        <span id="lblSSDiscount0" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;"></span>
                                    </td>
                                    <td align="right">
                                        <span id="lblPreviousBalance" style="font-family:Arial;font-size:Small;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="Right" style="font-weight: bold; font-size: small;">
                                        <span id="lblSSDiscount" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;"></span>
                                    </td>
                                    <td align="right">
                                        <span id="lblSiblingStaff" style="font-family:Arial;font-size:Small;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="Right" style="font-weight: bold; font-size: small;">
                                        <span id="lblSSDiscount2" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Discount (-)</span>
                                    </td>
                                    <td align="right">
                                        <span id="lblOtherDiscount" style="font-family:Arial;font-size:Small;">0</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="Right" style="font-weight: bold; font-size: small;">
                                        <span id="lblSSDiscount3" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Received Amount </span>
                                    </td>
                                    <td align="right" style="border-style: solid none Solid none; font-size: small;">
                                        <span id="lblNetPaid" style="font-family:Arial;font-size:Small;">7710</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="Right" style="font-weight: bold; font-size: small;">
                                        <span id="lblLessLbl" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Balance Fee </span>
                                    </td>
                                    <td align="right" style=" font-size: small;">
                                        <span id="lblLess" style="font-family:Arial;font-size:Small;">0</span>
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
                                        <span id="lblRupee" style="font-size: small;">Thirty-Eight Thousand One Hundred and Seventy Only</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span id="Label2" style="font-weight: bold;
                                            font-size: small;">Cheque no:</span>
                                        <span id="lblChequeNo" style="font-size: small;">_____</span>
                                        &nbsp;<span id="Label3" style="font-weight: bold;
                                            font-size: small;">Date:</span>
                                        <span id="lblChequeDate" style="font-size: small;">__/__/____</span>
                                        &nbsp;<span id="Label4" style="font-weight: bold;
                                            font-size: small;">Bank Name: </span>
                                        <span id="lblbankName" style="font-size: small;">_____</span>
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
                   
                </tr>
            </table>
        </center>
    
</div>
<script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
</body>
</html>


<script>
$(document).ready(function() {
  window.print();  
});
    
</script>