<table class="table" id="syllabus_last_table">
	<thead>
		<tr>
			<th>Sr.No.</th>
			<th>Subject</th>
			<th>Syllabus</th>
		</tr>
	</thead>
	<tbody>
		@php
			$id=1;
		@endphp
		@foreach ($Syllabuss as $Syllabus)
		<tr>
			<td>{{$id++}}</td>
			<td>{{$Syllabus->sujectTypes->name or ''}}</td>
			
			<td><a href="{{ route('admin.master.syllabus.view',$Syllabus->syllabus) }}" target="blank" style="margin:10px">{{ $Syllabus->syllabus?'Open the Syllabus!' : '' }}</a></td></td>
		</tr>
		@endforeach
	</tbody>
</table>