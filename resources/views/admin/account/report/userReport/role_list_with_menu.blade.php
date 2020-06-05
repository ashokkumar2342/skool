<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html/jpg/png; charset=utf-8"/>
<head>
    <style> 
        .pagenum:before {
            content: counter(page);
        }
        .page_break{
            page-break-before:always;  
        } 
    </style>
    @include('admin.include.boostrap')
</head> 
<body > 
    @include('schoolDetails.logo_header')
    <div class="row" style="margin-top: -20px">
        <div class="panel panel-default">
            <div class="panel-heading"></div>
        </div>
          <table style="height: 164px;" width="618" class="table table-bordered  table-striped">
          <tbody>
        @foreach ($roles as $role) 
        @php 
         $admins=Illuminate\Support\Facades\DB::select(DB::raw("call up_report_role_users ('$role->id','$status')")); 
         @endphp
          <tr class="primary" style="font-size: 21px">
          <td style="width: 20px;">Role</td> 
          <td style="width: 117px;" colspan="4" class="text-center">{{ $role->name }}</td>
          </tr>
          @php
              $arrayId=1;
          @endphp
          @foreach($admins as $admin)  
          @php
            $menus=Illuminate\Support\Facades\DB::select(DB::raw("call up_report_user_menu_access ('$admin->id')")); 
            @endphp
          <tr class="success" style="font-size: 18px">
          <td style="width: 20px;">Sr.No.</td>
          <td style="width: 117px;">Name</td>
          <td style="width: 117px;">Mobile</td>
          <td style="width: 117px;">Email</td>
          <td style="width: 117px;">Status</td>
          </tr>
          <tr class="success" style="font-size: 15px">
          <td style="width: 20px;">{{ $arrayId++ }}</td>
          <td style="width: 117px;">{{ $admin->first_name }}</td>
          <td style="width: 117px;">{{ $admin->mobile }}</td>
          <td style="width: 117px;">{{ $admin->email }}</td>
          <td style="width: 117px;">{{ $admin->userstatus }}</td>
          </tr>
          @if ($report_details==2) 
          <tr class="warning">
          <td style="width: 20px;">Menus</td>
          <td style="width: 117px;">Mein Menu</td>
          <td style="width: 117px;">Sub Menu</td> 
          <td style="width: 117px;"colspan="2">R Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; W Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; D Status</td>
          </tr>
          @foreach ($menus as $menu) 
          <tr class="warning">
          <td style="width: 20px;">&nbsp;</td>
          <td style="width: 117px;">{{ $menu->Main_menu or ''}}</td>
          <td style="width: 117px;">{{ $menu->Sub_Menu or ''}}</td>
          <td style="width: 117px;" colspan="2">{{ $menu->r_status==1?'Yes':'No'}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $menu->w_status==1?'Yes':'No'}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $menu->d_status==1?'Yes':'No'}}</td>
          </tr>
          @endforeach
          @endif
          
          @endforeach
          @endforeach
          </tbody>
          </table>
        </div> 
        <div class="row">
            <div class="col-lg-4"> 
                Total Record :<b>{{ $arrayId ++ -1 }}</b> 
            </div>
            <div class="col-lg-4"> 
                Total Pages :
                <b class="pagenum"></b> 
            </div>
            <div class="col-lg-4"> 
                End of Report 
            </div>
        </div>  
    </body> 
    </html>    