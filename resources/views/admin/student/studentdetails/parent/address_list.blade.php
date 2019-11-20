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
   
  @if ($address->count()==0)
    <button type="button" class="add_btn_parets btn btn-info btn-sm" onclick="callPopupLarge(this,'{{ route('admin.parents.add.address',$student_id) }}')" style="margin: 10px">Add Address</button>
 @endif 
 @foreach ($address as $addres) 
    <div class="panel panel-info" style="margin-right: 8px;margin-top: 18px">
      <div class="panel-heading">
        <h4 class="panel-title" style="margin-left: 470px">
          <a data-toggle="collapse" data-parent="#accordion" href="#parent">Address Details</a>
        </h4>
      </div>
      <div id="parent" class="panel-collapse collapse in">
        <div class="panel-body">
            <div class="row">
              <div class="col-lg-2">
                 <li>Primary Mobile No</li>
                 <li>Primary Email </li> 
                 <li>Category </li>
                 <li>Religion </li> 
                 <li>State </li>
                 <li>City</li>
                 <li>Nationality </li>
                 <li>Correspondence  Address </li>
                 <li>Correspondence  Pincode</li> 
                 <li>Permanent  Address </li> 
                 <li>Permanent Pincode </li>
              </div>
              <div class="col-lg-10">
                <li><b>{{ $addres->primary_mobile }}</b></li>
                <li><b>{{ $addres->primary_email }}</b></li>
                <li><b>{{ $addres->categories->name or ''}}</b></li>
                <li><b>{{ $addres->religions->name or ''}}</b></li>
                <li><b>{{ $addres->state }}</b></li>
                <li><b>{{ $addres->city }}</b></li>
                <li><b>{{ $addres->nationality==1?'Indian' : 'Other Country' }}</b></li> 
                <li><b>{{ $addres->c_address }}</b></li>
                <li><b>{{ $addres->c_pincode }}</b></li>  
                <li><b>{{ $addres->p_address }}</b></li> 
                <li><b>{{ $addres->p_pincode }}</b></li> 
              </div> 
                 <div class="col-lg-10 text-center" >
                    <button type="button" class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.parents.address.edit',$addres->id) }}')"><i class="fa fa-edit"></i></button>

                     <a href="#" class="btn btn-danger btn-xs" success-popup="true" button-click="address_info"  title="Delete"onclick="if (confirm('Are you Sure delete')){callAjax(this,'{{ route('admin.parents.address.delete',$addres->id) }}') } else{console_Log('cancel') }" ><i class="fa fa-trash"></i></a> 
                       
                  </div>  
                
                   
               </div> 
            </div> 
        </div>
      </div>
    </div>  
@endforeach 
</body>
</html>