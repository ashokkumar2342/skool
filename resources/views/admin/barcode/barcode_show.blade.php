<table class="table"> 
	<thead>
		<tr>
			<th>data</th>
		</tr>
		
		
	</thead>
	<tbody>
		@foreach ($imgs as $img)
		<tr>
			<td><img src="data:image/jpg;base64,{{ $img }}" /></td>
		 
		</tr>
		@endforeach
		
	</tbody>
</table>