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
            <div class="panel-heading"> User : <b style="color:#d02ee7">{{ $userName->first_name }}--{{ $userName->email }}</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Menu Report</div>
        </div>
        <table id="dataTable" class="table table-bordered table-striped table-hover">
            <thead>
                <tr> 
                    <th style="width: 10px">Sr.No</th> 
                    <th>Main Menu</th> 
                    <th>Sub Menu</th>
                    <td style="width: 30px">R Status</td> 
                    <td style="width: 30px">W Status</td> 
                    <td style="width: 30px">D Status</td> 
                </tr>
            </thead>
            <tbody>
                @php
                $arrayId=1; 
                @endphp
                @foreach($admins as $admin) 
                <tr>

                    <td>{{ $arrayId++}}</td> 
                    <td>{{ $admin->Main_menu}}</td> 
                    <td>{{ $admin->Sub_Menu }}</td> 
                    <td>{{ $admin->r_status==1?'Yes':'No' }}</td>
                    <td>{{ $admin->w_status==1?'Yes':'No' }}</td>
                    <td>{{ $admin->d_status==1?'Yes':'No' }}</td>
                </tr> 
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
