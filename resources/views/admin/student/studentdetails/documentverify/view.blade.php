<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title"></h4>
</div>
<div class="modal-body">
	<table class="table">
		<thead>
			<tr>
				<th>Document</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($documents as $document)
			@php
				$paths=route('admin.student.document.verify.print',$document->id);
			@endphp
			<tr>
				
				<td>
					<iframe src="https://docs.google.com/gview?url={{$paths}}&embedded=true" style="width:100%; height:1000px;" frameborder="0"></iframe>
				
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
</div>
</div>
{{-- <ul class="list-group">
	@foreach ($documents as $document)
		@php
			$paths=route('admin.student.document.verify.print',$document->id);
		@endphp
	  <li class="list-group-item">
	  	<iframe src="https://docs.google.com/gview?url=http://eageskool.com/admin/student/student-document-verify-print/23&embedded=true" style="width:100%; height:1000px;" frameborder="0"></iframe>
	  </li>
	   
  @endforeach
</ul> --}}


 