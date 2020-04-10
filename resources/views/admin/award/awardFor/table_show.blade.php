  <table id="event_type_data_table" class="table table-bordered"> 
               <thead>
                 <tr> 
                   <th class="text-nowrap">Award Name</th> 
                   <th class="text-nowrap">Student Name</th> 
                   <th class="text-nowrap">Rank Position</th> 
                   <th>Description</th>
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>
                @foreach ($awardfors as $awardfor) 
                 <tr>
                   <td >{{ $awardfor->awardTypes->award_name or ''}}</td> 
                   <td>{{ $awardfor->students->name or ''}}</td> 
                   <td>{{ $awardfor->rank_position}}</td> 
                   <td>{{ $awardfor->description }}</td>
                    
                   <td>
                     <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.award.for.edit',Crypt::encrypt($awardfor->id)) }}')"><i class="fa fa-edit"></i></button>

                        <a href="{{ route('admin.award.for.delete',Crypt::encrypt($awardfor->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

                   </td> 
                 </tr>
                @endforeach
               </tbody>
             </table> 