 <!--- Model medical      -->     
     <!-- Modal -->
    <div id="add_medical" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title"> Add</h4>
                 </div>
                 <div class="modal-body">
                   <form id="medical-form">                    
                    <div class="form-group">
                         {{ Form::label('ondate','On Date',['class'=>' control-label']) }}                         
                         {{ Form::text('ondate','',['class'=>'form-control datepicker']) }}
                         <p class="text-danger">{{ $errors->first('ondate') }}</p>
                     </div>
                     <div class="form-group">
                          {{ Form::label('bloodgroup_id','Blood Group',['class'=>' control-label']) }}
                          {!! Form::select('bloodgroup_id',$bloodgroups, null, ['class'=>'form-control','placeholder'=>'Select Blood Group','required']) !!}
                          <p class="text-danger">{{ $errors->first('bloodgroup') }}</p>
                     </div> 
                   <div class="form-group">
                        {{ Form::label('hb','HB',['class'=>' control-label']) }}                         
                        {{ Form::text('hb',14,['class'=>'form-control']) }}
                        <p class="text-danger">{{ $errors->first('hb') }}</p>
                    </div>
                    <div class="form-group">
                        {{ Form::label('weight','Weight',['class'=>' control-label']) }}                         
                        {{ Form::text('weight','',['class'=>'form-control']) }}
                        <p class="text-danger">{{ $errors->first('weight') }}</p>
                    </div>
                     
                     <div class="form-group">
                        {{ Form::label('height','Height',['class'=>' control-label ']) }}                         
                        {{ Form::text('height','',['class'=>'form-control']) }}
                        <p class="text-danger">{{ $errors->first('height') }}</p>
                    </div>
                     <div class="form-group">
                        {{ Form::label('narration','Narration',['class'=>' control-label ']) }}                         
                        {{ Form::text('narration','',['class'=>'form-control ']) }}
                        <p class="text-danger">{{ $errors->first('narration') }}</p>
                    </div>   
                    <div class="form-group">
                        {{ Form::label('vision','vision',['class'=>' control-label ']) }}                         
                        {{ Form::text('vision','',['class'=>'form-control ']) }}
                        <p class="text-danger">{{ $errors->first('vision') }}</p>
                    </div> 
                     
                     <div class="form-group">
                          {{ Form::label('complextion','Complextion',['class'=>' control-label']) }}
                          {!! Form::select('complextion',[
                            'Light'=>'Light',
                            'Medium'=>'Medium',
                            'Olive'=>'Olive',
                            'Brown'=>'Brown',
                            'Brown'=>'Brown',
                            'Black'=>'Black',
                                                       
                            ], null, ['class'=>'form-control','required']) !!}
                          <p class="text-danger">{{ $errors->first('complextion') }}</p>
                     </div>
                    <div class="form-group">
                        {{ Form::label('alergey','Alergey',['class'=>' control-label ']) }}                         
                        {{ Form::text('alergey','No',['class'=>'form-control']) }}
                        <p class="text-danger">{{ $errors->first('alergey') }}</p>
                    </div>
                    <div class="form-group">
                        {{ Form::label('alergey_vacc','Alergey Vacc',['class'=>' control-label ']) }}                         
                        {{ Form::text('alergey_vacc','',['class'=>'form-control']) }}
                        <p class="text-danger">{{ $errors->first('alergey_vacc') }}</p>
                    </div> 
                    <div class="form-group">
                        {{ Form::label('physical_handicapped','Physical Handicapped',['class'=>' control-label ']) }}
                        {{ Form::text('physical_handicapped','',['class'=>'form-control']) }}
                        <p class="text-danger">{{ $errors->first('physical_handicapped') }}</p>
                    </div> 
                    <div class="form-group">
                        {{ Form::label('id_marks1','Id Marks1',['class'=>' control-label ']) }}
                        {{ Form::text('id_marks1','',['class'=>'form-control']) }}
                        <p class="text-danger">{{ $errors->first('id_marks1') }}</p>
                    </div> 
                    <div class="form-group">
                        {{ Form::label('id_marks2','Id Marks2',['class'=>' control-label ']) }}
                        {{ Form::text('id_marks2','',['class'=>'form-control']) }}
                        <p class="text-danger">{{ $errors->first('id_marks2') }}</p>
                    </div>
                     <div class="form-group">
                        {{ Form::label('dental','Dental',['class'=>' control-label ']) }}
                        {{ Form::text('dental','',['class'=>'form-control']) }}
                        <p class="text-danger">{{ $errors->first('dental') }}</p>
                    </div>
                    <div class="form-group">
                        {{ Form::label('bp','BP Lower',['class'=>' control-label ']) }}
                        {{ Form::text('bp_lower','80',['class'=>'form-control']) }}
                        <p class="text-danger">{{ $errors->first('bp') }}</p>
                    </div> 
                    <div class="form-group">
                        {{ Form::label('bp','BP Uper',['class'=>' control-label ']) }}
                        {{ Form::text('bp_uper','120',['class'=>'form-control']) }}
                        <p class="text-danger">{{ $errors->first('bp') }}</p>
                    </div>  
                    </form>                     

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="add_btn_medical btn btn-success">Save</button>
                    <button type="button" class="update_btn_medical btn btn-success">Update</button>
                </div>
            </div>
       </div>
    </div>
