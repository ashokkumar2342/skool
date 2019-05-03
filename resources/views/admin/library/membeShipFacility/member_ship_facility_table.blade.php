<table id="member_ship_facility_data_table" class="table table-bordered table-striped table-hover"> 
   <thead>
     <tr>
       <th>Member Ship Type</th>
       <th>No of Books</th> 
       <th>No of Days</th>
       <th>Action</th>
     </tr>
   </thead>
   <tbody>
    @foreach ($membershipfacilitys as $membershipfacility) 
     <tr>
       <td>{{ $membershipfacility->librarymembertype->member_ship_type or '' }}</td>
       <td>{{ $membershipfacility->no_of_books }}</td> 
       <td>{{ $membershipfacility->no_of_days }}</td> 
        
       <td>
         <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.library.member.ship.facility.edit',Crypt::encrypt($membershipfacility->id)) }}')"><i class="fa fa-edit"></i></button>

            <a href="{{ route('admin.library.member.ship.facility.delete',Crypt::encrypt($membershipfacility->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

       </td>
        
     </tr>
    @endforeach
   </tbody>
 </table> 