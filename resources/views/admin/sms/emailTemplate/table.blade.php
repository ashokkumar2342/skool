 <table id="author_table" class="table table-bordered table-striped table-hover table-responsive"> 
               <thead>
                 <tr>
                   <th>Sr.No.</th>
                   <th>Template </th>
                   <th>Massage</th>
                   <th>Subject</th>
                   <th>Status</th>
                   <th>Action</th>
                   
                 </tr>
               </thead>
               <tbody>
                @php
                  $id=1;
                @endphp
                @foreach ($EmailTemplates as $EmailTemplates) 
                 <tr>
                  <th>{{ $id++ }}</th>
                   <td>{{ $EmailTemplates->templateType->name or '' }}</td>
                   <td>{!! $EmailTemplates->message !!}</td>
                   
                   <td style="width: 200px">{{ $EmailTemplates->subject }}</td>
                   <td>{!! $EmailTemplates->status==1?'Active':'Inactive' !!}</td>
                   
                   <td style="width: 100px">
                     <button class="btn btn-info btn-xs" title="View" onclick="callPopupLarge(this,'{{ route('admin.email.template.view',$EmailTemplates->id) }}')"><i class="fa fa-eye"></i></button>

                     <button class="btn btn-warning btn-xs" title="Edit" text-editor="summernote" onclick="callPopupLarge(this,'{{ route('admin.email.template.edit',Crypt::encrypt($EmailTemplates->id)) }}')"><i class="fa fa-edit"></i></button>

                        <a href="{{ route('admin.email.template.delete',Crypt::encrypt($EmailTemplates->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

                   </td>
                    
                 </tr>
                @endforeach
               </tbody>
             </table> 