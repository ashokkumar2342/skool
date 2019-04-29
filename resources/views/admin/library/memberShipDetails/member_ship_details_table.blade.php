<table id="library_member_ship_details_data_table" class="table table-bordered table-striped table-hover"> 
   <thead>
     <tr>
       <th>Member Ship Type</th>
       <th>Member Ship Facility</th>
       <th>Member Ship No</th>
       <th>Name</th>
       <th>Father's Name</th>
       <th>mobile No</th>
       <th>Email</th> 
       <th>Address</th> 
       <th>Action</th>
     </tr>
   </thead>
   <tbody>
    @foreach ($membershipdetails as $membershipdetail) 
     <tr>
       <td>{{ $membershipdetail->librarymembertype->member_ship_type }}</td>
       <td>{{ $membershipdetail->membershipfacility->member_ship_type_id }}</td> 
       <td>{{ $membershipdetail->member_ship_no }}</td> 
       <td>{{ $membershipdetail->name }}</td> 
       <td>{{ $membershipdetail->father }}</td> 
       <td>{{ $membershipdetail->mobile }}</td> 
       <td>{{ $membershipdetail->email }}</td> 
       <td>{{ $membershipdetail->address }}</td> 
        
       <td>
         <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.library.member.ship.details.edit',Crypt::encrypt($membershipdetail->id)) }}')"><i class="fa fa-edit"></i></button>

            <a href="{{ route('admin.library.member.ship.details.delete',Crypt::encrypt($membershipdetail->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

       </td>
        
     </tr>
    @endforeach
   </tbody>
 </table> 