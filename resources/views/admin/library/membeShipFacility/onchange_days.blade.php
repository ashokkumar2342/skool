 <div class="col-lg-4">
  <label>No of Days</label>
  @if ($data==1)
  	 <input type="text" class="form-control" value="{{ $tickets->days or '' }}" name="">
  @endif
  {{-- <select name="no_of_days" class="form-control">
    <option selected disabled>Select Option</option> 
    @foreach ($tickets as $ticket) 
    <option value="{{ $ticket->id  }}"{{ $ticket->name==$ticket->days? 'selected="selected"' : ''  }}>{{ $ticket->days or '' }}</option>
     
    @endforeach 
  </select> --}}
</div> 