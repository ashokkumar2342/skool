<table class="table" id="table_appoinment_data_table">
     <thead>
       <tr>
         <th>Class</th>
         <th>Section</th>
         <th>Subject</th>
         <th>Teacher</th>
         <th>Lesson Plan</th>
         <th>Ondate</th>
         <th>Action</th>
       </tr>
     </thead>
     <tbody>
      @foreach ($lessonPlanFollows as $lessonPlanFollow)
               <tr>
                 <td>{{ $lessonPlanFollow->classes->name or ''}}</td> 
                 <td>{{ $lessonPlanFollow->sectionTypes->name or ''}}</td>
                 <td>{{ $lessonPlanFollow->subjectTypes->name or '' }}</td>
                 <td>{{ $lessonPlanFollow->teacherFaculty->name or ''}}</td>
                 <td>{{ $lessonPlanFollow->lessonPlan->topic_covered or '' }}</td>
                 <td>{{ date('d-m-Y',strtotime($lessonPlanFollow->ondate)) }}</td>
                 <td>
                   <button class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.teacher.lesson.plan.follow.edit',$lessonPlanFollow->id) }}')"><i class="fa fa-edit" title="Edit"></i></button>
                 </td>
               </tr> 
      @endforeach
     </tbody>
   </table>