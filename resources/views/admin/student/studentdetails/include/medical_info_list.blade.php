  
                    <table class="table-responsive" id="medical_info_table">                         
                         <thead>
                             <tr>
                                 <th> <span class="text-nowrap">Ondate </span></th>
                                 <th> <span class="text-nowrap">Blood Group </span></th>
                                 <th> <span class="text-nowrap">HB </span></th>
                                 <th> <span class="text-nowrap">Weight </span></th>
                                 <th> <span class="text-nowrap">Height </span></th>
                                 
                                 <th> <span class="text-nowrap">Vision </span></th>
                                 <th> <span class="text-nowrap">Complextion </span></th>
                                 <th> <span class="text-nowrap">Alergey </span></th>
                                 <th> <span class="text-nowrap">Alergey Vacc </span></th>
                                 <th> <span class="text-nowrap">Physical Handicapped </span></th>
                                 <th> <span class="text-nowrap">Narration </span></th>
                                 <th> <span class="text-nowrap">Dental </span></th>
                                 <th> <span class="text-nowrap">BP Upper</span></th>
                                 <th> <span class="text-nowrap">BP Lower</span></th>
                                 <th> <span class="text-nowrap">Id Marks1 </span></th>
                                 <th> <span class="text-nowrap">Id Marks2 </span></th>
                                 <th> <span class="text-nowrap"  style="margin :35px">Action </span></th>
                             </tr>
                         </thead>
                         <tbody>
                            @foreach (App\Model\StudentMedicalInfo::where('student_id',$student)->get() as $medicalInfo)
                             <tr>
                                 <td>{{ Carbon\Carbon::parse($medicalInfo->ondate)->format('d-m-Y') }}</td>
                                 <td>{{ $medicalInfo->bloodgroups->name or ''}}</td>
                                 <td>{{ $medicalInfo->hb }}</td>
                                 <td>{{ $medicalInfo->weight }}</td>
                                 <td>{{ $medicalInfo->height }}</td>
                                 
                                 <td>{{ $medicalInfo->vision }}</td>
                                 <td>{{ $medicalInfo->complextion }}</td>
                                 <td>{{ $medicalInfo->alergey }}</td>
                                 <td>{{ $medicalInfo->alergey_vacc }}</td>
                                 <td>{{ $medicalInfo->physical_handicapped }}</td>
                                 <td>{{ $medicalInfo->narration }}</td>
                                 <td>{{ $medicalInfo->dental }}</td>                                  
                                 <td>{{ $medicalInfo->bp_uper }}</td> 
                                 <td>{{ $medicalInfo->bp_lower }}</td> 
                                 <td>{{ $medicalInfo->id_marks1 }}</td>
                                 <td>{{ $medicalInfo->id_marks2 }}</td>
                                 <td style="width: 100px"> 
                                  <button class="btn_medical_view btn btn-info btn-xs"  onclick="callPopupLarge(this,'{{ route('admin.medical.view',$medicalInfo->id) }}')" data-id=""  ><i class="fa fa-eye"></i></button>

                                    <button class="btn_medical_view btn btn-warning btn-xs"  onclick="callPopupLarge(this,'{{ route('admin.medical.edit',$medicalInfo->id) }}')" data-id=""  ><i class="fa fa-edit"></i></button>

                                     <button class="btn_medical_delete btn btn-danger btn-xs" button-click="medical_info_tab" onclick="return confirm('Are you Sure delete'),callAjax(this,'{{ route('admin.medical.delete',$medicalInfo->id) }}')"  ><i class="fa fa-trash"></i></button>
                                     <a href="{{ route('admin.medical.send.sms',$medicalInfo->id) }}" title="Send SMS"><i class=" btn btn-primary btn-xs fa fa-send"></i></a>
                                     <a href="{{ route('admin.medical.send.email',$medicalInfo->id) }}" title="Send Email" style="color: red"><i class="btn btn-danger btn-xs fa fa-envelope"></i></a>

                                 </td>

                                                                  
                             </tr> 
                             @endforeach
                         </tbody>
                     </table> 
                 
                     <div class="text-center">
                     <button type="button" onclick="$('#subject_tab').click()" class="btn btn-success btn-sm">Next</button>
                      <a href="{{ route('admin.medical.pdf.generate',$student) }}"  class="btn btn-success btn-sm" target="_blank" title="">PDF Generate</a> 
 
                     </div> 
                  