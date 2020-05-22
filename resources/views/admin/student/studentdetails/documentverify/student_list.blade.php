<div class="table-responsive">
   
<table  class="table table-bordered table-striped table-hover">
  <thead>
  <tr>               
    <th>Registration No</th> 
    <th>Name</th>
    <th>Class</th>
    <th>Section</th>
    
                   
  </tr>
  </thead>
  <tbody>
  @foreach($students as $student)
 
  <tr onclick="callPopupLarge(this,'{{ route('admin.student.document.verify.view',$student->id) }}')">
    <td>{{ $student->registration_no }}</td>
    <td>{{ $student->name }}</td>
    <td>{{ $student->classes->name or '' }}</td>
    <td>{{ $student->sectionTypes->name or '' }}</td>
    
   
  </tr>
  
  @endforeach
  </tbody>
   
</table>
 </div> 
             