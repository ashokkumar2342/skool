<table class="table" id="document_items">                         
                      <thead>
                          <tr>
                              <th>Document Type Name</th>
                              <th>Doc Name</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($documents as $document) 
                          <tr>
                              <td>{{ $document->documentTypes->name or ''}}</td>
                              <td>{{ $document->name }}</td>                             
                              <td> 
                                  
                                 <a href="{{ route('admin.document.download',$document->id) }}" class="btn btn-xs btn-success" title="" target="blank"><i class="fa fa-download"></i></a>
                                <a class="btn btn-danger btn-xs" onclick="return confirm('Are you Sure delete',callAjax(this,'{{ route('admin.document.delete',$document->id) }}'))" success-popup="true" button-click="btn_student_document_list" ><i class="fa fa-trash"></i></a></td>
                          </tr>
                         @endforeach
                      </tbody>
                  </table>