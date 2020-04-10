<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body>
    <div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#parent">Subject Details</a>
            </h4>
        </div>
        <div id="parent" class="panel-collapse collapse in">
            <div class="panel-body">
                <div class="row">
                    <table class="table" id="subject_items">                         
                        <thead>
                            <tr>
                                <th>Subject Name</th>
                                <th>Is Optional</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($studentSubjects as $studentSubject)
                            <tr>
                                <td>{{ $studentSubject->SubjectTypes->name or ''}}</td>
                                <td>{{ $studentSubject->ISOptionals->name or ''}}</td>                             
                                <td>
                                    <a href="#" button-click="subject_tab" success-popup="true" onclick="callAjax(this,'{{ route('admin.studentSubject.delete',$studentSubject->id) }}')" title="Delete"class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
