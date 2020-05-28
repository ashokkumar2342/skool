
 {{-- 
  @foreach($students as $student)
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" onclick="callAjax(this,'{{ route('admin.student.document.verify.view',$student->id) }}','collapse{{ $student->id }}')" href="#collapse{{ $student->id }}">{{ $student->registration_no }}</a>
        </h4>
      </div>
       
      <div id="collapse{{ $student->id }}" class="panel-collapse collapse">
        
        <ul class="list-group">
          <li class="list-group-item">
            <iframe src="https://docs.google.com/gview?url=http://eageskool.com/admin/student/student-document-verify-print/23&embedded=true" style="width:100%; height:1000px;" frameborder="0"></iframe>
          </li>
          <li class="list-group-item">Two</li>
          <li class="list-group-item">Three</li>
        </ul>
       
        <div class="panel-footer">Footer</div>
      </div>
      
    </div>
  </div>
  @endforeach --}}

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
    <td><a target="_blank" href="{{ route('admin.student.document.verify.view',$student->id) }}" title="">{{ $student->registration_no }}</a></td>
    <td>{{ $student->name }}</td>
    <td>{{ $student->classes->name or '' }}</td>
    <td>{{ $student->sectionTypes->name or '' }}</td>
    
   
  </tr>
  
  @endforeach
  </tbody>
   
</table>
 </div> 
             