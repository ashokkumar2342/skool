 
                  <table class="table" id="report_dataTable"> 
                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Registration No</th>
                                
                                
                                <th>Status</th>
                                <th>Remark</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($parents as $parent)
                           
                           
                            <tr>
                                <td>{{ $parent->id }}</td>
                                <td>{{ $parent->registration_no }}</td>
                                
                                <td>
                                  @if ($parent->active_status == 0)
                                      <span   data-parent="tr" class="label btn-info btn btn-xs">{{ 'Pending' }} </span>
                                  @elseif($parent->active_status == 1)
                                   <span   data-parent="tr" class="label btn-success btn btn-xs">{{ 'Approved' }} </span>
                                  @elseif($parent->active_status == 2)
                                  <span   data-parent="tr" class="label btn-warning btn btn-xs">{{ 'Pending' }} </span>
                                  @elseif($parent->active_status == 3)
                                  <span   data-parent="tr" class="label btn-danger btn btn-xs">{{ 'Reject' }} </span>
                                  @endif

                                </td>
                                 <td><button class="btn_add_remarks btn btn-success btn-xs" onclick="modelShow({{ $parent->id }})" data-id="{{ $parent->id }}">Remarks</button></td>
                                <td> 
                            <a class="btn btn-warning btn-xs" success-popup="true" button-click="btn_submit" onclick="callAjax(this,'{{ route('registration.cancel',$parent->id) }}','aa')"  href="#">Pending</a>
                   <a class="btn btn-danger btn-xs" success-popup="true"  button-click="btn_submit"  href="#" onclick="callAjax(this,'{{ route('registration.reject',$parent->id) }}','aa')">Reject</a>

                   <a class="btn btn-success btn-xs" success-popup="true" button-click="btn_submit" onclick="callAjax(this,'{{ route('registration.approved',$parent->id) }}','aa')"  href="#"  >Approved</a> 

                      <button type="button"   onclick="callPopupLarge(this,'{{ route('preview',Crypt::encrypt($parent->id)) }}')" class="btn btn-info btn-xs" data-toggle="modal"  ><i class="fa fa-eye"></i>View</button>
                                </td>
                            </tr>
                             @endforeach
                        </tbody>
                  </table>
                    
 