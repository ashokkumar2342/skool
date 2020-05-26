<div class="col-lg-12" style="float: right;">
 <button type="button" class="btn btn-info btn-sm pull-right" text-editor="summernote" onclick="callPopupLarge(this,'{{ route('admin.email.template.addform',$message_purpose_id)}}')" style="margin:5px">Add New Template</button>
   
 </div>
 <div class="col-lg-12 form-group">
                   <label>Hints : &nbsp;</label> 
                   {{ $messagePurposes->Variables_Description }}
                   </div>
 <table id="author_table" class="table  table-striped table-hover table-responsive"> 
               <thead>
                 <tr>
                   <th>Sr.No.</th> 
                   <th>Name</th>
                   <th>Massage</th>
                   <th>Subject</th>
                   <th class="text-center">Action</th> 
                   
                 </tr>
               </thead>
               <tbody>
                @php
                  $id=1;
                @endphp
                @foreach ($emailTemplates  as $EmailTemplates) 
                 <tr style="{{ $EmailTemplates->status==1?'background-color: #95e49b':'' }}">
                  <th>{{ $id++ }}</th> 
                  
                   <td>{!! mb_strimwidth($EmailTemplates->name, 0, 90, "............") !!}</td>
                   <td>{!! $EmailTemplates->message !!}</td>
                   
                   <td style="width: 200px">{{ $EmailTemplates->subject }}</td>
                   <td class="text-nowrap">
                     
                   @if ($EmailTemplates->status==1)
                    
                      <a href="#" select-triger="message_purpose_box" onclick="callAjax(this,'{{ route('admin.email.template.status',$EmailTemplates->id) }}')" title="" class="btn btn-success btn-xs">Default</a> 
                      @else
                      <a href="#" select-triger="message_purpose_box" onclick="callAjax(this,'{{ route('admin.email.template.status',$EmailTemplates->id) }}')" title="" class="btn btn-default btn-xs">Default</a> 
                    
                   @endif
                    
                   
                     <button class="btn btn-info btn-xs" title="View" onclick="callPopupLarge(this,'{{ route('admin.email.template.view',$EmailTemplates->id) }}')"><i class="fa fa-eye"></i></button>

                     <button class="btn btn-warning btn-xs" title="Edit" text-editor="summernote" onclick="callPopupLarge(this,'{{ route('admin.email.template.edit',Crypt::encrypt($EmailTemplates->id)) }}')"><i class="fa fa-edit"></i></button>

                        <a href="{{ route('admin.email.template.delete',Crypt::encrypt($EmailTemplates->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

                   </td>
                    
                 </tr>
                @endforeach
               </tbody>
             </table> 