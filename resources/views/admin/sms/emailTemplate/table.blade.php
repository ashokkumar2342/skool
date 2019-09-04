 <table id="author_table" class="table table-bordered table-striped table-hover table-responsive"> 
               <thead>
                 <tr>
                   <th>Template Name</th>
                   <th>Massage</th>
                   <th>Action</th>
                   
                 </tr>
               </thead>
               <tbody>
                @foreach ($EmailTemplates as $EmailTemplates) 
                 <tr>
                   <td>{{ $EmailTemplates->templateType->name or '' }}</td>
                   <td>{{ mb_strimwidth($EmailTemplates->message, 0, 90, "............") }}</td>
                   
                   <td>
                     <button class="btn btn-info btn-xs" title="View" onclick="callPopupLarge(this,'{{ route('admin.sms.template.view',$EmailTemplates->id) }}')"><i class="fa fa-eye"></i></button>

                     <button class="btn btn-warning btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.sms.template.edit',Crypt::encrypt($EmailTemplates->id)) }}')"><i class="fa fa-edit"></i></button>

                       {{--  <a href="{{ route('admin.sms.template.delete',Crypt::encrypt($smsTemplates->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a> --}}

                   </td>
                    
                 </tr>
                @endforeach
               </tbody>
             </table> 