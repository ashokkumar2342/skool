<div id="div_print">
   @php
              $userIdBySibling=new App\Helper\MyFuncs();    
              $siblings= $userIdBySibling->getSiblingById(); 
              $students=App\Student::whereIn('id',$siblings)->get();
   @endphp
   @foreach ($students as $student)
   <div class="panel panel-danger">
        <div class="panel-body">
           {{-- <div class="row">
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
           </div>  --}}
   <table class="table m-0" id="class_homework_data_table">
       <thead>
           <tr>
              
               <th class="text-nowrap">Name: <b>{{ $student->name }}</b></th>
               {{-- <th class="text-nowrap">Registration No. : <b>{{ $student->registration_no }}</b></th> --}}
                
           </tr>
       </thead>
       <tbody>
           @foreach ($homeworks as $homework)   
           @if ($student->class_id==$homework->class_id&&$student->section_id==$homework->section_id)
           <tr>
              
               <td rowspan="2"> {!! $homework->homework !!} {{ date('d-m-Y',strtotime($homework->date)) }}</td>
                
           </tr>
           @endif
           @endforeach
       </tbody>
   </table>
   </div>
   </div>
   @endforeach
</div>


<script type="text/javascript">
    $(window).ready(function() {
        var divToPrint=document.getElementById('div_print');

          var newWin=window.open('','Print-Window');

          newWin.document.open();

          newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

          newWin.document.close();

          setTimeout(function(){newWin.close();},10);
     // var HTML = data.EmailHTML;

     //       var WindowObject = window.open("", "PrintWindow", "width=750,height=650,top=50,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes");
     //       WindowObject.document.writeln(HTML);
     //       WindowObject.document.close();
     //       WindowObject.focus();
     //       WindowObject.print();
     //       WindowObject.close();
    });
    

</script>
@push('scripts')
 
 <script type="text/javascript">
    $(document).ready(function(){
        alert("window load occurred!");
    });
     
 </script>
  @endpush