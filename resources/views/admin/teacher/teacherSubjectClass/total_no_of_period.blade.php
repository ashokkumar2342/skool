<div class="col-lg-4">
	<div class="col-lg-4"> 
	  <label>Total Load</label>
     <input type="text" class="form-control" disabled value="{{ $classSubjectSavePeriod->no_of_period or '' }}">
	</div>
	<div class="col-lg-4"> 
	  <label>Load</label>
     <input type="text" class="form-control" disabled value="{{ $teacherSubjectClassSaveperiod}}">
	</div>
	<div class="col-lg-4"> 
	  <label>Balance</label>
	  <input type="hidden" class="form-control" name="load_balance"  value="{{ ($classSubjectSavePeriod->no_of_period )  - ($teacherSubjectClassSaveperiod)}}">
     <input type="text" class="form-control" disabled value="{{ ($classSubjectSavePeriod->no_of_period )  - ($teacherSubjectClassSaveperiod)}}">
	</div>
	
</div>