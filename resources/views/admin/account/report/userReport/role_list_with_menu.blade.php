 <!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html/jpg/png; charset=utf-8"/>
<head>
    <style>
        @page { margin:0px; }

        .pagenum:before {
            content: counter(page);
        }
        .page-break{
          page-break-after: always;
        }

    </style>
    @include('admin.include.boostrap')
</head> 
<body>
    @include('schoolDetails.logo_header')
    <div class="row">
        <div class="col-lg-11 text-center" style="margin-left: 20px">
             <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Sr.No.</th> 
                  <th>Name</th>
                  <th>Mobile</th> 
                  <th>Email Id</th>
                  <th>Role</th>   
                  <th>Status</th>                  
                  
                </tr>
                </thead>
                <tbody>
                  @php
                  $arrayId=1;
                     
                  @endphp
                @foreach($admins as $admin)
                
                <tr style="{{ $admin->status==1?'background-color: #95e49b':'' }}">
                  <td>{{ $arrayId ++ }}</td>
                  <input type="hidden" name="user_id[]" value="{{ $admin->id }}"> 
                  <td>{{ $admin->first_name }} {{ $admin->first_last}}</td>
                  <td>{{ $admin->mobile }}</td> 
                  <td>{{ $admin->email }}</td>
                  <td>{{ $admin->roles->name }}</td> 
                   @if ($admin->status==1)
                    <td>Active</td>
                    @else
                    <td>Inactive</td>  
                    @endif 
                </tr>
                <tr>
                  <td></td>
                  <td>Main Menu Name</td>
                  <td>Sub Menu Name</td>
                  <td>R &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;W&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; D</td>
                  <td>Status</td>
                  <td></td>
                </tr>  
                @foreach ($usersmenus as $usersmenu)
                     <tr style="{{ $usersmenu->status==1?'background-color: #95e49b':'background-color: #ec2020' }}">
                      <td></td>
                      <td>{{ $usersmenu->minutypes->name }}</td> 
                      <td>{{ $usersmenu->subMenuTypes->name }}</td>
                      
                      <td>
                        @if ($usersmenu->r_status==1) Yes @else No @endif&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        @if ($usersmenu->w_status==1) Yes @else No @endif&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        @if ($usersmenu->d_status==1) Yes @else No @endif 
                      </td>
                      <td>@if ( $usersmenu->status==1) Yes @else  No @endif  </td>
                       <td></td> 
                    </tr> 
                 @endforeach 
                @endforeach
              </table>

            </div> 
        </div> 
        <div class="col-lg-4">
          <h5>
            Total Record :
            <span style="margin-top: 20px"><b>{{ $arrayId ++ -1 }}</b></span> 
          </h5>
        </div> 
        <div class="col-lg-4">
          <h5>
            Total Pages :
            <b><span class="pagenum" style="margin-top: 20px"></span></b> 
          </h5>
        </div>
        <div class="col-lg-4">
          <h5>
            End of Reports/Pages :
             
          </h5>
        </div>
       
             
    </body>

    </html>