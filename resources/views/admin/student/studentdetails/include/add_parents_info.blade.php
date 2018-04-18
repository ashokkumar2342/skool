 <!--- Model parents      -->     
     <!-- Modal -->
    <div id="add_parent" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title"> Add</h4>
                 </div>
                 <div class="modal-body">
                   <form id="parents-form">
                    <div class="form-group">
                         {{ Form::label('relation_type_id','Parents',['class'=>' control-label']) }}
                         {!! Form::select('relation_type_id',$parentsType, null, ['class'=>'form-control','placeholder'=>'Select Parents','required']) !!}
                         <p class="text-danger">{{ $errors->first('parents') }}</p>
                    </div>
                    <div class="form-group">
                        {{ Form::label('name','Parents Name',['class'=>' control-label']) }}                         
                        {{ Form::text('name','',['class'=>'form-control',' required']) }}
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    </div>
                    <div class="form-group">
                        {{ Form::label('education','Education',['class'=>' control-label']) }}                         
                        {{ Form::text('education','',['class'=>'form-control']) }}
                        <p class="text-danger">{{ $errors->first('education') }}</p>
                    </div>
                    <div class="form-group">
                        {{ Form::label('occupation','Occupation',['class'=>' control-label']) }}                         
                        {{ Form::text('occupation','',['class'=>'form-control ']) }}
                        <p class="text-danger">{{ $errors->first('occupation') }}</p>
                    </div>                                        
                   <div class="form-group">
                        {{ Form::label('income','Income Range',['class'=>' control-label']) }}
                        {!! Form::select('income',$incomes, null, ['class'=>'form-control','placeholder'=>'Select income','required']) !!}
                        <p class="text-danger">{{ $errors->first('income') }}</p>
                   </div>
                   <div class="form-group">
                        {{ Form::label('mobile','Mobile',['class'=>' control-label']) }}                         
                        {{ Form::text('mobile','',['class'=>'form-control']) }}
                        <p class="text-danger">{{ $errors->first('mobile') }}</p>
                    </div>
                    <div class="form-group">
                        {{ Form::label('email','email',['class'=>' control-label']) }}                         
                        {{ Form::text('email','',['class'=>'form-control']) }}
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    </div>
                     <div class="form-group">
                        {{ Form::label('dob','Date of Birth',['class'=>' control-label']) }}                         
                        {{ Form::text('dob','',['class'=>'form-control datepicker']) }}
                        <p class="text-danger">{{ $errors->first('dob') }}</p>
                    </div>
                     <div class="form-group">
                        {{ Form::label('doa','Date of Anniversary',['class'=>' control-label ']) }}                         
                        {{ Form::text('doa','',['class'=>'form-control datepicker']) }}
                        <p class="text-danger">{{ $errors->first('doa') }}</p>
                    </div>                  
                    <div class="form-group">
                        {{ Form::label('office_address','Office Address',['class'=>' control-label']) }}                         
                        {{ Form::textarea('office_address','',['class'=>'form-control','rows'=>2 ]) }}
                        <p class="text-danger">{{ $errors->first('office_address') }}</p>
                    </div>
                    <div class="form-group">
                        {{ Form::label('islive','IsLive',['class'=>' control-label']) }}                         
                        {!! Form::select('islive',[
                          '0'=>'No',
                          '1'=>'Yes'                                                    
                          ], null, ['class'=>'form-control']) !!}
                        <p class="text-danger">{{ $errors->first('islive') }}</p>
                    </div>
                    </form>                     

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="update_btn_parets btn btn-success">Update</button>
                    <button type="button" class="save_btn_parets btn btn-success">Save</button>
                </div>
            </div>
       </div>
    </div>
 @push('scripts')
  
