<table id="library_member_ship_registration_data_table" class="table table-bordered table-striped table-hover"> 
   <thead>
     <tr>
       <th>Member Ship Type</th>
       <th>Member Ship No</th> 
       <th>name</th>
       <th>Mobile no</th>
       <th>Ticket/Days</th>
       {{-- <th>Action</th> --}}
     </tr>
   </thead>
   <tbody>
    @foreach ($memberShipDetails as $memberShipDetail) 
     <tr>
       <td>{{ $memberShipDetail->librarymembertype->member_ship_type or '' }}</td>
       <td>{{ $memberShipDetail->member_ship_registration_no or '' }}</td> 
       <td>{{ $memberShipDetail->name or '' }}</td> 
       <td>{{ $memberShipDetail->mobile or '' }}</td>
       <td>{{ $memberShipDetail->membershipfacilitys->no_of_ticket or '' }} - {{ $memberShipDetail->membershipfacilitys->no_of_days or '' }} {{ $memberShipDetail->no_of_ticket==null?'':'Days' }} </td> 
         
        
       {{-- <td>
         <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.library.member.ship.facility.edit',Crypt::encrypt($memberShipDetail->id)) }}')"><i class="fa fa-edit"></i></button>

            <a href="{{ route('admin.library.member.ship.facility.delete',Crypt::encrypt($memberShipDetail->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

       </td> --}}
        
     </tr>
    @endforeach
   </tbody>
 </table> 