@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Book Issue <small>Details</small> </h1>
       
    </section>  
    <section class="content"> 
          <div class="box"> 
            <div class="box-body">
              <form action="{{ route('admin.library.book.issue.details.store') }}" method="post" class="add_form" success-content-id="history_book_issue" success-content-msg="true" button-click="btn_book_issue_history">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-lg-4">
                    <label>Registration No</label>
                    <select name="registration_no" button-click="btn_book_issue_history"  class="form-control select2" onchange="callAjax(this,'{{ route('admin.library.book.issue.onchange.registration.details') }}','member_ship_registration_details')">
                      <option selected disabled>Select Registration No</option> 
                      @foreach ($memberShipRegistrationDetails as $memberShipRegistrationDetail) 
                      <option value="{{ $memberShipRegistrationDetail->id }}">{{ $memberShipRegistrationDetail->member_ship_registration_no }}</option> 
                      @endforeach
                    </select> 
                  </div>
                  <div id="member_ship_registration_details"> 
                  </div>
                  <div class="col-lg-4">
                    <label>Book Accession No</label>
                    <select name="accession_no"  class="form-control select2" onchange="callAjax(this,'{{ route('admin.library.book.issue.onchange.accession.details') }}','book_accession_by_details')">
                      <option selected disabled>Select Accession No</option> 
                      @foreach ($bookAccessions as $bookAccession) 
                      <option value="{{ $bookAccession->id }}">{{ $bookAccession->accession_no }}</option> 
                      @endforeach
                    </select> 
                  </div>
                  <div id="book_accession_by_details"> 
                  </div>
                </div>
                
              </form>
           
            </div>
            

          </div> 
          <div id="history_book_issue"> 
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
     $(document).ready(function(){
        $('#books_issue_data_table').DataTable();
    });
  </script>
   
  @endpush
     
 
 