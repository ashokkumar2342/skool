<button type="button" class="btn btn-default hidden"  id="btn_section_wise_show" onclick="callAjax(this,'{{ route('admin.time.table.manual.button.wise.final.result') }}'+'?time_table_type_id='+$('#time_table_type').val()+'&class_id='+$('#class_id').val()+'&section_id='+$('#section_id').val(),'history_wise_final_result')"></button>

<div id="history_wise_final_result">
  
</div>


 
   











   

 
  <div class="col-lg-12 text-center"> 
   {{--  <input type="submit" class="btn btn-success" value="Save" style="margin-top: 10px"> --}}
    <button type="button" class="btn btn-info" style="margin-top: 10px" onclick="callAjax(this,'{{ route('admin.time.table.manual.subject.show') }}'+'?time_table_type_id='+$('#time_table_type').val()+'&class_id='+$('#class_id').val(),'btn_click_by_show')">Make Time Table</button>
    
  </div>     
</div> 
<div id="btn_click_by_show">
  
</div>

 <script type="text/javascript">
     
     $('#btn_section_wise_show').click();
  </script>








 