   <!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>

</head>

<body>
   
  @if ($address->count()==0)
    <button type="button" class="add_btn_parets btn btn-info btn-sm" onclick="callPopupLarge(this,'{{ route('admin.parents.add.address',$student_id) }}')" style="margin: 10px">Add Address</button>
 @endif 
 @foreach ($address as $addres) 
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#parent">Address Details</a>
        </h4>
      </div>
      <div id="parent" class="panel-collapse collapse in">
        <div class="panel-body">
            <div class="row">
              <div class="col-lg-3">
                 <li style="padding:5px">Primary Mobile No</li>
                 <li style="padding:5px">Primary Email </li> 
                 <li style="padding:5px">Category </li>
                 <li style="padding:5px">Religion </li> 
                 <li style="padding:5px">State </li>
                 <li style="padding:5px">City</li>
                 <li style="padding:5px">Nationality </li>
                 <li style="padding:5px">Correspondence  Address </li>
                 <li style="padding:5px">Correspondence  Pincode</li> 
                 <li style="padding:5px">Permanent  Address </li> 
                 <li style="padding:5px">Permanent Pincode </li>
              </div>
              <div class="col-lg-9">
                <li style="padding:5px"><b>{{ $addres->primary_mobile }}</b></li>
                <li style="padding:5px"><b>{{ $addres->primary_email }}</b></li>
                <li style="padding:5px"><b>{{ $addres->categories->name or ''}}</b></li>
                <li style="padding:5px"><b>{{ $addres->religions->name or ''}}</b></li>
                <li style="padding:5px"><b>{{ $addres->state }}</b></li>
                <li style="padding:5px"><b>{{ $addres->city }}</b></li>
                <li style="padding:5px"><b>{{ $addres->nationality==1?'Indian' : 'Other Country' }}</b></li> 
                <li style="padding:5px"><b>{{ $addres->c_address }}</b></li>
                <li style="padding:5px"><b>{{ $addres->c_pincode }}</b></li>  
                <li style="padding:5px"><b>{{ $addres->p_address }}</b></li> 
                <li style="padding:5px"><b>{{ $addres->p_pincode }}</b></li> 
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