
@foreach ($classTestDetails as $classTestDetail)
      

 @include('admin.include.boostrap')  
<div>
    <div id="p1" style="font-family:Arial;">    
        <center>
            <table>
                <tr>
                    <td>
                        <div style="width: 550px;">
                            <table width="100%">
                                <tr>
                                    <td colspan="12">
                                        <div style="width: 670px;" align="center">
                                            <img src="" alt="" height="50px" /><br />
                                            <span id="lblheader" style="font-family:Arial;font-size:20;">Iskool, Jhajhar, Tele : +91-8397068001</br> Class Test  Session : 2018-2019</span>
                                            <hr />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblRegistraionFees0" style="display:inline-block;font-family:Arial;font-size:Small;width:320px;text-align: left;">Name : </span>
                                    </td>
                                    <td class="style4">
                                        <span id="lblReceiptNo" style="font-size:Small;"> {{ $classTestDetail->name or ''}}</span>
                                    </td>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblRegistraionFees4" style="font-family:Arial;font-size:Small;text-align: left;">Father Name:</span>
                                    </td>
                                    <td>
                                        <span id="lblReceiptDate" style="font-size:Small;">{{ $classTestDetail->father_name or ''}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblRegistraionFees1" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Mother Name : </span>
                                    </td>
                                    <td class="style4">
                                        <span id="lblStudentId" style="font-size:Small;"></span>
                                    </td>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblRegistraionFees5" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Registration No: </span>
                                    </td>
                                    <td>
                                        <span id="lblClass" style="font-size:Small;">{{ $classTestDetail->registration_no or ''}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblStudentName" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Class: </span>
                                    </td>
                                    <td>
                                        <span id="lblName" style="font-size:Small;"></span>
                                    </td>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblRegistraionFees6" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Section:</span>
                                    </td>
                                    <td>
                                        <span id="lblSection" style="font-size:Small;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblStudentName" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Roll No: </span>
                                    </td>
                                    <td>
                                        <span id="lblName" style="font-size:Small;"></span>
                                    </td>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblRegistraionFees6" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Date of Birth:</span>
                                    </td>
                                    <td>
                                        <span id="lblSection" style="font-size:Small;"></span>
                                    </td>
                                </tr>
                                 
                            </table>
                        </div>
                        <div style="width: 650px; margin-top: 10px;">
                             <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Bar Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height: 230px; width: 547px;" height="230" width="547"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
                            <hr />

                               <span style="float: right; margin-right: 50px">Total</span>         
                        </div>
                        <div style="width: 450px;" align="Left">
                            <table width="100%">
                                
                                
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
<div style="padding-top: 500px;">
    
</div>
 @endforeach 
  
  
