<table class="table"> 
    <thead>
      <tr>
        <th>Subject</th>
        <th>Class</th>
        <th>Section</th>
        <th>Room No</th>
        <th>Group</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($combineClassSubjectTables as $combineClassSubjectTable)
        
              <tr>
                <td>{{ $combineClassSubjectTable->subjectType->name or '' }}</td>
                <td>{{ $combineClassSubjectTable->classType->name or ''}}</td>
                <td>{{ $combineClassSubjectTable->sectionTypes->name or ''}}</td>
                <td>{{ $combineClassSubjectTable->roomType->name or ''}}</td>
                <td> Group{{ $combineClassSubjectTable->group_no or ''}}</td>

                <td> 
                <a href="#" {{-- button-click="btn_table_show" --}}  success-popup="true" onclick="return confirm('Are you sure to delete this data ?')?callAjax(this,'{{ route('admin.combine.class.subject.details.delete',$combineClassSubjectTable->id) }}','',hideDiv):''" title="Delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
               </td>
              </tr>
      @endforeach
    </tbody>
  </table>

  <script>
     function hideDiv(){
    $('#class_id').trigger('change')
  }
  </script>