@extends('admin.layout.base')
@section('body')
<section class="content-header">
      <?php $url = route('admin.academicYear.edit') ?>
      <a class="btn btn-info btn-sm pull-right"  onclick="callPopupMd(this,'{{$url}}')">Add Academic Year</a>
      <span> <a target="_blank" href="{{ route('admin.academicYear.pdf.generate') }}" class="btn btn-success btn-sm pull-right" title="PDF Download" target="blank" style="margin-right: 10px">PDF</a></span>
    <h1>Academic Year</h1>
</section>
    <section class="content">
        <div class="box"> 
            <div class="box-body">             
                <div class="table-responsive col-md-12"> 
                  
              <table class="table table-responsive" id="table_academic_year"> 
                  <thead>
                      <tr>
                          <th class="text-nowrap">Academic Year</th>
                          <th class="text-nowrap">Start date</th>
                          <th class="text-nowrap">End date</th>
                          <th class="text-nowrap">Description</th>
                          <th class="text-nowrap">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($academicYears as $academicYear) 

                          <tr style="{{ $academicYear->status==1?'background-color: #95e49b':'' }}">
                            
                               
                              <td>{{ $academicYear->name }}</td>
                              <td>{{ date('d-m-Y',strtotime($academicYear->start_date)) }}</td>
                              <td>{{ date('d-m-Y',strtotime($academicYear->end_date))  }}</td>
                              <td>{{ $academicYear->description }}</td>
                               
                              <td class="text-nowrap">
                                @if ($academicYear->status==1)
                                  <a href="{{ route('admin.academicYear.default.value',$academicYear->id) }}" title="" class="btn-xs btn-success btn">Default</a>
                                  @else
                                  <a href="{{ route('admin.academicYear.default.value',$academicYear->id) }}" title="" class="btn-xs btn-default btn">Default</a>
                                @endif
                                 
                                @if(App\Helper\MyFuncs::menuPermission()->w_status == 1)
                                <?php $url = route('admin.academicYear.edit',Crypt::encrypt($academicYear->id)) ?>
                                <a class="btn btn-info btn-xs"  onclick="callPopupMd(this,'{{$url}}')"><i class="fa fa-edit"></i></a>
                                @endif 
                                @if(App\Helper\MyFuncs::menuPermission()->d_status==1)
                                <a href="{{ route('admin.academicYear.delete',Crypt::encrypt($academicYear->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                @endif
                              </td>
                          </tr>
                       @endforeach
                  </tbody>
              </table> 
         </div>
       </div>
     </div>
     
         
 
    </section>
    <!-- /.content -->
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css">

@endpush
 @push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
 <script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

 <script>
  $(document).ready(function() {
    $('#table_academic_year').DataTable( {
       
    } );
} );
    function callEndDate(date){
     
      var date = new Date(date);
          var newdate = new Date(date);

          newdate.setDate(newdate.getDate());
          
          var dd = newdate.getDate();
          var mm = newdate.getMonth() ;
          var y = newdate.getFullYear() + 1;

          var someFormattedDate = dd + '/' + mm + '/' + y;
          alert(someFormattedDate);
          // document.getElementById('end_date').value = someFormattedDate;
     }
   
     
    $('#btn_academic_year_create').click(function(event) {        
      $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
       $.ajax({
           url: '{{ route('admin.academicYear.store') }}',
           type: 'POST',       
           data: $('#form_academic_year').serialize() ,
      })
      .done(function(data) {
        if (data.class === 'error') {                 
             $.each(data.errors, function(index, val) {
                 toastr[data.class](val) 
             }); 
        }
          else {                 
            toastr[data.class](data.message)  
            $("#form_academic_year")[0].reset(); 
            $("#table_academic_year").load(location.href + ' #table_academic_year'); 
        } 
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      }); 
    });/////////////////isapplicable///////////////////
 
    /////////////////delete///////////////////
    $('#table_academic_year').on('click', '.btn_delete', function(event) {
      var cm = confirm("Are you Sure Delete!");
      if (cm == true) {
           event.preventDefault();  
           var id = $(this).data("id");
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });      
           $.ajax({
               url: '{{ route('admin.feeGroupDetail.delete') }}',
               type: 'delete',
               data: {id: id},
           })
           .done(function(data) {
               toastr[data.class](data.message)
               $("#table_academic_year").load(location.href + ' #table_academic_year'); 
           })
           .fail(function() {
               console.log("error");
           })
           .always(function() {
               console.log("complete");
           });
      } else {
          console.log("cancel");
      }
        
    });///////////////////edit//////////// 
     $('#fee_structure_last_date').on('click', '.btn_edit', function(event) {
         event.preventDefault();  
         $('.modal-title').text('Edit');
         $('#edit_id').val($(this).data('id'));        
         $('#edit_code').val($(this).data('code'));        
         $('#edit_name').val($(this).data('name'));        
        $('#edit_fee_account').val($(this).data('feeaccount'));   
         $('#edit_fine_scheme').val($(this).data('finescheme'));        
         $('#edit_Is_refundable').val($(this).data('refundable')); 
         $('#fee_structure_model').modal('show');
    });////////////////update/////////////
    
   
  </script>
  <script>
   $( function() {
     
     $('button').click(function(){
         $('#searchResult input:radio:checked').filter(':checked').click(function () {
           $(this).prop('checked', false);
         });
         $('.'+$(this).attr('data-click')).prop('checked', true);
       });
     });
   </script>
@endpush