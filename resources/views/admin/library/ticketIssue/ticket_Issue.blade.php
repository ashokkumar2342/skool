@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Tickets Issue Details <small>Search</small> </h1> 
    </section>  
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box"> 
            <div class="box-body">             
             <div class="col-lg-4" id="ticket_details_show_div">
              <label>Search</label>
               <input type="text" name="search_name" id="search_name" class="form-control" onkeyup="callAjax(this,'{{ route('admin.library.ticket.issue.details.search') }}','search_id')" placeholder="Search"> 
               </div> 
                         
          </div>
          <div id="search_id">
            
          </div>
        </div> 
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
