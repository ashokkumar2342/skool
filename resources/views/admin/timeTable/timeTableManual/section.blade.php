 <div class="col-lg-4">
                <label>Section</label>
                <select name="section" class="form-control" id="section_id" onchange="callAjax(this,'{{ route('admin.time.table.manual') }}'+'?time_table_type_id='+$('#time_table_type').val()+'&class_id='+$('#class_id').val(),'history_wise_timing')"> 
                  <option  selected disabled>Select Section</option>
                  @foreach ($sections as $section) 
                  <option value="{{ $section->section_id }}">{{ $section->sectionTypes->name or ''}}</option> 
                   @endforeach 
                </select> 
                </div> 
                





  
  <script type="text/javascript">
    
     $('#btn_section_wise_show').click();
  </script>