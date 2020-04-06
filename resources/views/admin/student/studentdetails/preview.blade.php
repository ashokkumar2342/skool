@php
$routeName= Route::currentRouteName(); 
$profile = route('admin.student.image',$student->picture);
@endphp
<div class="modal-dialog" style="width:70%">
    <div class="modal-content" style="padding:10px;margin-top: -20px">
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <div class="panel panel-default">
            <div class="panel-heading">Student's Details</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-4">
                                Name 
                            </div>
                            <div class="col-lg-8">
                                <b>{{ $student->name }}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                Nick Name  
                            </div>
                            <div class="col-lg-8">
                                <b>{{ $student->nick_name }}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                Class  
                            </div>
                            <div class="col-lg-8">
                                <b>{{ $student->classes->name or '' }}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                Section  
                            </div>
                            <div class="col-lg-8">
                                <b>{{ $student->sectionTypes->name or '' }}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                Registration No.  
                            </div>
                            <div class="col-lg-8">
                                <b>{{ $student->registration_no }}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                Admission No.  
                            </div>
                            <div class="col-lg-8">
                                <b>{{ $student->admission_no }}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                Roll No. 
                            </div>
                            <div class="col-lg-8">
                                <b>{{ $student->roll_no }}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                Date of Admission 
                            </div>
                            <div class="col-lg-8">
                                <b>{{ date('d-m-Y',strtotime($student->date_of_admission))}}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                Date of Activation 
                            </div>
                            <div class="col-lg-8">
                                <b>{{ date('d-m-Y',strtotime($student->date_of_activation))}}</b>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-center">
                        <img  src="{{ ($student->picture)? $profile : asset('profile-img/user.png') }}" alt="" width="130px" height="153px" style="border:2px solid #908686;"> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        Email 
                    </div>
                    <div class="col-lg-4">
                        <b>{{ $student->addressDetails->address->primary_email or ''}}</b>
                    </div>
                    <div class="col-lg-2">
                        Date of Birth 
                    </div>
                    <div class="col-lg-3">
                        <b>{{date('d-M-Y',strtotime($student->dob ))}}</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        Mobile No. 
                    </div>
                    <div class="col-lg-4">
                        <b>{{ $student->addressDetails->address->primary_mobile or ''}}</b>
                    </div>
                    <div class="col-lg-2">
                        Aadhaar No. 
                    </div>
                    <div class="col-lg-3">
                        <b>{{$student->adhar_no}}</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        Gender 
                    </div>
                    <div class="col-lg-4">
                        <b>{{ $student->genders->genders or '' }}</b>
                    </div>
                    <div class="col-lg-2">
                        House Name 
                    </div>
                    <div class="col-lg-3">
                        <b>{{$student->houses->name or ''}}</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        State 
                    </div>
                    <div class="col-lg-4">
                        <b>{{ $student->addressDetails->address->state or ''}}</b>
                    </div>
                    <div class="col-lg-2">
                        City 
                    </div>
                    <div class="col-lg-3">
                        <b>{{ $student->addressDetails->address->city or ''}}</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        Permanent Address 
                    </div>
                    <div class="col-lg-9">
                        <b>{{ $student->addressDetails->address->p_address or ''}}</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        Permanent Pincode 
                    </div>
                    <div class="col-lg-9">
                        <b>{{ $student->addressDetails->address->p_pincode or ''}}</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        Correspond Address 
                    </div>
                    <div class="col-lg-9">
                        <b>{{ $student->addressDetails->address->c_address or ''}}</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        Correspond Pincode 
                    </div>
                    <div class="col-lg-9">
                        <b>{{ $student->addressDetails->address->c_pincode or ''}}</b>
                    </div>
                </div>
            </div>
        </div>
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
                            <div class="col-lg-4">
                                Name 
                            </div>
                            <div class="col-lg-8">
                                <b>{{ $parent->parentInfo->name  or ''}}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                Mobile No.  
                            </div>
                            <div class="col-lg-8">
                                <b>{{ $parent->parentInfo->mobile or ''}}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                              Date of Birth    
                            </div>
                            <div class="col-lg-8">
                                <b>{{ date('d-m-Y', strtotime($parent->parentInfo->dob or ''))}}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                Date of Anniversary  
                            </div>
                            <div class="col-lg-8">
                                <b>{{ date('d-m-Y', strtotime($parent->parentInfo->doa or ''))}}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                Education.  
                            </div>
                            <div class="col-lg-8">
                                <b>{{ $parent->parentInfo->education or ''}}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                Profession  
                            </div>
                            <div class="col-lg-8">
                                <b>{{ $parent->parentInfo->profetions->name or ''}}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                Annual Income  
                            </div>
                            <div class="col-lg-8">
                                <b>{{ $parent->parentInfo->incomes->range or ''}}</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                Alive 
                            </div>
                            <div class="col-lg-8">
                                <b>{{ $parent->parentInfo->islive == 1? 'Yes' : 'No' }}</b>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-center">
                        <img  src="{{ $image }}" alt="" width="130px" height="153px" style="border:2px solid #908686;"> 
                    </div>
                </div>
               
                
                <div class="row">
                    <div class="col-lg-3">
                        Office Address 
                    </div>
                    <div class="col-lg-9">
                        <b>{{ $parent->parentInfo->office_address or ''}}</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        Organization Name 
                    </div>
                    <div class="col-lg-9">
                        <b>{{ $parent->parentInfo->organization_address or ''}}</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        Designation 
                    </div>
                    <div class="col-lg-9">
                        <b>{{ $parent->parentInfo->f_designation or ''}}</b>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @php
