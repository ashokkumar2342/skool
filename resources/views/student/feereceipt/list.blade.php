<table class="table" id="previos_receipt_data_table">
                  <thead>
                    <tr>
                      <th class="text-nowrap">User Name</th>
                      <th class="text-nowrap">Student Name</th>
                      <th class="text-nowrap">Registration No.</th>
                      <th class="text-nowrap">Receipt No.</th>
                      <th class="text-nowrap">Receipt Date</th>
                      <th class="text-nowrap">Receipt Amount</th>
                      <th class="text-nowrap">Amount Deposit</th>
                      <th class="text-nowrap">Action</th>
                       
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($receiptDetails as $receiptDetail)
                      <tr>
                        <td class="text-nowrap">{{ $receiptDetail->admins->first_name or '' }}</td>
                        <td class="text-nowrap">{{ $receiptDetail->students->name or '' }}</td>
                        <td class="text-nowrap">{{ $receiptDetail->students->registration_no or '' }}</td> 
                        <td class="text-nowrap">{{ $receiptDetail->rcpt_no }}</td>
                        <td class="text-nowrap">{{ $receiptDetail->rcpt_date }}</td>
                        <td class="text-nowrap">{{ $receiptDetail->rcpt_amt }}</td>
                        <td class="text-nowrap">{{ $receiptDetail->amt_deposit }}</td>
                        <td class="text-nowrap">
                          <a href="{{ route('admin.privious.reciept.download',$receiptDetail->rcpt_no) }}" target="blank"  title="Download" class="btn btn-xs btn-success"><i class="fa fa-download"></i></a>
                        </td>
                      </tr> 
                    @endforeach
                  </tbody>
                </table>