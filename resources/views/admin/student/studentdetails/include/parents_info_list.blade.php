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
   
  
@foreach ($student->parents as $parent)
    <div class="panel panel-info" style="margin-right: 8px">
      <div class="panel-heading">
        <h4 class="panel-title" style="margin-left: 350px">
          <a data-toggle="collapse" data-parent="#accordion" href="#parent{{ $parent->relation->id or ''}}">
           {{ $parent->relation->name or ''}}'s Details</a>
        </h4>
      </div>
      <div id="parent{{ $parent->relation->id or ''}}" class="panel-collapse collapse in">
        <div class="panel-body">
            <div class="row">
              <div class="col-lg-6">
                <li>Name :- <b>{{ $parent->parentInfo->name  or ''}}</b></li>
                <li>Education :-<b> {{ $parent->parentInfo->education or ''}} </b> </li>
                <li>Income Slab(Annual):-<b> {{ $parent->parentInfo->incomes->range or ''}} </b> </li>
                <li>Alive :- <b>{{ $parent->parentInfo->islive == 1? 'Yes' : 'No' }}</b></li>
                 <li>Office Address :- <b>{{ $parent->parentInfo->office_address or ''}}</b></li>  
              </div>
              <div class="col-lg-6">
                 @php
                  $image = route('admin.parents.image.show',$parent->parentInfo->id); 
                  @endphp 
                  <img  class="profile-user-img img-responsive img-circle" src="{{ ($image)? $image : asset('profile-img/user.png') }}" alt="{{ $parent->name }}" width="103px" height="103px" style="float: right; border:solid 2px Black" onclick="callPopupLarge(this,'{{ route('admin.parents.image',$parent->parentInfo->id) }}')">
                
                <li>Date of Birth :- <b>{{ date('d-m-Y', strtotime($parent->parentInfo->dob or ''))}}</b></li>
                <li>Date Of Anniversary:- <b>{{ date('d-m-Y', strtotime($parent->parentInfo->doa or ''))}}</b></li>
                <li>Mobile No:-<b> {{ $parent->parentInfo->mobile or ''}} </b> </li>
                <li>Profession :-<b> {{ $parent->parentInfo->profetions->name or ''}} </b> </li> 
              </div>
                  <div style="margin-top: 100px;">
                    <button type="button" title="Upload Image" class="btn_parents_image btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.parents.image',$parent->parentInfo->id) }}')" style="float: right;margin: 14px"><i class="fa fa-image"></i>Image Upload</button>
                        <a class="btn_web btn btn-default btn-xs" onclick="callPopupMd(this,'{{ route('admin.student.camera',$parent->parentInfo->id) }}')" href="javascript:;" style="float: right;margin-top: 14px"><i class="fa fa-camera"></i></a> 
                  </div>
              <div class="col-lg-8 text-center">
                
                   

                    <button class="btn_medical_view btn btn-warning btn-xs"  onclick="callPopupLarge(this,'{{ route('admin.parents.edit',$parent->parentInfo->id) }}')" data-id=""  ><i class="fa fa-edit"></i></button>

                    <button class="btn btn-danger btn-xs" success-popup="true" button-click="parent_info_tab" title="Delete" onclick="return confirm('Are you Sure delete'),callAjax(this,'{{ route('admin.parents.delete',$parent->parentInfo->id) }}')"  ><i class="fa fa-trash"></i></button> 
                
                   
               </div> 
            </div> 
        </div>
      </div>
    </div>  
@endforeach 
</body>
</html>