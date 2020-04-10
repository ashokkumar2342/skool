  <!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>

<body>
   
  
@foreach (App\Model\StudentMedicalInfo::where('student_id',$student)->get() as $medicalInfo)
    <div class="panel panel-info" style="margin-right: 8px">
      <div class="panel-heading">
        <h4 class="panel-title" style="margin-left: 470px">
          <a data-toggle="collapse" data-parent="#accordion" href="#parent{{ $medicalInfo->id }}">Medical Details <b>{{ Carbon\Carbon::parse($medicalInfo->ondate)->format('d-m-Y') }}</b></a>
        </h4>
      </div>
      <div id="parent{{ $medicalInfo->id }}" class="panel-collapse collapse in">
        <div class="panel-body">
                <div class="row">
                    <div class="col-lg-3">
                        On Date 
                    </div>
                    <div class="col-lg-3">
                        <b>{{ Carbon\Carbon::parse($medicalInfo->ondate)->format('d-m-Y') }}</b>
                    </div>
                    <div class="col-lg-3">
                        Blood Group 
                    </div>
                    <div class="col-lg-3">
                        <b>{{ $medicalInfo->bloodgroups->name or ''}}</b> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        HB 
                    </div>
                    <div class="col-lg-3">
                        <b>{{ $medicalInfo->hb }}</b>
                    </div>
                    <div class="col-lg-3">
                        BP 
                    </div>
                    <div class="col-lg-3">
                        <b>{{ $medicalInfo->bp_uper }}/{{ $medicalInfo->bp_lower }}</b> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                         Height
                    </div>
                    <div class="col-lg-3">
                        <b>{{ $medicalInfo->height }}</b> 
                    </div>
                    <div class="col-lg-3">
                         Weight
                    </div>
                    <div class="col-lg-3">
                        <b>{{ $medicalInfo->weight }}</b> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                         Complexion
                    </div>
                    <div class="col-lg-3">
                        <b>{{ $medicalInfo->complextions->name or '' }}</b> 
                    </div>
                    <div class="col-lg-3">
                         Dental
                    </div>
                    <div class="col-lg-3">
                        <b>{{ $medicalInfo->dental }}</b> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                         Physical Handicapped
                    </div>
                    <div class="col-lg-9">
                         <b>{{ $medicalInfo->ishandicapped==1?'Yes' :'No' }} &nbsp;&nbsp;&nbsp;{{ $medicalInfo->handi_percent }}% &nbsp;&nbsp;&nbsp;{{ $medicalInfo->physical_handicapped }}</b>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-lg-3">
                         Allergy
                    </div>
                    <div class="col-lg-9">
                         <b>{{ $medicalInfo->isalgeric==1?'Yes' :'No' }} &nbsp;&nbsp;&nbsp;{{ $medicalInfo->alergey }} &nbsp;&nbsp;&nbsp;{{ $medicalInfo->alergey_vacc }}</b>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-lg-3">
                         ID Mark 1
                    </div>
                    <div class="col-lg-9">
                         <b>{{ $medicalInfo->id_marks1 }}</b>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-lg-3">
                         ID Mark 2
                    </div>
                    <div class="col-lg-9">
                         <b>{{ $medicalInfo->id_marks2 }}</b>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-lg-3">
                         Vision
                    </div>
                    <div class="col-lg-9">
                         <b>{{ $medicalInfo->vision }}</b>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-lg-3">
                         Narration
                    </div>
                    <div class="col-lg-9">
                         <b>{{ $medicalInfo->narration }}</b>
                    </div>                    
                </div>
            <div class="col-lg-10 text-center" style="margin-top: 10px">
                <button class="btn_medical_view btn btn-warning btn-xs"  onclick="callPopupLarge(this,'{{ route('admin.medical.edit',$medicalInfo->id) }}')" data-id=""  ><i class="fa fa-edit"></i></button>

                 <button class="btn_medical_delete btn btn-danger btn-xs" button-click="medical_info_tab" onclick="if(confirm('Are you Sure delete?')){callAjax(this,'{{ route('admin.medical.delete',$medicalInfo->id) }}')} else{console_Log('cancel') }"  ><i class="fa fa-trash"></i></button>
                 <a href="{{ route('admin.medical.send.sms',$medicalInfo->id) }}" title="Send SMS"><i class=" btn btn-primary btn-xs fa fa-send"></i></a>
                 <a href="{{ route('admin.medical.send.email',$medicalInfo->id) }}" title="Send Email" style="color: red"><i class="btn btn-danger btn-xs fa fa-envelope"></i></a>
                   
               </div>  
            </div>
    </div>  
@endforeach 
</body>
</html>