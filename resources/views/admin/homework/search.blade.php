<table id="homework_table" class="display table">                     
                        <thead>
                            <tr>
                                <th class="text-nowrap">Sr.no.</th>
                                <th class="text-nowrap">Date</th>
                                <th class="text-nowrap">Class</th>
                                <th class="text-nowrap">Section</th>
                                <th class="text-nowrap">Homework</th>
                                <th class="text-nowrap">Action</th>                             
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($homeworks as $homework)
                                <tr>
                                    <td class="text-nowrap">{{ ++$loop->index}}</td>
                                    <td class="text-nowrap">{{ date('d-m-Y',strtotime($homework->created_at)) }}</td>
                                    <td class="text-nowrap">{{ $homework->classes->name or ''}}</td>
                                    <input type="text" hidden="" name="class_id[]" value="{{ $homework->class_id }}">
                                    <td class="text-nowrap">{{ $homework->sectionTypes->name or ''}}</td>
                                    <input type="text" hidden name="section_id[]" value="{{ $homework->section_id }}">
                                    <td>{!! $homework->homework !!}</td>
                                    <td class="text-nowrap">
                                        <a href="{{ route('admin.homework.download',$homework->homework_doc) }}" target="blank" title="Download" class="btn_parents_image btn btn-success btn-xs {{ $homework->homework_doc==null?'disabled':'' }}">
                                           <i class="fa fa-download "></i>
                                        </a> 

                                        <a href="#" onclick="callPopupLarge(this,'{{ route('admin.homework.view',$homework->id) }}')" target="blank" title="View" class="btn_parents_image btn btn-info btn-xs" ><i class="fa fa-eye"></i></button></a>

                                        {{--  @if(App\Helper\MyFuncs::menuPermission()->r_status == 1)
                                        <button type="button" class="btn_parents_image btn btn-info btn-xs" data-toggle="modal" data-id="{{ $homework->id }}" data-target="#image_parent"><i class="fa fa-eye"></i> </button>
                                        @endif --}}

                                        {{--  @if(App\Helper\MyFuncs::menuPermission()->w_status == 1) 
                                        <button type="button" class="homework_edit btn btn-warning btn-xs" data-toggle="modal" data-id="{{ $homework->id }}" data-target="#add_parent"><i class="fa fa-edit"></i> </button>
                                        @endif --}}

                                        {{--  @if(App\Helper\MyFuncs::menuPermission()->d_status == 1) --}}
                                          <a href="{{ route('admin.homework.delete',Crypt::encrypt($homework->id)) }}"  class="btn btn-danger btn-xs"  onclick="return confirm('Are you sure to delete this data ?');" title="Delete"><i class="fa fa-trash"></i></a> 
                                       
                                       {{--  @endif --}}
                                        <a href="{{ route('admin.homework.homework.send',$homework->id) }}" title="Send Homework" class="btn btn-primary btn-xs"><i class="btn btn-primary btn-xs fa fa-send"></i></a>
                                    </td>
                                
                                </tr>

                            @endforeach
                        </tbody>
                              

                    </table>