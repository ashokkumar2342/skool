<table class="table-responsive" id="parents_items"> 
                        <thead>
                            <tr>
                                <th><span class="text-nowrap">Name </span></th>
                                <th><span class="text-nowrap">Relation </span></th>
                                <th><span class="text-nowrap">Education </span></th>
                                <th><span class="text-nowrap">Occupation </span></th>
                                <th><span class="text-nowrap">Income </span></th>
                                <th><span class="text-nowrap">Mobile No</span></th>
                                <th><span class="text-nowrap">E-mail ID</span></th>
                                <th><span class="text-nowrap">Date Of Birth </span></th>
                                <th><span class="text-nowrap">Date Of Anniversary </span></th>
                                <th><span class="text-nowrap">Organization Address </span></th>
                                <th><span class="text-nowrap">Islive </span></th>
                                <th><span class="text-nowrap">Photo </span></th>
                                <th><span class="text-nowrap" style="margin:5px">Action </span></th>
                            </tr>
                        </thead>
                        <tbody> 
                           @foreach ($student->parents as $parent)
                            <tr>
                                <td>{{ $parent->parentInfo->name }}</td>
                                <td>{{ $parent->relation->name or ''}}</td>
                                <td>{{ $parent->parentInfo->education or ''}}</td>
                                <td>{{ $parent->parentInfo->profetions->name or '' }}</td>
                                <td>{{ $parent->parentInfo->incomes->range or ''}}</td>
                                <td>{{ $parent->parentInfo->mobile or ''}}</td>
                                <td>{{ $parent->parentInfo->email or ''}}</td>
                                <td>{{ $parent->parentInfo->dob!=null?date('d-m-Y',strtotime( $parent->parentInfo->dob)):'' }}</td>
                                <td>{{ $parent->parentInfo->doa!=null?date('d-m-Y',strtotime( $parent->parentInfo->doa)): '' }}</td>
                                <td>{{ $parent->parentInfo->organization_address or ''}}</td>
                                <td>{{ $parent->parentInfo->islive == 1? 'Yes' : 'No' }}</td>                            
                                                        
                                 
                                <td>
                                  @php
                             $image = route('admin.parents.image.show',$parent->parentInfo->id);
                             
                             @endphp 
                            <img  class="profile-user-img img-responsive img-circle" src="{{ ($image)? $image : asset('profile-img/user.png') }}" alt="{{ $parent->name }}">

                               

                                </td>
        

                                <td width="150px;">
                                    {{-- <a class="btn btn-warning btn-xs"  title="Edit Parents"><i class="fa fa-edit"></i></a> --}}
                                    
                                   {{--  <a href="{{ route('admin.parents.image',$parents->id) }}" title="" class="btn btn-success btn-xs"><i class="fa fa-image"></i></a> --}}

                                    <button type="button" title="Upload Image" class="btn_parents_image btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.parents.image',$parent->parentInfo->id) }}')"><i class="fa fa-image"></i> </button>

                                    <button class="btn_medical_view btn btn-warning btn-xs"  onclick="callPopupLarge(this,'{{ route('admin.parents.edit',$parent->parentInfo->id) }}')" data-id=""  ><i class="fa fa-edit"></i></button>

                                    <button class="btn btn-danger btn-xs" success-popup="true" button-click="parent_info_tab" title="Delete" onclick="return confirm('Are you Sure delete'),callAjax(this,'{{ route('admin.parents.delete',$parent->parentInfo->id) }}')"  ><i class="fa fa-trash"></i></button>

                                                     
                                </td>                          
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
                    <div class="text-center">
                     <button type="button" onclick="$('#sibling_info_tab').click()" class="btn btn-success btn-sm">Previous</button> 
                     <button type="button" onclick="$('#address_info').click()" class="btn btn-success btn-sm">Next</button> 
                     </div> 