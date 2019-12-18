  @extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Class Fee Structure Reports<small></small> </h1> 
    </section>  
    <section class="content">  
      <div class="box"> 
        <div class="box-body">
           <form action="{{ route('admin.finance.class.fee.structure.report.show') }}" method="post"  no-reset="true" target="blank">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-lg-4">
                <label>Academic Year</label>
                <select name="academic_year_id" class="form-control" required="required">
                  <option selected disabled>Select Academic Year</option>
                  @foreach ($academicYears as $academicYear)
                    <option value="{{ $academicYear->id }}">{{ $academicYear->name }}</option> 
                  @endforeach 
                </select>
              </div>
              <div class="col-lg-2" style="margin-top: 24px">
                <label>Page Break</label>
                <input type="checkbox" name="checked" value="page-break"> 
               </div>
               <div class="col-lg-2" style="margin-top: 24px" style="margin-left: 10px">
                <input type="submit" class="btn btn-success" value="Show"> 
               </div> 
            </div> 
           </form>
           <div id="class_fee_structure_result">
              
           </div> 
        </div>
      </div>
    </section>
    <!-- /.content -->

@endsection
 
 
     
 
 