<script type="text/javascript">  
     $(document).ready(function() {                                       
        $("#relation_type_id").on("change", function() {
            $("#name").val( this.value == 1 ? '{{ $student->father_name }}' : this.value == 2 ? '{{ $student->mother_name }}' : '' );
 
        })
     }); 
    $('.add_btn_parets').click(function(event) {
        $("#subject-form")[0].reset();
        $('.update_btn_parets').hide('400');
        $('.save_btn_parets').show('400');
        
    }); 
 $('.modal-footer').on('click', '.save_btn_parets', function() {    
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        $.ajax({
            url: "{{ route('admin.parents.add') }}",
            type: "POST",            
            data: $('#parents-form').serialize() + '&student_id=' + {{ $student->id }},  
        })
        .done(function(data) {
            if (data.message == data.message) {
                 toastr[data.class](data.message)  
                 $("#parents-form")[0].reset();
                 $("#parents_items").load(location.href + ' #parents_items');
                $('#add_parent').modal('hide'); 
            }
              else {
                   toastr[data.class](data.message) 
                    $('#add_parent').modal('show');  
                  
            } 
        })
        .fail(function(data) {
         toastr.success("Somthing Went Wrong") 
 
        }) 
        
     }); 
      // delete medeical information 
    $( "#parents_items" ).on( "click", ".parents_delete", function() { 
        var id = $(this).data("id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax(
        {
            url: "{{ route('admin.parents.delete') }}",
            type: 'delete', // replaced from put
            dataType: "JSON",
            data: {
                "id": id // method and token not needed in data
            },
        })
            .done(function(data) {
             toastr[data.class](data.message)  
            $("#parents_items").load(location.href + ' #parents_items');
                                             
            })
            .fail(function() {
                toastr.success('Somthing went wrong') })
         });
 
   

            // Edit parents information  
 $( "#parents_items" ).on( "click", ".parents_edit", function() {   
     
    $('.update_btn_parets').show('400');
    $('.save_btn_parets').hide('400');  
    var id = $(this).data("id");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax(
    {
        url: "{{ route('admin.parents.edit') }}",
        type: 'GET', // replaced from put
        dataType: "JSON",
        data: {
            "id": id // method and token not needed in data
        },
    })
    .done(function( response ) {    
            if(response.parentsInfo.length>0){            
                for (var i = 0; i < response.parentsInfo.length; i++) { 
                    $('#relation_type_id').val(response.parentsInfo[i].relation_type_id);  
                    $('#name').val(response.parentsInfo[i].name);  
                    $('#education').val(response.parentsInfo[i].education);  
                    $('#occupation').val(response.parentsInfo[i].occupation);  
                    $('#income').val(response.parentsInfo[i].income);  
                    $('#mobile').val(response.parentsInfo[i].mobile);  
                    $('#email').val(response.parentsInfo[i].email);  
                    $('#dob').val(response.parentsInfo[i].dob);  
                    $('#doa').val(response.parentsInfo[i].doa);  
                    $('#office_address').val(response.parentsInfo[i].office_address);  
                    $('#islive').val(response.parentsInfo[i].islive);  
                      
                  
                    $('#parents-form').append('<input type="hidden" name="id" value="'+response.parentsInfo[i].id+'" />');
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
        $('.modal-footer').on('click', '.update_btn_parets', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })
            $.ajax({
                url: "{{ route('admin.parents.update') }}",              
              type: "POST",            
              data: $('#parents-form').serialize() + '&student_id=' + {{ $student->id }},                  
            })
           .done(function(data) {
               if (data.message == data.message) {
                    toastr[data.class](data.message)  
                    $("#parents-form")[0].reset();
                    $("#parents_items").load(location.href + ' #parents_items');
                   $('#add_parent').modal('hide'); 
               }
                 else {
                      toastr[data.class](data.message) 
                       $('#add_parent').modal('show');  
                     
               } 
           })
           .fail(function(data) {
            toastr.success("Somthing Went Wrong") 
           
           })
            .always(function() {
             console.log("complete");
            })           
            
        });       
 
        
        
 
           

        
                                      
</script>
  
@endpush