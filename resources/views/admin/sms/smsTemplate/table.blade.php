 <div class="col-lg-12" style="float: right;">
  <button type="button" class="btn btn-sm btn-info pull-right" onclick="callPopupLarge(this,'{{ route('admin.sms.template.add',$message_purpose_id) }}')" style="margin :5px">Add New Template</button>
   
 </div>
 <div class="col-lg-12 form-group">
                   <label>Hints : &nbsp;</label> 
                   {{ $messagePurposes->Variables_Description }}
                   </div>
 <table id="author_table" class="table  table-striped table-hover table-responsive"> 
               <thead>
                 <tr>
                   <th class="text-nowrap">Sr.No.</th> 
                   <th class="text-nowrap">Name</th>
                   <th class="text-nowrap">Massage</th>
                   <th class="text-nowrap">Description</th>
                   <th class="text-nowrap text-center">Action</th> 
                 </tr>
               </thead>
               <tbody>
                 @php 
                   $sectionId=1;
                  @endphp
                @foreach ($smsTemplates as $smsTemplates) 
                 <tr style="{{ $smsTemplates->status==1?'background-color: #95e49b':'' }}">
                   <td>{{  $sectionId++ }}</td>
                   <td class="text-nowrap">{{ $smsTemplates->name or '' }}</td> 
                   <td class="text-nowrap">{{ mb_strimwidth($smsTemplates->message, 0, 90, "............") }}</td>
                   <td>{{ mb_strimwidth($smsTemplates->discription, 0, 90, "............") }}</td>
                   
                   <td class="text-nowrap">
                    @if ($smsTemplates->status==1)
                      <a href="#" onclick="callAjax(this,'{{ route('admin.sms.template.status',$smsTemplates->id) }}')" title="" class="btn btn-success btn-xs">Default</a>
                     <button class="btn btn-info btn-xs" title="View" select-triger="message_purpose_box" onclick="callPopupLarge(this,'{{ route('admin.sms.template.view',$smsTemplates->id) }}')"><i class="fa fa-eye"></i></button>
                     @else
                     <a href="#"  select-triger="message_purpose_box" onclick="callAjax(this,'{{ route('admin.sms.template.status',$smsTemplates->id) }}')" title="" class="btn btn-default btn-xs">Default</a>
                     <button class="btn btn-info btn-xs" title="View" onclick="callPopupLarge(this,'{{ route('admin.sms.template.view',$smsTemplates->id) }}')"><i class="fa fa-eye"></i></button>
                       
                    @endif

                     <button class="btn btn-warning btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.sms.template.edit',Crypt::encrypt($smsTemplates->id)) }}')"><i class="fa fa-edit"></i></button>

                        <a select-triger="message_purpose_box" onclick="if(confirm('Are you Sure delete?')){callAjax(this,'{{ route('admin.sms.template.delete',Crypt::encrypt($smsTemplates->id)) }}')} else{console_Log('cancel') }"  class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

                   </td>
                    
                 </tr>
                @endforeach
               </tbody>
             </table> 