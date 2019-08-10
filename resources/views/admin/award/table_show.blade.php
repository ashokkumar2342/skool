  <table id="event_type_data_table" class="table table-bordered table-striped table-hover table-responsive"> 
               <thead>
                 <tr>
                   <th class="text-nowrap">Registration No</th> 
                   <th class="text-nowrap">StudentStudent Name</th> 
                   <th>Class</th> 
                   <th>Section</th> 
                   <th class="text-nowrap">Award Name</th> 
                   <th>Description</th>
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>
                @foreach ($awards as $award) 
                 <tr>
                   <td >{{ $award->student->registration_no or ''}}</td> 
                   <td>{{ $award->student->name or ''}}</td> 
                   <td>{{ $award->student->classes->name or ''}}</td> 
                   <td>{{ $award->student->sectionTypes->name or ''}}</td> 
                   <td>{{ $award->award_name }}</td> 
                   <td>{{ $award->description }}</td> 
                   <td>
                     <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.award.edit',Crypt::encrypt($award->id)) }}')"><i class="fa fa-edit"></i></button>

                        <a href="{{ route('admin.award.delete',Crypt::encrypt($award->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

                   </td> 
                 </tr>
                @endforeach
               </tbody>
             </table> 