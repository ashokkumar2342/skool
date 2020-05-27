 <table class="table table-striped table-bordered" id="sibling_items">                         
                      <thead>
                          <tr>

                              <th>Sr.No.</th>
                              <th>Sibling Registration No.</th>
                              <th>Name</th>
                              <th>Class</th>
                              <th>Section</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      @php
                        $arrayId=1;
                      @endphp
                      <tbody> 
                         @foreach($studentSiblingIdFind as $studentSiblingIdFind)   
                             
                          <tr> 
                              <td>{{ $arrayId++ }}</td>
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