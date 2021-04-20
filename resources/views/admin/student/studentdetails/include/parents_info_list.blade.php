 <!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body>
<div class="container-fluid">
@foreach ($student->parents as $parent) 
         @php 
         $data =storage_path('app/'.$parent->parentInfo->photo);
         $datas =storage_path('app/'.'');  
         $image = route('admin.parents.image.show',$parent->parentInfo->id);
        @endphp     
        <div class="panel panel-default">
            <div class="panel-heading">{{ $parent->relation->name or ''}}'s Details</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-4" style="padding:5px">
                                Name 
                            </div>
                            <div class="col-lg-8" style="padding:5px">
                                <b>{{ $parent->parentInfo->name  or ''}}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4" style="padding:5px">
                                Mobile No.  
                            </div>
                            <div class="col-lg-8" style="padding:5px">
                                <b>{{ $parent->parentInfo->mobile or ''}}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4" style="padding:5px">
                                Email  
                            </div>
                            <div class="col-lg-8" style="padding:5px">
                                <b>{{ $parent->parentInfo->email or ''}}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4" style="padding:5px">
                              Date of Birth    
                            </div>
                            <div class="col-lg-8" style="padding:5px">
                                <b>{{$parent->parentInfo->dob? date('d-m-Y', strtotime($parent->parentInfo->dob)) : null}}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4" style="padding:5px">
                                Date of Anniversary  
                            </div>
                            <div class="col-lg-8" style="padding:5px">
                                <b>{{$parent->parentInfo->doa? date('d-m-Y', strtotime($parent->parentInfo->doa)) : null}}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4" style="padding:5px">
                                Education.  
                            </div>
                            <div class="col-lg-8" style="padding:5px">
                                <b>{{ $parent->parentInfo->education or ''}}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4" style="padding:5px">
                                Profession  
                            </div>
                            <div class="col-lg-8" style="padding:5px">
                                <b>{{ $parent->parentInfo->profetions->name or ''}}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4" style="padding:5px">
                                Annual Income  
                            </div>
                            <div class="col-lg-8" style="padding:5px">
                                <b>{{ $parent->parentInfo->incomes->range or ''}}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4" style="padding:5px">
                                Alive 
                            </div>
                            <div class="col-lg-8" style="padding:5px">
                                <b>{{ $parent->parentInfo->islive == 1? 'Yes' : 'No' }}</b>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-xs-3 text-center">
                        <img  src="{{ ($image)? $image : asset('profile-img/user.png') }}?{{ time() }}" alt="" width="130px" height="153px" style="border:2px solid #908686;"><br>

                        <button type="button" title="Upload Image" style="margin-top: 5px" class="btn_parents_image btn btn-info btn-xs" crop-image="parent_image" onclick="callPopupLarge(this,'{{ route('admin.parents.image',$parent->parentInfo->id) }}')" ><i class="fa fa-image"></i>Image Upload</button>

                        <a class="btn_web btn btn-default btn-xs" style="margin-top: 5px" onclick="callPopupMd(this,'{{ route('admin.student.camera',$parent->parentInfo->id) }}')" href="javascript:;"><i class="fa fa-camera"></i></a> 
                    </div>
                </div>
               
                
                <div class="row">
                    <div class="col-lg-3" style="padding:5px">
                        Office Address 
                    </div>
                    <div class="col-lg-9" style="padding:5px">
                        <b>{{ $parent->parentInfo->office_address or ''}}</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3" style="padding:5px">
                        Organization Name 
                    </div>
                    <div class="col-lg-9" style="padding:5px">
                        <b>{{ $parent->parentInfo->organization_address or ''}}</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3" style="padding:5px">
                        Designation 
                    </div>
                    <div class="col-lg-9" style="padding:5px">
                        <b>{{ $parent->parentInfo->f_designation or ''}}</b>
                    </div>
                </div>
                <div class="col-lg-10 text-center" style="margin-top: 10px">
                    <button class="btn_medical_view btn btn-warning btn-xs"  onclick="callPopupLarge(this,'{{ route('admin.parents.edit',$parent->parentInfo->id) }}')" data-id=""  ><i class="fa fa-edit"></i></button>

                    <button class="btn btn-danger btn-xs" success-popup="true" button-click="parent_info_tab" title="Delete" onclick="if (confirm('Are you Sure delete')){callAjax(this,'{{ route('admin.parents.delete',$parent->parentInfo->id) }}') } else{console_Log('cancel') }"  ><i class="fa fa-trash"></i></button>
               </div> 
            </div>
        </div>
    @endforeach 
  </div>
</body>
</html>