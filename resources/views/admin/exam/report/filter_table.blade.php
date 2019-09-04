<table class="table">
	<thead>
		<tr>
			<th>header</th>
			<th>header</th>
			<th>header</th>
			<th>header</th>
			<th>header</th>
			<th>header</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($classTestDetails as $classTestDetail)
				<tr>
					<td>{{ $classTestDetail->marksobt }}</td>
				</tr> 
		@endforeach
	</tbody>
</table>