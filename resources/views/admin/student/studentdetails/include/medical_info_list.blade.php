  <!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<style type="text/css" media="screen">
     
    li{
        padding-bottom: 2px;
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
              <div class="col-lg-4">
                <li>Ondate :- <b>{{ Carbon\Carbon::parse($medicalInfo->ondate)->format('d-m-Y') }}</b></li>
                <li>Blood Group :-<b> {{ $medicalInfo->bloodgroups->name or ''}} </b> </li>
                <li>HB :-<b> {{ $medicalInfo->hb }} </b> </li>
                <li>Weight :- <b>{{ $medicalInfo->weight }}</b></li> 
                 <li>Vision :- <b>{{ $medicalInfo->vision }}</b></li>
                 <li>BP Upper :-<b> {{ $medicalInfo->bp_uper }}</b> </li>   
                  
                  
              </div>
              <div class="col-lg-4"> 
                <li>Physical Handicapped :- <b>{{ $medicalInfo->physical_handicapped }}</b></li>
                <li>Percent:- <b>{{ $medicalInfo->handi_percent }}</b></li>
                <li>Ishandicapped:-<b> {{ $medicalInfo->ishandicapped }} </b> </li>
                 <li>Height :- <b>{{ $medicalInfo->height }}</b></li> 
                <li>Narration :-<b> {{ $medicalInfo->narration }} </b> </li>
                <li> Bp Lower :-<b> {{ $medicalInfo->bp_lower }} </b> </li>
                <li>Complextion :- <b>{{ $medicalInfo->complextions->name or '' }}</b></li> 
                 
              </div>
              <div class="col-lg-4">
                 <li>Alergey :- <b>{{ $medicalInfo->alergey }}</b></li>  
                 <li>Isalgeric :- <b>{{ $medicalInfo->isalgeric }}</b></li>  
                 <li>Alergey Vacc :- <b>{{ $medicalInfo->alergey_vacc }}</b></li>  
                <li>Dental :-<b> {{ $medicalInfo->dental }} </b> </li> 
                <li>ID Marks1 :-<b>{{ $medicalInfo->id_marks1 }} </b> </li> 
                <li>ID Marks2 :-<b>{{ $medicalInfo->id_marks2 }} </b> </li> 
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