<div class="table-responsive">
<table class="table table-striped table-bordered" id="sport_hobby_items">                         
                       <thead>
                           <tr>
                               <th class="text-nowrap">Sr.No.</th>
                               <th class="text-nowrap">Academic Year</th>
                               <th class="text-nowrap">Sports Activity Name</th>
                               <th>Level</th>
                               <th>Action</th>
                           </tr>
                       </thead>
                       <tbody>
                        @php
                          $arrayId=1;
                        @endphp
                        @foreach ( $sportHobbies as $sportHobby) 
                           <tr>
                               <td>{{ $arrayId++ }}</td>
                               <td>{{$sportHobby->sessions->name or ''  }}</td>
                               <td>{{ $sportHobby->sports_activity_name }}</td>
                               <td>{{ $sportHobby->awardLevel->name or '' }}</td>
                               <td>
                                <button class="btn_sport_hobby_edit btn btn-warning btn-xs"  onclick="callPopupLarge(this,'{{ route('admin.hobby.edit',$sportHobby->id) }}')"><i class="fa fa-edit"></i></button>  
                                 <button class="btn_sport_hobby_delete btn btn-danger btn-xs" success-popup="true" button-click="sport_hobbies_tab"  onclick="callAjax(this,'{{ route('admin.hobby.delete',$sportHobby->id) }}')"><i class="fa fa-trash"></i></button>
                               </td>
                           </tr>
                         @endforeach
                       </tbody>
                   </table>
  
</div>