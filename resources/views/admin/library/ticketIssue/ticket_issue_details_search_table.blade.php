 <table  class="table table-bordered table-striped table-hover"> 
              <thead>
                <tr>
                  
                  <th>Member Ship Type </th> 
                  <th>Name</th> 
                  <th>Member Ship No</th> 
                  <th>mobile no</th> 
                  <th>Ticket / Days</th>                    
                  <th>Action</th>
               </tr>
              </thead>
              <tbody>
               @foreach ($memberShipDetails as $memberShipDetail) 
                <tr>
                  <td>{{ $memberShipDetail->librarymembertype->member_ship_type or '' }}</td>
                  <td>{{ $memberShipDetail->name or '' }}</td>
                  <td>{{ $memberShipDetail->member_ship_registration_no or '' }}</td>
                  <td>{{ $memberShipDetail->mobile or '' }}</td> 
                  <td>{{ $memberShipDetail->membershipfacilitys->no_of_ticket or '' }} - {{ $memberShipDetail->membershipfacilitys->no_of_days or '' }} {{ $memberShipDetail->no_of_ticket==null?'':'Days' }} </td> 
                    
                    
                   
                   
                  <td>
                    <button class="btn btn-info btn-xs"  onclick="callPopupLarge(this,'{{ route('admin.library.ticket.add',$memberShipDetail->id)}}')"> Add Ticket</i></button>

                       

                  </td>
                   
                </tr>
               @endforeach
              </tbody>
            </table> 