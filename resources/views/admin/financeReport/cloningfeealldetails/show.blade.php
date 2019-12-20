 
	 
<div class="panel panel-default">
  <div class="panel-heading"></div>
  <div class="panel-body">
  	<table class="table">
  		<thead>
  			<tr>
  				<th>Old Fee Structure</th>
  				<th>New Fee Structure</th>
  			</tr>
  		</thead>
  		<tbody>
  			@foreach ($classFeeStructures as $classFeeStructure)
  				<tr>
  					<td>{{ $classFeeStructure->feeStructures->name or '' }}</td>
  					 <td><select name="fee_structure_id[]" class="form-control">
  					 	<option value="0"></option> 
  					 	@foreach ($FeeStructures as $FeeStructure)
  					 	  <option value="{{ $FeeStructure->id }}"{{ $FeeStructure->id==$classFeeStructure->fee_structure_id?'selected' : '' }}>{{ $FeeStructure->name }}</option> 
  					 	@endforeach
  					 </select>
  					 </td>
  					 <input type="hidden" name="reference_academic_year" value="{{ $reference_academic_year }}"> 
  					 <input type="hidden" name="new_academic_year" value="{{ $new_academic_year }}"> 
  					 <input type="hidden" name="class_id" value="{{ $class_id }}"> 
  				</tr> 
  			@endforeach
  		</tbody>
  	</table>
  	<div class="col-lg-12 text-center">
  		<input type="submit" class="btn btn-warning" value="Cloning">
  	 	
  	 </div> 
  </div>
</div>



