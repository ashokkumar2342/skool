<div class="row">
                <div class="col-lg-12"> 
                  <div style="width: 100%; padding-left: -10px; ">
                  <div class="table-responsive">  
                <table id="dataTable" class="table table-striped table-bordered table-responsive">
                  <thead>
                  <tr>               
                    <th>Sn. No</th>
                    <th class="text-nowrap"> Academic Year</th>
                    <th class="text-nowrap">Registration No</th>
                    <th class="text-nowrap">Certificate type</th> 
                    <th class="text-nowrap">Name</th>
                    <th class="text-nowrap">Father Name</th> 
                    <th class="text-nowrap">Father Mobile</th> 
                    <th class="text-nowrap">Reason</th> 
                    <th class="text-nowrap">SLC No</th> 
                    <th class="text-nowrap">Udise Code</th> 
                    <th class="text-nowrap">Department School Code</th> 
                    <th class="text-nowrap">File No</th> 
                    <th class="text-nowrap">attachment</th> 
                    <th>Status</th> 
                    <th>Remarks</th> 
                    <th class="text-nowrap" width="80px">Action</th>                  
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($certificates as $certificate)
                  <tr>
                    <td>{{ ++$loop->index }}</td>                  
                    <td>{{ $certificate->academicYear->name or ''}}</td>
                    <td>{{ $certificate->students->registration_no or ''}}</td>
                    @if ($certificate->certificate_type==1)
                         <td>Fee Certificate</td>             
                    @endif 
                     @if ($certificate->certificate_type==2)
                         <td>School Leaving Certificate</td>             
                    @endif  
                     @if ($certificate->certificate_type==3)
                         <td>Character Certificate</td>             
                    @endif
                      @if ($certificate->certificate_type==4)
                         <td>Date of Birth Certificate</td>             
                    @endif         
                    <td>{{ $certificate->students->name or ''}}</td>               
                    <td>{{ $certificate->students->father_name or ''}}</td>               
                    <td>{{ $certificate->students->father_mobile or ''}}</td>               
                    <td>{{ $certificate->reason }}</td>
                    <td>{{ $certificate->slc_no }}</td>
                    <td>{{ $certificate->udise_code }}</td>
                    <td>{{ $certificate->department_school_code }}</td>
                    <td>{{ $certificate->file_no }}</td>
                    <td>{{ $certificate->attachment?'Yes':'No'}}</td>
                    <td> @if ($certificate->status == 1)
                            <button class="btn btn-primary btn-xs">On Active</button> 
                         @elseif($certificate->status == 2)
                           <button class="btn btn-warning btn-xs">Pending</button> 
                         @elseif($certificate->status == 3)
                          <button class="btn btn-success btn-xs">Approval</button>
                         @elseif($certificate->status == 4)
                          <button class="btn btn-danger btn-xs">Cancel</button> 
                         @endif 
                   </td>
                    <td><button class="btn_add_remarks btn btn-success btn-xs" data-id="{{ $certificate->id }}">Remarks</button></td>
                     
                    
                    <td class="text-nowrap">
                     <a class="btn btn-warning btn-xs" title="Certificate Verify" href="{{ route('admin.student.attachment.virify',$certificate->id) }}">Verify</a>
                     <a class="btn btn-success btn-xs" title="Certificate Approval" href="{{ route('admin.student.attachment.approval',$certificate->id) }}">Approval</a>                   

                     <a class="btn btn-primary btn-xs" target="blank" title="Certificate Download" href="{{ route('admin.student.attachment.download',$certificate->id) }}"><i class="fa fa-download"></i></a>

                     <button class="btn btn-warning btn-xs" select2="true" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.student.certificateIssu.edit',$certificate->id) }}')"><i class="fa fa-edit"></i></button> 

                     {{--  <button type="button" title="Edit certificate" class="btn btn-warning btn-xs" onclick="callPapupLarge(this,'{{ route('admin.student.certificateIssu.edit',$certificate->id) }}')">
                        <i class="fa fa-edit"></button>  --}}

                     {{--  <a class="btn btn-warning btn-xs"  title="Edit certificate" href="{{ route('admin.student.certificateIssu.edit',$certificate->id) }}"><i class="fa fa-edit"></i>  --}}

                      <a class="btn btn-info btn-xs"  title="view certificate" href="{{ route('admin.student.certificateIssu.show',$certificate->id) }}" style="margin-left: 3px;"><i class="fa fa-sticky-note"></i></a>
                       
                     {{--  @if (Auth::guard('admin')->user()->id == 1)
                      <a style="margin-left: 3px;" onclick="return confirm('Are you sure to delete certificate.')" class="btn btn-danger btn-xs" title="delete certificate" href="{{ route('admin.student.certificateIssu.edit',$certificate->id) }}"><i class="fa fa-trash"></i></a> 
                      @endif --}}
                      
                    </td>

                   
                  </tr>
                  @endforeach
                  </tbody>
                   
                </table>
              </div></div>
                </div>
              </div>