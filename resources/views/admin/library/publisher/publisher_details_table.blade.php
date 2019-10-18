<table class="table table-bordered table-striped table-hover" id="publisher_table"> 
               <thead>
                 <tr>
                   <th>Publisher Code</th>
                   <th>Publisher Name</th>
                   <th>Mobile No</th>
                   <th>Email</th>
                   
                   <th>Address</th>
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>
                @foreach ($publishers as $publisher) 
                     <tr>
                       <td>{{ $publisher->code  }}</td>
                       <td>{{ $publisher->name }}</td>
                       <td>{{ $publisher->mobile_no }}</td>
                       <td>{{ $publisher->email }}</td>
                       
                       <td>{{ $publisher->address }}</td>
                       <td> 
                        <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.library.publisher.details.edit',Crypt::encrypt($publisher->id)) }}')"><i class="fa fa-edit"></i></button>

                        <a href="{{ route('admin.library.publisher.details.delete',Crypt::encrypt($publisher->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

                         
                      </td>
                     </tr>
                @endforeach
               </tbody>
             </table> 