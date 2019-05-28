@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Book Return <small>Search</small> </h1> 
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body">             
             <form action="{{ route('admin.library.book.issue.details.search') }}" method="post" class="add_form" success-content-id="book_issue_details_show" success-content-msg="true">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-lg-4">
                  <label>Accession No</label>
                  <input type="text" name="accession_no" class="form-control" placeholder="Enter Accession No"> 
                </div>
                <input type="submit" class="btn btn-success" value="Search" style="margin: 24px">
              </div>
               <div id="book_issue_details_show">
                 
               </div>
                
             </form>
              
                         
          
        </div>
      </div>
    </section> 
 @endsection
 @push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 
  @endpush
