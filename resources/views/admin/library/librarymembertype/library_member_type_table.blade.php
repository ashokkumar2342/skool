<table id="library_member_ship_type_data_table" class="table table-bordered table-striped table-hover"> 
   <thead>
     <tr>
       <th>member ship type</th>
       <th>member ship code</th> 
       <th>Action</th>
     </tr>
   </thead>
   <tbody>
    @foreach ($librarymembertypes as $librarymembertype) 
     <tr>
       <td>{{ $librarymembertype->member_ship_type }}</td>
       <td>{{ $librarymembertype->member_ship_code }}</td> 
        
       <td>
         <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.library.member.type.edit',Crypt::encrypt($librarymembertype->id)) }}')"><i class="fa fa-edit"></i></button>

            <a href="{{ route('admin.library.member.type.delete',Crypt::encrypt($librarymembertype->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

       </td>
        
     </tr>
    @endforeach
   </tbody>
 </table> 