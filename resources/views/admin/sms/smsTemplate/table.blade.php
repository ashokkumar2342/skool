 <table id="author_table" class="table table-bordered table-striped table-hover table-responsive"> 
               <thead>
                 <tr>
                   <th>ID</th>
                   <th>Template Name</th>
                   <th>Massage</th>
                   <th>Action</th>
                   
                 </tr>
               </thead>
               <tbody>
                @foreach ($smsTemplates as $smsTemplates) 
                 <tr>
                   <td>{{ $smsTemplates->id }}</td>
                   <td>{{ $smsTemplates->templateType->name or '' }}</td>
                   <td>{{ mb_strimwidth($smsTemplates->message, 0, 90, "............") }}</td>
                   
                   <td>
                     <button class="btn btn-info btn-xs" title="View" onclick="callPopupLarge(this,'{{ route('admin.sms.template.view',$smsTemplates->id) }}')"><i class="fa fa-eye"></i></button>

                     <button class="btn btn-warning btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.sms.template.edit',Crypt::encrypt($smsTemplates->id)) }}')"><i class="fa fa-edit"></i></button>

                       {{--  <a href="{{ route('admin.sms.template.delete',Crypt::encrypt($smsTemplates->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a> --}}

                   </td>
                    
                 </tr>
                @endforeach
               </tbody>
             </table> 