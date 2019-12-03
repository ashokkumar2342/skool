<table class="table">
	<thead>
		<tr>
			<th>Student Name</th>
			<th>Registration No</th>
			<th>Certificate Type</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($CertificateIssueDetail as $CertificateIssueDetai)
		            @php
           
			            
			            $color ='';
			            if($CertificateIssueDetai->status==3){
			              $color = 'lebel label-success';
			            }else if($CertificateIssueDetai->status==4){
			              $color = 'lebel label-danger';
			            }else if($CertificateIssueDetai->status==2){
			               $color = 'lebel label-warning';
			            }else if($CertificateIssueDetai->status==1){
			               $color = 'lebel label-primary';
			            }
                 @endphp
					<tr class="{{ $color }}">
						<td>{{ $CertificateIssueDetai->students->name or '' }}</td>
						<td>{{ $CertificateIssueDetai->students->registration_no or ''}}</td> 
						@if ($CertificateIssueDetai->certificate_type==2)
                         <td>School Leaving Certificate</td>             
	                    @endif  
	                     @if ($CertificateIssueDetai->certificate_type==3)
	                         <td>Character Certificate</td>             
	                    @endif
	                      @if ($CertificateIssueDetai->certificate_type==4)
	                         <td>Date of Birth Certificate</td> 

	                    @endif
	                    @if ($CertificateIssueDetai->status==4) 
	                    <td><span class="label label-danger">&nbsp;&nbsp; Reject &nbsp;&nbsp;&nbsp;</span>
	                    	<a class="btn btn-success btn-xs" disabled target="blank" title="Certificate Download" href="{{ route('admin.student.attachment.download',$CertificateIssueDetai->id) }}"><i class="fa fa-download"></i></a> 
	                    </td>            

	                    @endif
	                    @if ($CertificateIssueDetai->status==1) 
	                    <td><span class="label label-primary">&nbsp;&nbsp; Apply &nbsp;&nbsp;</span>
	                    	<a class="btn btn-success btn-xs" disabled target="blank" title="Certificate Download" href="{{ route('admin.student.attachment.download',$CertificateIssueDetai->id) }}"><i class="fa fa-download"></i></a> 
	                    </td>            

	                    @endif
	                    @if ($CertificateIssueDetai->status==2) 
	                    <td><span class="label label-warning">&nbsp;&nbsp; Virify &nbsp;&nbsp;&nbsp;</span>
	                    	<a class="btn btn-success btn-xs" disabled target="blank" title="Certificate Download" href="{{ route('admin.student.attachment.download',$CertificateIssueDetai->id) }}"><i class="fa fa-download"></i></a> 
	                    </td>            

	                    @endif
	                     @if ($CertificateIssueDetai->status==3) 
	                     <td><span class="label label-success">Approval</span>
	                     	<a class="btn btn-success btn-xs" target="blank" title="Certificate Download" href="{{ route('admin.student.attachment.download',$CertificateIssueDetai->id) }}"><i class="fa fa-download"></i></a>
	                     </td>            

	                    @endif
	                     
					</tr> 
		@endforeach
	</tbody>
</table>