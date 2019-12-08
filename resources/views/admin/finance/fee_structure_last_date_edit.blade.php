
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
                    <div class="col-lg-12 form-group">
                        <label>Last Date</label>
                        <input type="date" name="last_date" class="form-control" value="{{ $feeStructureLastDate->last_date }}"> 
                    </div>
                   {{--  <div class="col-lg-12 form-group">
                        <label>Month</label>
                        <input type="month" name="month" class="form-control" value="{{ $feeStructureLastDate->last_date }}"> 
                    </div> --}}
                    <div class="col-lg-12 form-group">
                        <label>For Session/Month</label>
                        <select name="for_session_month_id" class="form-control">
                            @foreach ($forSessionMonths as $forSessionMonth)
                            <option value="{{ $forSessionMonth->id }}"{{$feeStructureLastDate->for_session_month_id==$forSessionMonth->id?'selected' : '' }}>{{ $forSessionMonth->name}}</option> 
                            @endforeach 
                        </select> 
                    </div> 
                <div class="col-lg-12 form-group text-center">
                         <input type="submit" class="btn btn-success" value="Update">
                    </div> 
                </div> 
            </form>
        </div>
    </div>
</div> 