$studentMedicalDetails=App\Model\StudentMedicalInfo::where('student_id',$student->id)->first();
@endphp 
@foreach($studentMedicalInfos as $studentMedicalInfo)
    <div class="panel panel-default">
            <div class="panel-heading">Medicals Details</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-3">
                        On Date 
                    </div>
                    <div class="col-lg-3">
                        <b>{{ Carbon\Carbon::parse($studentMedicalInfo->ondate)->format('d-m-Y') }}</b>
                    </div>
                    <div class="col-lg-3">
                        Blood Group 
                    </div>
                    <div class="col-lg-3">
                        <b>{{ $studentMedicalInfo->bloodgroups->name or ''}}</b> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        HB 
                    </div>
                    <div class="col-lg-3">
                        <b>{{ $studentMedicalInfo->hb }}</b>
                    </div>
                    <div class="col-lg-3">
                        BP 
                    </div>
                    <div class="col-lg-3">
                        <b>{{ $studentMedicalInfo->bp_uper }}/{{ $studentMedicalInfo->bp_lower }}</b> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                         Height
                    </div>
                    <div class="col-lg-3">
                        <b>{{ $studentMedicalInfo->height }}</b> 
                    </div>
                    <div class="col-lg-3">
                         Weight
                    </div>
                    <div class="col-lg-3">
                        <b>{{ $studentMedicalInfo->weight }}</b> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                         Complexion
                    </div>
                    <div class="col-lg-3">
                        <b>{{ $studentMedicalInfo->complextions->name or '' }}</b> 
                    </div>
                    <div class="col-lg-3">
                         Dental
                    </div>
                    <div class="col-lg-3">
                        <b>{{ $studentMedicalInfo->dental }}</b> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                         Physical Handicapped
                    </div>
                    <div class="col-lg-9">
                         <b>{{ $studentMedicalInfo->ishandicapped==1?'Yes' :'No' }} &nbsp;&nbsp;&nbsp;{{ $studentMedicalInfo->handi_percent }}% &nbsp;&nbsp;&nbsp;{{ $studentMedicalInfo->physical_handicapped }}</b>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-lg-3">
                         Allergy
                    </div>
                    <div class="col-lg-9">
                         <b>{{ $studentMedicalInfo->isalgeric==1?'Yes' :'No' }} &nbsp;&nbsp;&nbsp;{{ $studentMedicalInfo->alergey }} &nbsp;&nbsp;&nbsp;{{ $studentMedicalInfo->alergey_vacc }}</b>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-lg-3">
                         ID Mark 1
                    </div>
                    <div class="col-lg-9">
                         <b>{{ $studentMedicalInfo->id_marks1 }}</b>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-lg-3">
                         ID Mark 2
                    </div>
                    <div class="col-lg-9">
                         <b>{{ $studentMedicalInfo->id_marks2 }}</b>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-lg-3">
                         Vision
                    </div>
                    <div class="col-lg-9">
                         <b>{{ $studentMedicalInfo->vision }}</b>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-lg-3">
                         Narration
                    </div>
                    <div class="col-lg-9">
                         <b>{{ $studentMedicalInfo->narration }}</b>
                    </div>                    
                </div>
            </div>
        </div>
      @endforeach
      <div class="panel panel-success">
    <div class="panel-heading">Sibling's Details</div>
    <div class="panel-body">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Registration No.</th>
                        <th>Class</th>
                        <th>Section</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($studentSiblingInfos as $studentSiblingInfo)
                    <tr>
                        <td>{{ $studentSiblingInfo->studentSiblings->name or ''  }}</td>
                        <td>{{ $studentSiblingInfo->studentSiblings->registration_no or ''  }}</td>
                        <td>{{ $studentSiblingInfo->studentSiblings->classes->name  or '' }}</td>
                        <td>{{ $studentSiblingInfo->studentSiblings->sectionTypes->name or ''   }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>
@php
$studentSubjectDetails=App\Model\StudentSubject::where('student_id',$student->id)->first();
@endphp
<div class="panel panel-success">
    <div class="panel-heading">Subject's Details</div>
    <div class="panel-body">
        <div class="row">
            <table class="table"> 
            <thead>
            <tr>
            <th>Subject Name</th>
            <th>ISOptional</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($studentSubjects as $studentSubject)

            <tr>
            <td> {{ $studentSubject->SubjectTypes->name or '' }}</td>
            <td>{{ $studentSubject->ISOptionals->name or ''}}</td>
            </tr>
            @endforeach 

            </tbody>
            </table>
        </div>
    </div>          
    </div>
</div>
