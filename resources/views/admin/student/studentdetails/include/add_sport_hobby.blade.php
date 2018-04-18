 <!--- Model parents      -->     
     <!-- Modal -->
    <div id="add_sport_hobby" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title"> Add</h4>
                 </div>
                 <div class="modal-body">
                   <form id="sport_hobby-form">                    
                     
                     <div class="form-group">
                          {{ Form::label('session_id','Academic Year Prize',['class'=>' control-label']) }}
                          {!! Form::select('session_id',$sessions, null, ['class'=>'form-control']) !!}
                          <p class="text-danger">{{ $errors->first('session_id') }}</p>
                     </div> 
                   <div class="form-group">
                        {{ Form::label('sports_activity_name','Sports Activity Name',['class'=>' control-label']) }}                         
                        {{ Form::text('sports_activity_name','',['class'=>'form-control']) }}
                        <p class="text-danger">{{ $errors->first('sports_activity_name') }}</p>
                    </div>                                       
                     
                </form>                     

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="add_btn_sport_hobby btn btn-success">Save</button>
                    <button type="button" class="update_btn_sport_hobby btn btn-success">Update</button>
                </div>
            </div>
       </div>
    </div>
@push('scripts')      
    <script type="text/javascript">    
 
    $('.btn_add_sport_hobby').click(function(event) {
        $("#sport_hobby-form")[0].reset();
        $('.update_btn_sport_hobby').hide('400');
        $('.add_btn_sport_hobby').show('400');
        
    });                
                  
      // add medeical information  
     $('.modal-footer').on('click', '.add_btn_sport_hobby', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })
            $.ajax({
                url: "{{ route('admin.hobby.add') }}",
                type: "POST",            
                data:   
                    $('#sport_hobby-form').serialize() + '&student_id=' + {{ $student->id }},                  
            })
            .done(function(data) {
             toastr.success(data.message)  
             $("#sport_hobby_items").load(location.href + ' #sport_hobby_items');
              $("#sport_hobby-form")[0].reset();
             $('#add_sport_hobby').modal('hide');               
            })
            .fail(function(data) {
             toastr.success(data.message)      
            })
            .always(function() {
             console.log("complete");
            })           
            
         }); 
       
      // delete medeical information 
    $( "#sport_hobby_items" ).on( "click", ".btn_sport_hobby_delete", function() { 
        var id = $(this).data("id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax(
        {
            url: "{{ route('admin.hobby.delete') }}",
            type: 'delete', // replaced from put
            dataType: "JSON",
            data: {
                "id": id // method and token not needed in data
            },
        })
            .done(function(respone) {
             toastr.success(respone.message)  
             $("#sport_hobby_items").load(location.href + ' #sport_hobby_items');              
              $("#sport_hobby-form")[0].reset();               
            })
            .fail(function() {
                toastr.success('Somthing went wrong') })
         });
    // Edit medeical information  
 $( "#sport_hobby_items" ).on( "click", ".btn_sport_hobby_edit", function() {   
    $('#add_sport_hobby').modal('show');
    $('.add_btn_sport_hobby').hide('400');   
    $('.update_btn_sport_hobby').show('400');   
    var id = $(this).data("id");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax(
    {
        url: "{{ route('admin.hobby.edit') }}",
        type: 'GET', // replaced from put
        dataType: "JSON",
        data: {
            "id": id // method and token not needed in data
        },
    })
    .done(function( response ) {   
                    
            if(response.sport_hobby.length>0){            
                for (var i = 0; i < response.sport_hobby.length; i++) {
                    
                    
                    
                    
                    // $("#session_id").append('<option value="'+response.sport_hobby[i].session_id+'" selected>'+response.sport_hobby[i].session_id+'</option>');
                    $('#sports_activity_name').val(response.sport_hobby[i].sports_activity_name);
                   
                    $('#sport_hobby-form').append('<input type="hidden" name="id" value="'+response.sport_hobby[i].id+'" />');
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
     $('.modal-footer').on('click', '.update_btn_sport_hobby', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })
            $.ajax({
                url: "{{ route('admin.hobby.update') }}",
                type: "POST",            
                data:   
                    $('#sport_hobby-form').serialize() + '&student_id=' + {{ $student->id }},                  
            })
            .done(function(data) {
             toastr.success(data.message)  
             $("#sport_hobby_items").load(location.href + ' #sport_hobby_items');
              $("#sport_hobby-form")[0].reset();
             $('#add_sport_hobby').modal('hide');               
            })
            .fail(function(data) {
             toastr.success(data.message) 
     
            })
            .always(function() {
             console.log("complete");
            })           
            
         });       
            
                                         
    </script>
      
    @endpush