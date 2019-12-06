 @extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
    
@endpush
@section('body')

<section class="content-header">
     <button type="button" class="pull-right btn btn-info btn-sm" onclick="callPopupLarge(this,'{{ route('admin.feeAcount.add.form') }}')">Add Fee Account</button>
    <h1>Fee Accounts <small>List</small> </h1>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
              <form action="{{ route('admin.feeStructureAmount.post') }}" method="post" class="add_form" accept-charset="utf-8" select-triger="academic_year_select_box" no-reset="true">
            {{ csrf_field() }} 
                <div class="row">  
                         <div class="col-lg-12">                           
                             <div class="form-group">
                              <label>Academic Year</label>
                              <select name="academic_year_id" id="academic_year_select_box" class="form-control" onchange="callAjax(this,'{{ route('admin.feeStructureAmount.onchange') }}','fee_structure_amount_table_page')">
                                <option selected disabled>Select Academic Year</option>
                                @foreach ($acardemicYears as $acardemicYear)
                                      <option value="{{ $acardemicYear->id }}">{{ $acardemicYear->name }}</option> 
                                @endforeach
                              </select> 
                             </div>    
                        </div> 
                      </div>
                      <div class="col-lg-12" id="fee_structure_amount_table_page">
                          
                        </div>
                    </form>       
            </div>
         </div>
 
    </section>
    <!-- /.content -->
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
      $(window).load(function(){
   $('#academic_year_select_box').val('{{ $acardemicYearsSet->id }}').trigger('change');
});   
  </script>
  @endpush 