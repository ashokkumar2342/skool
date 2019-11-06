  <table id="event_type_data_table" class="table table-bordered table-striped table-hover table-responsive"> 
               <thead>
                 <tr> 
                   <th class="text-nowrap">Sr.No.</th> 
                   <th class="text-nowrap">Award Level</th> 
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>
                @php
                  $ArrayId=1;
                @endphp
                @foreach ($awardLevels as $awardLevel) 
                 <tr>
                   <td >{{ $ArrayId++ }}</td> 
                   <td >{{ $awardLevel->name }}</td> 
                   
                    
                   <td>
                     <button class="btn btn-info btn-xs" title="Edit" onclick="callPopupLarge(this,'{{ route('admin.award.level.add',Crypt::encrypt($awardLevel->id)) }}')"><i class="fa fa-edit"></i></button>

                        <a href="{{ route('admin.award.level.destroy',Crypt::encrypt($awardLevel->id)) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash"></i></a>

                   </td> 
                 </tr>
                @endforeach
               </tbody>
             </table> 