  <!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<style type="text/css" media="screen">
     
    li{
        padding-bottom: 4px;
        padding-left: 10px;

    }

    .page-breck{
      page-break-before:always; 
    }
  
 
    @include('admin.include.boostrap')

</style>
<body>
   
  
@foreach (App\Model\StudentMedicalInfo::where('student_id',$student)->get() as $medicalInfo)
    <div class="panel panel-info" style="margin-right: 8px">
      <div class="panel-heading">
        <h4 class="panel-title" style="margin-left: 470px">
          <a data-toggle="collapse" data-parent="#accordion" href="#parent{{ $medicalInfo->id }}">Medical Details</a>
        </h4>
      </div>
      <div id="parent{{ $medicalInfo->id }}" class="panel-collapse collapse in">
        <div class="panel-body">
            <div class="row">
              <div class="col-lg-2">
                <li>On Date</li>
                <li>Blood Group</li>
                <li>HB</li>
                <li>Weight</li> 
                 <li>Vision</li>
                 <li>BP Upper</li>
                  <li>Narration  </li> 
              </div>
              <div class="col-lg-2">
                  <li><b>{{ Carbon\Carbon::parse($medicalInfo->ondate)->format('d-m-Y') }}</b></li>
                  <li><b> {{ $medicalInfo->bloodgroups->name or ''}} </b> </li>
                  <li><b> {{ $medicalInfo->hb }} </b> </li>
                  <li><b>{{ $medicalInfo->weight }}</b></li> 
                  <li><b>{{ $medicalInfo->vision }}</b></li>
                  <li><b> {{ $medicalInfo->bp_uper }}</b> </li>
                  <li><b> {{ $medicalInfo->narration }} </b> </li> 
              </div>
              <div class="col-lg-2"> 
                <li>Physical Handicapped </li>
                <li>Percent </li>
                <li>Handicapped Description</li>
                 <li>Height   </li> 
                <li> BP Lower </li>
                <li>Complexion  </li>
              </div>
              <div class="col-lg-2"> 
                  <li><b>{{ $medicalInfo->ishandicapped==1?'Yes' :'No' }}</b></li>
                  <li><b>{{ $medicalInfo->handi_percent }}</b></li>
                  <li><b> {{ $medicalInfo->physical_handicapped }} </b> </li>
                  <li><b>{{ $medicalInfo->height }}</b></li> 
                  
                  <li><b> {{ $medicalInfo->bp_lower }} </b> </li>
                  <li><b>{{ $medicalInfo->complextions->name or '' }}</b></li> 
              </div>
              <div class="col-lg-2">
                 <li>Allergy</li> 
                 <li>Allergy Description</li> 
                 <li>Allergy Vaccine</li>  
                <li>Dental</li> 
                <li>ID Marks1 </li> 
                <li>ID Marks2 </li>
              </div>
              <div class="col-lg-2">
                <li><b>{{ $medicalInfo->isalgeric==1?'Yes' :'No' }}</b></li>  
                <li><b>{{ $medicalInfo->alergey }}</b></li>  
                <li><b>{{ $medicalInfo->alergey_vacc }}</b></li>  
                <li><b>{{ $medicalInfo->dental }} </b> </li> 
                <li><b>{{ $medicalInfo->id_marks1 }} </b> </li> 
                <li><b>{{ $medicalInfo->id_marks2 }} </b> </li> 
              </div>
                 <div class="col-lg-10 text-center" style="margin-top: 10px">
                    <button class="btn_medical_view btn btn-info btn-xs"  onclick="callPopupLarge(this,'{{ route('admin.medical.view',$medicalInfo->id) }}')" data-id=""  ><i class="fa fa-eye"></i></button>

                                    <button class="btn_medical_view btn btn-warning btn-xs"  onclick="callPopupLarge(this,'{{ route('admin.medical.edit',$medicalInfo->id) }}')" data-id=""  ><i class="fa fa-edit"></i></button>

                                     <button class="btn_medical_delete btn btn-danger btn-xs" button-click="medical_info_tab" onclick="return confirm('Are you Sure delete'),callAjax(this,'{{ route('admin.medical.delete',$medicalInfo->id) }}')"  ><i class="fa fa-trash"></i></button>
                                     <a href="{{ route('admin.medical.send.sms',$medicalInfo->id) }}" title="Send SMS"><i class=" btn btn-primary btn-xs fa fa-send"></i></a>
                                     <a href="{{ route('admin.medical.send.email',$medicalInfo->id) }}" title="Send Email" style="color: red"><i class="btn btn-danger btn-xs fa fa-envelope"></i></a>
                       
                   </div>  
                
                   
               </div> 
            </div> 
        </div>
      </div>
    </div>  
@endforeach 
</body>
</html>