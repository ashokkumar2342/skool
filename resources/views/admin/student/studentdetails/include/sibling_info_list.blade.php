 <table class="table" id="sibling_items">                         
                      <thead>
                          <tr>

                              <th><span class="text-nowrap">Sibling Registration No</span></th>
                              <th><span class="text-nowrap">Name</span></th>
                              <th><span class="text-nowrap">Class</span></th>
                              <th><span class="text-nowrap">Section</span></th>
                              <th><span class="text-nowrap">Action</span></th>
                          </tr>
                      </thead>
                      <tbody> 
                         @foreach($studentSiblingIdFind as $studentSiblingIdFind)   
                             
                          <tr> 
                              <td>{{ $studentSiblingIdFind->studentSiblings->registration_no or '' }}</td>
                              <td>{{ $studentSiblingIdFind->studentSiblings->name  or ''}}</td>
                              <td>{{ $studentSiblingIdFind->studentSiblings->classes->name  or '' }}</td>
                              <td>{{ $studentSiblingIdFind->studentSiblings->sectionTypes->name or ''  }}</td> 
                              <td>
                                {{-- <button type="button" class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.sibling.edit',$studentSiblingIdFind->student_id) }}')"><i class="fa fa-edit"></i></button></button> --}}
                                  
                                  <button class="btn btn-danger btn-xs" success-popup="true" button-click="sibling_info_tab" onclick="callAjax(this,'{{ route('admin.sibling.delete',$studentSiblingIdFind->student_id) }}')"><i class="fa fa-trash"></i></button>
                              </td>

                                                               
                          </tr>
                          @endforeach
                        
                      </tbody>
                  </table>
                 
                  <div class="text-center">
                     {{-- <button type="button" onclick="$('#student_tab').click()" class="btn btn-success btn-sm">Previous</button> 
                     <button type="button" onclick="$('#parent_info_tab').click()" class="btn btn-success btn-sm">Next</button> --}} 
                  </div>