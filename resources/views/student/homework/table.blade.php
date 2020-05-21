@php
           $userIdBySibling=new App\Helper\MyFuncs();    
           $siblings= $userIdBySibling->getSiblingById(); 
           $students=App\Student::whereIn('id',$siblings)->get();
@endphp
@foreach ($students as $student)
<div class="panel panel-danger">
     <div class="panel-body">
        <div class="row">
            <div class="col-lg-3">
            Name : <b>{{ $student->name }}</b>
            </div> 
            <div class="col-lg-3"> 
            Registration No. : <b>{{ $student->registration_no }}</b> 
            </div> 
            <div class="col-lg-3">
            Class : <b>{{ $student->classes->name or '' }}</b>
            </div>
            <div class="col-lg-3">
            Section : <b>{{ $student->sectionTypes->name or '' }}</b>
            </div>  
        </div> 
<table class="table m-0" id="class_homework_data_table">
    <thead>
        <tr>
            <th class="text-nowrap">Date</th> 
            <th class="text-nowrap">Homework</th>
            <th class="text-nowrap">Action</th> 
        </tr>
    </thead>
    <tbody>
        @foreach ($homeworks as $homework)   
        @if ($student->class_id==$homework->class_id&&$student->section_id==$homework->section_id)
        <tr>
            <td class="text-nowrap">{{ date('d-m-Y',strtotime($homework->date)) }}</td>
            <td> {!! $homework->homework !!} </td>
            <td class="text-nowrap">
                <button type="homework" onclick="callPopupLarge(this,'{{ route('student.homework.view',$homework->id) }}')" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></button>
                <a href="{{ route('admin.homework.download',$homework->homework_doc) }}" target="blank" title="Download" class="btn_parents_image btn btn-success btn-xs {{ $homework->homework_doc==null?'disabled':'' }}">
                    <i class="fa fa-download "></i>
                </a> 
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>
</div>
</div>
@endforeach