 <table id="event_type_data_table" class="table table-bordered table-striped table-hover table-responsive"> 
               <thead>
                 <tr>
                   <th style="width: 40px">Sr.No.</th> 
                   <th>Employee</th>
                   <th>Certificate Type</th> 
                   <th>Designation</th>
                   <th>Authority Type</th>
                   <th class="text-center" style="width: 50px">Action</th>
                 </tr>
               </thead>
               <tbody>
                @php
                  $arrayId=1;
                @endphp
                @foreach ($signatureStamps as $signatureStamp) 
                 <tr style="{{ $signatureStamp->status==1?'background-color: #95e49b':'' }}">
                   <td>{{ $arrayId++}}</td>  
                   <td>{{ $signatureStamp->employee->name or ''}}</td>  
                   <td>{{ $signatureStamp->CertificateType->name or '' }}</td>  
                   <td>{{ $signatureStamp->Designation }}</td>  
                   <td>{{ $signatureStamp->IssueAthortiType->name or '' }}</td> 
                   <td class="text-nowrap">
                     @if ($signatureStamp->status==1)
                        <a onclick="callAjax(this,'{{ route('admin.signature.stamp.status',$signatureStamp->id) }}')" seccess-popup="true" button-click="btn_stamp_table_show"  class="btn-xs btn-success btn">Active</a>
                        @else
                        <a onclick="callAjax(this,'{{ route('admin.signature.stamp.status',$signatureStamp->id) }}')" seccess-popup="true" button-click="btn_stamp_table_show" class="btn-xs btn-default btn">Active</a>
                      @endif
                     <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.signature.stamp.add.form',Crypt::encrypt($signatureStamp->id))}}')"><i class="fa fa-edit"></i></button>
                     {{-- <button class="btn btn-danger btn-xs" title="Delete" onclick="callPopupLarge(this,'{{ route('admin.signature.stamp.add.form',Crypt::encrypt($signatureStamp->id))}}')"><i class="fa fa-trash"></i></button> --}}

                      
                   </td> 
                 </tr>
                @endforeach
               </tbody>
             </table> 