 
	 
<div class="panel panel-default">
  <div class="panel-heading"></div>
  <div class="panel-body">
  	<table class="table"> 
	<thead>
		<tr>
			<th>Name</th>
			<th>Mobile No</th>
			<th>Email</th>
			<th>Address</th> 
			 
		</tr>
	</thead>
	<tbody>
		 @foreach ($parentInfos as $parentInfo)
			<tr>
				<td>{{ $parentInfo->name }}</td>
				<td>{{ $parentInfo->mobile }}</td>
				<td>{{ $parentInfo->email }}</td>
				<td>{{ $parentInfo->office_address }}</td>
				<td><input type="radio" name="student_idcard" id="perent_idcard" value="{{ $parentInfo->p }}"></td>

			</tr> 
		@endforeach
	</tbody>
</table>
  </div>
<div class="col-lg-12 text-center">
<input type="submit" class="btn btn-success">
	
</div>
</div>

 