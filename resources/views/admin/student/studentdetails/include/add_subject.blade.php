 <!--- Model parents      -->     
     <!-- Modal -->
    <div id="add_subject" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title"> Add</h4>
                 </div>
                 <div class="modal-body">
                   <form id="subject-form">                    
                    <div class="form-group">
                         {{ Form::label('subject_type_id','Subject Type',['class'=>' control-label']) }}
                         {!! Form::select('subject_type_id',$subjectTypes, null, ['class'=>'form-control','placeholder'=>'Select Subject','required']) !!}
                         <p class="text-danger">{{ $errors->first('subject_type_id') }}</p>
                    </div>
                      <div class="form-group">
                         {{ Form::label('isoptional_id','isoptional_id',['class'=>' control-label']) }}
                         {!! Form::select('isoptional_id',$isoptionals, null, ['class'=>'form-control','placeholder'=>'Select Subject','required']) !!}
                         <p class="text-danger">{{ $errors->first('isoptional_id') }}</p>
                    </div> 
                    <input type="hidden" name="session_id" id="session_id" value="{{ $student->sessions->id }}">
                    </form>                     

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="add_btn_subject btn btn-success">Save</button>
                    <button type="button" class="update_btn_subject btn btn-success">Update</button>
                </div>
            </div>
       </div>
    </div>
@push('scripts')      
    <script type="text/javascript">
     
$(document).ready(function(event) { 
    $('.add_subject').click(function(event) {
        $("#subject-form")[0].reset();
        $('.update_btn_subject').hide('400');
        $('.add_btn_subject').show('400');
        
    });                
                  
      // add medeical information  
     $('.modal-footer').on('click', '.add_btn_subject', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })
            $.ajax({
                url: "{{ route('admin.studentSubject.add') }}",
                type: "POST",            
                data:   
                    $('#subject-form').serialize() + '&student_id=' + {{ $student->id }},                  
            })
            .done(function(data) {
             toastr[data.class](data.message)  
             $("#subject_items").load(location.href + ' #subject_items');
              $("#subject-form")[0].reset();
             $('#add_subject').modal('hide');               
            })
            .fail(function(data) {
             toastr.error('Somthing went wrong') 
     
            })
            .always(function() {
             console.log("complete");
            })           
            
         }); 
       
      // delete medeical information 
    $( "#subject_items" ).on( "click", ".btn_student_subject_delete", function() { 
        var id = $(this).data("id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax(
        {
            url: "{{ route('admin.studentSubject.delete') }}",
            type: 'delete', // replaced from put
            dataType: "JSON",
            data: {
                "id": id // method and token not needed in data
            },
        })
            .done(function(data) {
             toastr[data.class](data.message)  
            $("#subject_items").load(location.href + ' #subject_items');
                                             
            })
            .fail(function() {
                toastr.success('Somthing went wrong') })
         });
    // Edit medeical information  
 $( "#subject_items" ).on( "click", ".btn_student_subject_edit", function() {   
    $('#add_subject').modal('show');
    $('.update_btn_subject').show('400');
    $('.add_btn_subject').hide('400');  
    var id = $(this).data("id");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax(
    {
        url: "{{ route('admin.studentSubject.edit') }}",
        type: 'GET', // replaced from put
        dataType: "JSON",
        data: {
            "id": id // method and token not needed in data
        },
    })
    .done(function( response ) {    
            if(response.studentSubject.length>0){            
                for (var i = 0; i < response.studentSubject.length; i++) {
                    
                    
                    $('#student_add_subject_id').val(response.studentSubject[i].student_add_subject_id);  
                  
                    $('#add_subject-form').append('<input type="hidden" name="id" value="'+response.studentSubject[i].id+'" />');
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
     $('.modal-footer').on('click', '.update_btn_add_subject', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })
            $.ajax({
                url: "{{ route('admin.studentSubject.update') }}",
                type: "POST",            
                data:   
                    $('#add_subject-form').serialize() + '&student_id=' + {{ $student->id }},                  
            })
            .done(function(data) {
             toastr.success(data.message)  
             $("#add_subject_items").load(location.href + ' #add_subject_items');
              $("#add_subject-form")[0].reset();
             $('#add_add_subject').modal('hide');               
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