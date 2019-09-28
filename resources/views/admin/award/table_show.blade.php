  <table id="event_type_data_table" class="table table-bordered table-striped table-hover table-responsive"> 
               <thead>
                 <tr> 
                   <th class="text-nowrap">Award Name</th> 
                   <th class="text-nowrap">Rank Position</th> 
                   <th>Award Date</th>
                   <th>Last Date</th>
                   <th>Description</th>
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>
                @foreach ($awardTypes as $awardType) 
                 <tr>
                   <td >{{ $awardType->award_name }}</td> 
                   <td>{{ $awardType->rank_position}}</td> 
                   <td>{{ date('d-m-Y',strtotime($awardType->award_date))}}</td> 
                   <td>{{ date('d-m-Y',strtotime($awardType->last_date))}}</td> 
                   <td>{{ $awardType->description }}</td>
                    
                   <td>
                     <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.award.edit',Crypt::encrypt($awardType->id)) }}')"><i class="fa fa-edit"></i></button>

                        <a href="{{ route('admin.award.delete',Crypt::encrypt($awardType->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

                   </td> 
                 </tr>
                @endforeach
               </tbody>
             </table> 