<div class="col-lg-3 form-group">
    <label>Amount</label>
    <input type="text" name="amount" class="form-control" value="{{ $feeStructureAmount }}"> 
</div>
<div class="col-lg-2 form-group">
    <label>For Session/Month</label>
    <select name="for_session_month_id" class="form-control">
        @foreach ($forSessionMonths as $forSessionMonth)
        <option value="{{ $forSessionMonth->id }}">{{ $forSessionMonth->name}}</option> 
        @endforeach 
    </select> 
</div>
@php
   $num= $feeStructureLastDstes->count();
@endphp
<div class="col-lg-1">
    @if($num!=0)
    <input type="submit" onclick="return confirm('Are you sure you want to overwrite?')"  class="btn btn-success" style="margin-top: 24px">
    @else
     <input type="submit" class="btn btn-success"  style="margin-top: 24px">
    @endif

    
</div>
<div class="col-lg-12"> 
    <table id="fee_structure_last_date_table" class="display table" style="margin-top: 10px">                     
        <thead>
            <tr>
                <th>Sr.No.</th>
                <th>Fee Structure</th> 
                <th>Academic Year</th>
                <th>Amount</th>
                <th>Last Date</th>
                <th>Month</th>                                                            
                <th>For Session/Month</th>                                                            
                <th>Action</th>                                                            
            </tr>
        </thead>
        <tbody>
            @foreach ($feeStructureLastDstes as $feeStructureLastDste)
            <tr>
                <td width="30px">{{ ++$loop->index }}  </td>
                <td>{{ $feeStructureLastDste->feeStructures->name or ''}}</td>
                <td>{{ $feeStructureLastDste->academicYears->name or ''}}</td>

                <td>{{ $feeStructureLastDste->amount }}</td>
                <td>{{ Carbon\Carbon::parse($feeStructureLastDste->last_date)->format('d-m-Y') }}</td>
                <td> {{ Carbon\Carbon::parse($feeStructureLastDste->last_date)->format(' F ') }} </td>
                <td> {{ $feeStructureLastDste->forSessionMonths->name or ''}} </td>
                <td>
                <a href="#" class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.feeStructureLastDate.edit',$feeStructureLastDste->id) }}')" title="Delete"><i class="fa fa-edit"></i></a>  
                <a href="#" class="btn btn-danger btn-xs" select-triger="fee_structure_select_box" success-popup="true" onclick="callAjax(this,'{{ route('admin.feeStructureLastDate.delete',$feeStructureLastDste->id) }}')" title="Delete"><i class="fa fa-trash"></i></a>  
               </td>
</tr>  	 
@endforeach	
 

</tbody> 
</table>
</div>
