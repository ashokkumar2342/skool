<div class="modal-dialog" style="width: 70%"> 
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" id="btn_close" class="close label label-danger" data-dismiss="modal">&times;</button>
            @php
              $classTest=App\Model\Exam\ClassTest::find($students[0]->classtestid);
            @endphp
            <div class="row" style="margin-top: -20px">
            <div class="panel panel-warning">
              <div class="panel-heading text-center">Academic Year : <b>{{ $classTest->academicYear->name or ''}}</b> &nbsp;&nbsp;&nbsp;   Class/Section : <b>{{ $classTest->classes->name or ''}}/{{ $classTest->sectionTypes->name or '' }}</b> &nbsp;&nbsp;&nbsp; Subject : <b>{{ $classTest->subjects->subjectTypes->name or '' }}</b> &nbsp;&nbsp;&nbsp; M.Marks : <b>{{ $classTest->max_marks }}</b></div>
              </div> 
        </div>
        Marks Add By : <b>{{ $classTest->admins->first_name or ''}}</b><br>
        Marks Verify By : <b>{{ $classTest->admins2->first_name or '' }}</b>
        <div class="modal-body">
            <form class="add_form"  action="{{ route('admin.exam.classtest.marks.verify.store',$classTest->id) }}" no-reset="true" method="post" button-click="btn_class_test_show,btn_close">              
                  {{ csrf_field() }}  
            <table id="route_table" class="display table">                     
                <thead>
                    <tr>
                        <th>SR.No.</th>  
                        <th>Name</th> 
                        <th>Reg.No.</th>                             
                        <th><a class="btn btn-warning btn-xs" button-click="btn_verify_marks{{$classTest->id }}" success-popup="true" onclick="callAjax(this,'{{ route('admin.exam.classtest.attendance.import',$classTest->id) }}')">Attendance</a></th> 
                        <th>Marks</th>                                               
                        <th>any remarks</th>                                        
                    </tr>
                </thead>
                <tbody> 
                    @foreach ($students as $student)
                     @if ($student->attendance==1)
                        @php 
                           $btn_att='P';
                           $btn_class='btn-success';    
                        @endphp   
                     @endif
                     @if ($student->attendance==2)
                        @php
                           $btn_att='A';
                           $btn_class='btn-danger';      
                        @endphp   
                     @endif
                     @if ($student->attendance==3)
                        @php
                           $btn_att='L';
                           $btn_class='btn-warning';      
                        @endphp   
                     @endif 
                    <tr>
                        <td>{{ ++$loop->index }}</td> 
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->registration_no   }}</td>
                        <td class="text-center">
                            <input type="hidden" name="attendance[{{ $student->id }}]" id="{{ $student->registration_no }}" value="{{ $student->attendance }}">
                            <input type="button" id="btn_attadance_{{ $student->id }}"  class="btn btn-xs {{ $btn_class }}" value="{{ $btn_att }}" onclick="chageButtonValue('btn_attadance_{{ $student->id }}',{{ $student->registration_no }},this.value)">
                        </td>
                        <td>
                            <input type="text" name="marksobt[{{ $student->id }}]" onkeyup="this.value = minmax(this.value,'',{{ $classTest->max_marks }})"/ value="{{ $student->marks }}"> 
                        </td>
                        <td>
                            <input type="text" name="any_remarks[{{ $student->id }}]" class="form-control" value="" maxlength="100">
                        </td> 
                    </tr>    
                    @endforeach 

                </tbody> 
            </table>
            @if ($classTest->marks_entered_status==1) 
            <div class="col-lg-12 form-group text-center">
            <input type="submit" value="Marks Verify" class="btn btn-success text-center"> 
            </div>
            @endif
            </form> 
        </div>
    </div>
</div>

<script>
    function chageButtonValue(id,reg,val) {
        if(val=='P'){  
         $('#'+id).val('A')   
         $('#'+id).removeClass('btn-success')
         $('#'+id).addClass('btn-danger')   
         $('#'+reg).val(2) 
          
           
        }if(val=='A'){
         $('#'+id).val('L')   
         $('#'+id).removeClass('btn-danger')
         $('#'+id).addClass('btn-warning')
          $('#'+reg).val(3)
        }if(val=='L'){
         $('#'+id).val('P') 
         $('#'+id).removeClass('btn-warning')
         $('#'+id).addClass('btn-success')
          $('#'+reg).val(1)
        }
    }

function minmax(value, min, max) 
{
    if(parseInt(value) < min || isNaN(parseInt(value))) 
        return min; 
    else if(parseInt(value) > max) 
        return max; 
    else return value;
}
 

</script>

