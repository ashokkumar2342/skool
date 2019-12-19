
<!-- Main content -->

<style type="text/css" media="screen">
    .bd{
        border-bottom: #eee solid 1px;;
    }

</style>

<div class="modal-dialog" style="width:40%">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit</h4>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.feeStructureLastDate.update',$feeStructureLastDate->id) }}" method="post" class="add_form" select-triger="fee_structure_select_box" button-click="btn_close">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12 form-group">
                        <label>Amount</label>
                        <input type="text" name="amount" class="form-control" value="{{ $feeStructureLastDate->amount }}"> 
                    </div>
                    @php
                        $month='0'.$feeStructureLastDate->due_month.'-'.$feeStructureLastDate->due_year;
                    @endphp 
                    <div class="col-lg-12 form-group">
                        <label>Due Month/Year</label>
                        <select name="due_month_year" class="form-control">
                            @foreach ($yearmonths as $yearmonth)
                                  <option value="01-{{ $yearmonth }}"{{ $month==$yearmonth?'selected' : '' }}>{{ $yearmonth }}</option> 
                            @endforeach 
                        </select> 
                    </div> 
                    <div class="col-lg-12 form-group">
                        <label>For Session/Month</label>
                       <input type="text" name="for_session_month" class="form-control" value="{{ $feeStructureLastDate->for_session_month }}"> 
                    </div> 
                <div class="col-lg-12 form-group text-center">
                         <input type="submit" class="btn btn-success" value="Update">
                    </div> 
                </div> 
            </form>
        </div>
    </div>
</div> 



