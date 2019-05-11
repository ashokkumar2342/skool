 <table id="tickets_data_table" class="table table-bordered table-striped table-hover"> 
              <thead>
                <tr>
                  
                  <th> Tickets Name</th> 
                  <th>No of Days</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
               @foreach ($tickets as $tickets) 
                <tr>
                  <td>{{ $tickets->name or '' }}</td>
                  <td>{{ $tickets->days or '' }}</td> 
                   
                   
                  <td>
                    <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.library.ticket.details.edit',Crypt::encrypt($tickets->id)) }}')"><i class="fa fa-edit"></i></button>

                       <a href="{{ route('admin.library.ticket.details.delete',Crypt::encrypt($tickets->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

                  </td>
                   
                </tr>
               @endforeach
              </tbody>
            </table> 