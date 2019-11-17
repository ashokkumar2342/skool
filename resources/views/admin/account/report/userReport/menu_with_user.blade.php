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
                  <th>user Name</th> 
                  <th>Menu</th> 
                  <th>Sub Menu</th>
                  <td>R &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;W&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; D</td>
                  <td>Status</td> 
                </tr>
                </thead>
                <tbody>
                  @php
                  $arrayId=1; 
                  @endphp
              @foreach($usersmenus as $usersmenu) 
                     <tr style="{{ $usersmenu->status==1?'background-color: #95e49b':'background-color: #ec2020' }}">
                      
                      <td>{{ $usersmenu->admin_id}}</td> 
                      <td>{{ $usersmenu->minutypes->name }}</td> 
                      <td>{{ $usersmenu->subMenuTypes->name }}</td>
                      
                      <td>
                        @if ($usersmenu->r_status==1) Yes @else No @endif&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        @if ($usersmenu->w_status==1) Yes @else No @endif&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        @if ($usersmenu->d_status==1) Yes @else No @endif 
                      </td>
                      <td>@if ( $usersmenu->status==1) Yes @else  No @endif  </td>
                       <td></td>  
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