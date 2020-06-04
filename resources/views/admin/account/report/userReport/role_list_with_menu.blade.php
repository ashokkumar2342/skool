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
        <table id="dataTable" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Sr.No.</th> 
                    <th>Name</th>
                    <th>Mobile</th> 
                    <th>Email</th> 
                    <th>Status</th> 
                </tr>
            </thead>
            <tbody>
                @php
                $arrayId=1; 
                @endphp
                @foreach($admins as $admin) 
                @foreach($admin as $admi) 
                <tr >
                    <td>{{ $arrayId ++ }}</td> 
                    <td>{{ $admi->first_name }}</td>
                    <td>{{ $admi->mobile }}</td> 
                    <td>{{ $admi->email }}</td> 
                    <td>{{ $admi->userstatus }}</td> 
                </tr>  
                @endforeach
                <tr>
                  <td></td>
                  <td>Main_menu</td>
                  <td>Sub_Menu</td>
                  <td>Status</td>
                  <td></td> 
                </tr>
                @foreach ($menus as $menu) 
                    <tr>
                      <td></td> 
                      <td>{{ $menu->Main_menu or ''}}</td>
                      <td>{{ $menu->Sub_Menu or ''}}</td>
                      <td>{{ $menu->r_status or ''}}</td>
                      <td></td> 
                    </tr>  
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