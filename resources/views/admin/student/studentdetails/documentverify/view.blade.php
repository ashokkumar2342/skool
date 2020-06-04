<div class="modal-dialog" style="width: 80%">
<div class="modal-content">
<div class="modal-header">
<button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title"></h4>
</div>
<div class="modal-body">
	<table class="table table-bordered table-striped table-hover">
		 
		<tbody>
			@foreach ($documents as $document)
			@php
				$paths=route('admin.student.document.verify.print',$document->id);
			@endphp
			<tr>
				
				<td>
					<div class="col-lg-4">
						<input type="checkbox" name="verify_{{ $document->id}}" success-popup="true" onclick="callAjax(this,'{{ route('admin.document.verify',$document->id) }}')">
						<label>Verify</label>
					</div>
					<div class="col-lg-4">
						<a class="btb btn-danger btn-sm" href="#" onclick="callPopupLevel2(this,'{{ route('admin.document.reject',$document->id) }}')">Reject</a>
					</div>
					<iframe src="{{$paths}}" style="width:100%; height:500px;" frameborder="0"></iframe>

				
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


 