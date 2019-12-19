<table id="student_fee_detail_table" class="display table">                     
    <thead>
        <tr>
            <th>SR.No.</th>
            <th>Student Name</th>
            <th>Registration No</th>

            <th>Old Fee Group</th>                               
            <th>New Fee Group</th>                                                            
        </tr>
    </thead>
    <tbody id="searchResult">
        @foreach ($students as $student)  
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->registration_no}}</td> 
            <td>{{ $student->old_fee_group}}</td> 
            

{{--  <select name="old_fee_group" class="form-control">
@foreach ($feeGroups as $feeGroup)
<option value=""></option> 
@endforeach

</select> --}}
</td>
<td>
    <select name="old_fee_group" class="form-control">
        @foreach ($feeGroups as $feeGroup)
        <option value="">{{ $feeGroup->name }}</option> 
        @endforeach

    </select>
</td>
</tr>
@endforeach

</tbody>