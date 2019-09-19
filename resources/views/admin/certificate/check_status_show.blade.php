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
					<tr>
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
	                    @if ($CertificateIssueDetai->status==1) 
	                    <td><span class="label label-primary">Apply</span></td>            

	                    @endif
	                    @if ($CertificateIssueDetai->status==2) 
	                    <td><span class="label label-warning">Virify</span></td>            

	                    @endif
	                     @if ($CertificateIssueDetai->status==3) 
	                     <td><span class="label label-success">Approval</span></td>            

	                    @endif
					</tr> 
		@endforeach
	</tbody>
</table>