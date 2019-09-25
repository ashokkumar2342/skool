<table class="table-responsive" id="address_info_table"> 
                        <thead>
                            <tr>
                                <th><span class="text-nowrap">Primary Mobile </span></th>
                                <th><span class="text-nowrap">Primary E-mail </span></th>
                                <th><span class="text-nowrap">Category </span></th>
                                <th><span class="text-nowrap">Religion </span></th>
                                <th><span class="text-nowrap">State </span></th>
                                <th><span class="text-nowrap">City </span></th>
                                <th><span class="text-nowrap">P Address </span></th>
                                <th><span class="text-nowrap">C Address </span></th>
                                <th><span class="text-nowrap">P Pincode </span></th>
                                <th><span class="text-nowrap">C Pincode </span></th>
                                <th><span class="text-nowrap">Nationality </span></th>
                                
                               {{--  <th><span class="text-nowrap" style="margin:5px">Action </span></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($address as $addres) 
                                   <tr>
                                       <td>{{ $addres->primary_mobile }}</td>
                                       <td>{{ $addres->primary_email }}</td>
                                       <td>{{ $addres->cotegory_id }}</td>
                                       <td>{{ $addres->religion }}</td>
                                       <td>{{ $addres->state }}</td>
                                       <td>{{ $addres->city }}</td>
                                       <td>{{ $addres->p_address }}</td>
                                       <td>{{ $addres->c_address }}</td>
                                       <td>{{ $addres->p_pincode }}</td>
                                       <td>{{ $addres->c_pincode }}</td>
                                       <td>{{ $addres->nationality }}</td>
                                       
                                   </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                 
                    <div class="text-center">
                     <button type="button" onclick="$('#medical_info').click()" class="btn btn-success btn-sm">Next</button> 
                     </div> 