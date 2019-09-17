<table class="table" id="table_appoinment_data_table">
     <thead>
       <tr>
         <th>Class</th>
         <th>Subject</th>
         <th>Lecture No</th>
         <th>Topic Covered</th>
         <th>Action</th>
       </tr>
     </thead>
     <tbody>
      @foreach ($lessonPlans as $lessonPlan)
               <tr>
                 <td>{{ $lessonPlan->classes->name or ''}}</td> 
                 <td>{{ $lessonPlan->subjectTypes->name or '' }}</td>
                 <td>{{ $lessonPlan->lecture_no }}</td>
                 <td>{{ $lessonPlan->topic_covered }}</td>
                 <td>
                   <button class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.teacher.lesson.plan.edit',$lessonPlan->id) }}')"><i class="fa fa-edit" title="Edit"></i></button>
                 </td>
               </tr> 
      @endforeach
     </tbody>
   </table>