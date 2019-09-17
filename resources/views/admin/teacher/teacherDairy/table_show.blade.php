<table class="table" id="table_appoinment_data_table">
     <thead>
       <tr>
         <th>From Date</th>
         <th>To Date</th>
         <th>Subject</th>
         <th>Venue</th>
         <th>Action</th>
       </tr>
     </thead>
     <tbody>
      @foreach ($appointments as $appointment)
               <tr>
                 <td>{{ date('Y-m-d',strtotime($appointment->from_date)) }}</td>
                 <td>{{ date('Y-m-d',strtotime($appointment->to_date)) }}</td>
                 <td>{{ $appointment->subjectTypes->name or '' }}</td>
                 <td>{{ $appointment->venue }}</td>
                 <td>
                   <button class="btn btn-info btn-xs" onclick="callPopupLarge(this,'{{ route('admin.teacher.appointment.edit',$appointment->id) }}')"><i class="fa fa-edit" title="Edit"></i></button>
                 </td>
               </tr> 
      @endforeach
     </tbody>
   </table>