@push('scripts')      
    <script type="text/javascript">
     
$(document).ready(function(event) { 
    $('.btn_add_medical_info').click(function(event) {
        $("#medical-form")[0].reset();
        $('.update_btn_medical').hide('400');
        $('.add_btn_medical').show('400');
        
    });                
                  
      // add medeical information  
     $('.modal-footer').on('click', '.add_btn_medical', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })
            $.ajax({
                url: "{{ route('admin.medical.add') }}",
                type: "POST",            
                data:   
                    $('#medical-form').serialize() + '&student_id=' + {{ $student->id }},                  
            })
         .done(function(data) {
            if (data.message == data.message) {
                 toastr[data.class](data.message)  
                 $("#medical-form")[0].reset();
                 $("#medical_items").load(location.href + ' #medical_items');
                $('#add_medical').modal('hide'); 
            }
              else {
                   toastr[data.class](data.message) 
                    $('#add_medical').modal('show');  
                  
            } 
        })
        .fail(function(data) {
         toastr.error("Something Went Wrong") 
 
        }) 
        
     });
      // delete medeical information 
    $( "#medical_items" ).on( "click", ".btn_medical_delete", function() { 
        var id = $(this).data("id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax(
        {
            url: "{{ route('admin.medical.delete') }}",
            type: 'delete', // replaced from put
            dataType: "JSON",
            data: {
                "id": id // method and token not needed in data
            },
        })
            .done(function(respone) {
             toastr.success(respone.message)  
             $("#medical_items").load(location.href + ' #medical_items');              
              $("#medical-form")[0].reset();               
            })
            .fail(function() {
                toastr.success('Somthing went wrong') })
         });
    // Edit medeical information  
 $( "#medical_items" ).on( "click", ".btn_medical_edit", function() {   
    $('#add_medical').modal('show');
    $('.add_btn_medical').hide('400');   
    $('.update_btn_medical').show('400');   
    var id = $(this).data("id");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax(
    {
        url: "{{ route('admin.medical.edit') }}",
        type: 'GET', // replaced from put
        dataType: "JSON",
        data: {
            "id": id // method and token not needed in data
        },
    })
    .done(function( response ) {   
                    
            if(response.medicalInfo.length>0){            
                for (var i = 0; i < response.medicalInfo.length; i++) {
                    
                    
                    $('#ondate').val(response.medicalInfo[i].ondate);
                    
                    // $("#bloodgroup_id").append('<option value="'+response.medicalInfo[i].bloodgroups.id+'" selected>'+response.medicalInfo[i].bloodgroups.name+'</option>');
                    $('#bloodgroup_id').val(response.medicalInfo[i].bloodgroup_id);  

                    $('#hb').val(response.medicalInfo[i].hb);
                    $('#weight').val(response.medicalInfo[i].weight);
                    $('#height').val(response.medicalInfo[i].height);
                    $('#narration').val(response.medicalInfo[i].narration);
                    $('#vision').val(response.medicalInfo[i].vision);
                    $('#complextion').val(response.medicalInfo[i].complextion);
                    $('#alergey').val(response.medicalInfo[i].alergey);
                    $('#alergey_vacc').val(response.medicalInfo[i].alergey_vacc);
                    $('#physical_handicapped').val(response.medicalInfo[i].physical_handicapped);
                    $('#id_marks1').val(response.medicalInfo[i].id_marks1);
                    $('#id_marks1').val(response.medicalInfo[i].id_marks1);
                    $('#id_marks2').val(response.medicalInfo[i].id_marks2);
                    $('#id_marks2').val(response.medicalInfo[i].id_marks2);
                    $('#id_marks2').val(response.medicalInfo[i].id_marks2);
                    $('#dental').val(response.medicalInfo[i].dental);
                    $('#bp_uper').val(response.medicalInfo[i].bp);
                    $('#bp_lower').val(response.medicalInfo[i].bp);
                    $('#medical-form').append('<input type="hidden" name="id" value="'+response.medicalInfo[i].id+'" />');
                    } 
            }
            else{
               toastr.success('Somthing went wrong') 
            }           
        })
        .fail(function() {
            toastr.success('Somthing went wrong') })
     });
       // Update medeical information  
     $('.modal-footer').on('click', '.update_btn_medical', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        $.ajax({
            url: "{{ route('admin.medical.update') }}",
            type: "POST",            
            data:   
                $('#medical-form').serialize() + '&student_id=' + {{ $student->id }},                  
        })
        .done(function(data) {
         toastr.success(data.message)  
         $("#medical_items").load(location.href + ' #medical_items');
          $("#medical-form")[0].reset();
         $('#add_medical').modal('hide');               
        })
        .fail(function(data) {
         toastr.success(data.message) 
 
        })
        .always(function() {
         console.log("complete");
        })           
        
     });       
            
});                                          
    </script>
      
    @endpush