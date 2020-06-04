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
            <div class="panel-heading">Sub Menu : <b>{{ $SunMenuName->name }}</b></div>
        </div>
        <table id="dataTable" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Sr.No.</th> 
                    <th>Name</th>
                    <th>Mobile</th> 
                    <th>Email</th> 
                    <th>Role</th> 
                    <th>Status</th> 
                </tr>
            </thead>
            <tbody>
                @php
                $arrayId=1; 
                @endphp
                @foreach($admins as $admin) 
                <tr >
                    <td>{{ $arrayId ++ }}</td> 
                    <td>{{ $admin->first_name }}</td>
                    <td>{{ $admin->mobile }}</td> 
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->userstatus }}</td> 
                </tr>  
                @endforeach
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