@extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header">
     
    <h1>Ticket Card <small></small> </h1>
       @includeIf('admin.include.hot_menu', ['menu_type_id' => 17])   
    </section>  
    <section class="content">
          <div class="box"> 
            <div class="box-body">
            <form action="{{ route('admin.library.ticket.card.generate') }}" method="post">
              {{ csrf_field() }} 
              <div class="row">
                <div class="col-lg-4">
                  <label>Ticket No</label>
                  <select name="ticket_no[]" class="form-control multiselect" multiple="multiple">
                     
                    @foreach ($memberTicketDetails as $memberTicketDetail)
                       <option value="{{ $memberTicketDetail->ticket_no }}">{{ $memberTicketDetail->ticket_no }}</option> 
                    @endforeach
                  </select>
                </div> 
                <div class="col-lg-2 text-center" style="padding-top: 25px">
                  <input type="submit" value="Generate" class="btn btn-success">
                </div>

              </div>
              </form> 
            </div> 
          </div> 
           
    </section>
   
@endsection
 
