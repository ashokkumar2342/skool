 <table id="author_table" class="table table-bordered table-striped table-hover table-responsive"> 
               <thead>
                 <tr>
                   <th>Name</th>
                   <th>Mobile No</th>
                   <th>Email</th>
                   <th>Address</th>
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>
                @foreach ($authors as $author) 
                 <tr>
                   <td>{{ $author->name }}</td>
                   <td>{{ $author->mobile_no }}</td>
                   <td>{{ $author->email }}</td>
                   <td>{{ $author->address }}</td>
                   <td>
                     <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.library.author.details.edit',Crypt::encrypt($author->id)) }}')"><i class="fa fa-edit"></i></button>

                        <a href="{{ route('admin.library.author.details.delete',Crypt::encrypt($author->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

                   </td>
                    
                 </tr>
                @endforeach
               </tbody>
             </table> 