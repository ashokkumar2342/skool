  <table id="event_type_data_table" class="table table-bordered table-striped table-hover table-responsive"> 
               <thead>
                 <tr> 
                   <th class="text-nowrap">Award Name</th> 
                   <th class="text-nowrap">Photo</th> 
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>
                @foreach ($awardPhotos as $awardPhotos) 
                 <tr>
                   <td >{{ $awardPhotos->awardPhoto->award_name }}</td> 
                   <td><img src="{{ url('storage/student/bookimage/'.$awardPhotos->award_photo) }}"  title="" width="50" height="50" /> </td> 
                   <td>
                     <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.award.photo.edit',Crypt::encrypt($awardPhotos->id)) }}')"><i class="fa fa-edit"></i></button>

                        <a href="{{ route('admin.award.photo.delete',Crypt::encrypt($awardPhotos->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

                   </td> 
                 </tr>
                @endforeach
               </tbody>
             </table> 