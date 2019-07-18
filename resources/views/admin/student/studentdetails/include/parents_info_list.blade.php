<table class="table-responsive" id="parents_items"> 
                        <thead>
                            <tr>
                                <th><span class="text-nowrap">Name </span></th>
                                <th><span class="text-nowrap">Relation </span></th>
                                <th><span class="text-nowrap">Education </span></th>
                                <th><span class="text-nowrap">Occupation </span></th>
                                <th><span class="text-nowrap">Income </span></th>
                                <th><span class="text-nowrap">Mobile </span></th>
                                <th><span class="text-nowrap">Email </span></th>
                                <th><span class="text-nowrap">Date Of Birth </span></th>
                                <th><span class="text-nowrap">Date Of Anniversary </span></th>
                                <th><span class="text-nowrap">Office Address </span></th>
                                <th><span class="text-nowrap">Islive </span></th>
                                <th><span class="text-nowrap">Photo </span></th>
                                <th><span class="text-nowrap" style="margin:5px">Action </span></th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            @foreach (App\Model\ParentsInfo::where('student_id',$student)->get() as $parents) 
                            <tr>
                                <td>{{ $parents->name }}</td>
                                <td>{{ $parents->relationType->name or ''}}</td>
                                <td>{{ $parents->education }}</td>
                                <td>{{ $parents->profetions->name or '' }}</td>
                                <td>{{ $parents->incomes->name or ''}}</td>
                                <td>{{ $parents->mobile }}</td>
                                <td>{{ $parents->email }}</td>
                                <td>{{ $parents->dob }}</td>
                                <td>{{ $parents->doa }}</td>
                                <td>{{ $parents->office_address }}</td>
                                <td>{{ $parents->islive == 1? 'Yes' : 'No' }}</td>                            
                                                        
                                 
                                <td>
                                  @php
                             $image = route('admin.parents.image.show',$parents->photo);
                              
                             @endphp 
                               <img  sc="{{ ($parents->photo)? $image : asset('profile-img/user.png') }}" style="width: 50px; height: 50px;  border: 2px solid #d1f7ec">

                                </td>
        

                                <td width="150px;">
                                    {{-- <a class="btn btn-warning btn-xs"  title="Edit Parents"><i class="fa fa-edit"></i></a> --}}
                                    
                                   {{--  <a href="{{ route('admin.parents.image',$parents->id) }}" title="" class="btn btn-success btn-xs"><i class="fa fa-image"></i></a> --}}

                                    <button type="button" title="Upload Image" class="btn_parents_image btn btn-info btn-xs" data-toggle="modal" data-id="{{ $parents->id }}" data-target="#image_parent"><i class="fa fa-image"></i> </button>

                                    <button class="btn_medical_view btn btn-warning btn-xs"  onclick="callPopupLarge(this,'{{ route('admin.parents.edit',$parents->id) }}')" data-id=""  ><i class="fa fa-edit"></i></button>

                                    <button class="btn btn-danger btn-xs" button-click="parent_info" title="Delete" onclick="return confirm('Are you Sure delete'),callAjax(this,'{{ route('admin.parents.delete',$parents->id) }}')"  ><i class="fa fa-trash"></i></button>

                                                     
                                </td>                          
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
                    <div class="text-center">
                     <button type="button" onclick="$('#medical_info').click()" class="btn btn-success btn-sm">Next</button> 
                     </div> 