<table class="table" id="subject_items">                         
                       <thead>
                           <tr>
                               <th>Subject Name</th>
                               <th>ISOptional</th>
                               <th>Action</th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach ($studentSubjects as $studentSubject) 
                          <tr>
                              <td>{{ $studentSubject->SubjectTypes->name or ''}}</td>
                              <td>{{ $studentSubject->ISOptionals->name or ''}}</td>                             
                              <td>
                                {{-- <button class="btn_student_subject_edit btn btn-warning btn-xs"  data-id="{{ $studentSubject->id }}"  ><i class="fa fa-edit"></i></button>   --}}
                                  
                                    <a href="#" button-click="subject_tab" success-popup="true" onclick="callAjax(this,'{{ route('admin.studentSubject.delete',$studentSubject->id) }}')" title="Delete"class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i></a>
                          </tr>
                         @endforeach
                       </tbody>
                   </table>