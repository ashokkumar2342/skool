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
            <td>{{ $student->stu_name }}</td>
            <td>{{ $student->registration_no}}</td> 
            <td>{{ $student->group_name}}</td> 
        <td>
            <input type="hidden" name="academic_year_id" value="{{ $academic_year_id }}">
       <select name="student_id[{{ $student->id }}]" class="form-control">
        <option value="0">No Change</option> 
        @foreach ($feeGroups as $feeGroup)
        <option value="{{ $feeGroup->id }}">{{ $feeGroup->name }}</option> 
        @endforeach 
      </select>
     </td>
   </tr>
@endforeach 
</tbody>
</table>
<div class="col-lg-12 text-center">
    <input type="submit" class="btn btn-success">
    
</div>