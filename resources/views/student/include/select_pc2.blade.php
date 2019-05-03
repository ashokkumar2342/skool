 
   
  <select name="pc_code" id="pc_code" class="form-control" onchange="callAjax(this,'{{ url('search-ac') }}','select_ac_div2')">

     <option selected="" disabled="">Select PC Code</option>  
    @foreach ($pcdetails as $pcdetail)
        <option value="{{ $pcdetail->id }}">{{ $pcdetail->pc_code }}</option>
    @endforeach 
  </select> 
 