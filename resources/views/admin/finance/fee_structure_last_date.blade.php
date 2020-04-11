@extends('admin.layout.base')
@section('body')
<section class="content-header">
        <a href="#" onclick="callPopupLarge(this,'{{ route('admin.feeStructureAmount.clone','feestruturelassdate_clone') }}')" class="btn btn-info btn-sm pull-right" title="">Clone</a>
    <h1>Fee Structure Last Date</h1> 
     
     
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
	                <form class="add_form" action="{{ route('admin.feeStructureLastDate.post') }}" method="post" select-triger="fee_structure_select_box" no-reset="true">
                    {{ csrf_field() }}
                         <div class="col-lg-3">                           
                             <div class="form-group">
                              {{ Form::label('academic_year_id','Academic Year',['class'=>' control-label']) }}
                              <span class="fa fa-asterisk"></span>
                               {{ Form::select('academic_year_id',$acardemicYear,null,['class'=>'form-control','id'=>'academic_year_id']) }}
                               <p class="errorAmount1 text-center alert alert-danger hidden"></p>
                             </div>    
                        </div>
                         <div class="col-lg-3">                           
                             <div class="form-group">
                              {{ Form::label('fee_structure_id','Fee Structure',['class'=>' control-label']) }}
                              <span class="fa fa-asterisk"></span>
                              <select name="fee_structure_id" id="fee_structure_select_box" class="form-control" {{-- data-table="fee_structure_last_date_table" --}}  onchange="callAjax(this,'{{ route('admin.feeStructureAmount.search') }}'+'?academic_year_id='+$('#academic_year_id').val(),'form_fee_structure_last_date_table')" autofocus>
                                <option selected disabled>Select Fee Structurer</option>
                                @foreach ($feeStructur as $feeStructu)
                                <option value="{{ $feeStructu->id }}">{{ $feeStructu->name }}</option> 
                                @endforeach
                              </select>  
                             </div>    
                        </div> 
                        <div class="" id="form_fee_structure_last_date_table"> 
                        </div>    
	                                      
	                </form> 
                </div> 
            </div> 
             </div>
 
    </section>
    <!-- /.content -->
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush 
 @push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

 
@endpush