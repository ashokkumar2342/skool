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
                                 <button class="btn_sibling_edit btn btn-warning btn-xs"  data-id="{{ $studentSiblingIdFind->id }}"  ><i class="fa fa-edit"></i></button>  
                                  <button class="btn_sibling_delete btn btn-danger btn-xs" onclick="return confirm('Are you Sure delete')" data-id="{{ $studentSiblingIdFind->id }}"  ><i class="fa fa-trash"></i></button>
                              </td>

                                                               
                          </tr>
                          @endforeach
                        
                      </tbody>
                  </table>
                 
                  <div class="text-center">
                     <button type="button" onclick="$('#subject_tab').click()" class="btn btn-success btn-sm">Next</button> 
                  </div>