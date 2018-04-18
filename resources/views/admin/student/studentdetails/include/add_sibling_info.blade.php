 <!--- Model parents      -->     
     <!-- Modal -->
    <div id="add_sibling" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title"> Add</h4>
                 </div>
                 <div class="modal-body">
                   <form id="sibling-form">                    
                    <div class="form-group">
                         {{ Form::label('student_sibling_id','Student Sibling Registration No',['class'=>'control-label', 'required']) }}                         
                         {{ Form::text('student_sibling_id','',['class'=>'form-control']) }}
                         <p class="text-danger">{{ $errors->first('student_sibling_id') }}</p>
                     </div> 
                    </form>                     

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="add_btn_sibling btn btn-success">Save</button>
                    <button type="button" class="update_btn_sibling btn btn-success">Update</button>
                </div>
            </div>
       </div>
    </div>
@push('scripts')      
    <script type="text/javascript">
     
$(document).ready(function(event) { 
    $('.btn_add_sibling_info').click(function(event) {
        $("#sibling-form")[0].reset();
        $('.update_btn_sibling').hide('400');
        $('.add_btn_sibling').show('400');
        
    });                
                  
      // add medeical information  
     $('.modal-footer').on('click', '.add_btn_sibling', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })
            $.ajax({
                url: "{{ route('admin.sibling.add',$student->id) }}",
                type: "POST",            
                data:   
                    $('#sibling-form').serialize() + '&student_id=' + {{ $student->id }},                  
            })
            .done(function(data) {
             toastr.success(data.message)  
             $("#sibling_items").load(location.href + ' #sibling_items');
              $("#sibling-form")[0].reset();
             $('#add_sibling').modal('hide');               
            })
            .fail(function(data) {
             toastr.success(data.message) 
     
            })
            .always(function() {
             console.log("complete");
            })           
            
         }); 
       
      // delete medeical information 
    $( "#sibling_items" ).on( "click", ".btn_sibling_delete", function() { 
        var id = $(this).data("id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax(
        {
            url: "{{ route('admin.sibling.delete') }}",
            type: 'delete', // replaced from put
            dataType: "JSON",
            data: {
                "id": id // method and token not needed in data
            },
        })
            .done(function(respone) {
             toastr.success(respone.message)  
             $("#sibling_items").load(location.href + ' #sibling_items');              
              $("#sibling-form")[0].reset();               
            })
            .fail(function() {
                toastr.success('Somthing went wrong') })
         });
    // Edit medeical information  
 $( "#sibling_items" ).on( "click", ".btn_sibling_edit", function() {   
    $('#add_sibling').modal('show');
    $('.add_btn_sibling').hide('400');   
    $('.update_btn_sibling').show('400');   
    var id = $(this).data("id");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax(
    {
        url: "{{ route('admin.sibling.edit') }}",
        type: 'GET', // replaced from put
        dataType: "JSON",
        data: {
            "id": id // method and token not needed in data
        },
    })
    .done(function( response ) {   

                    
            if(response.siblingInfo.length>0){            
                for (var i = 0; i < response.siblingInfo.length; i++) {
                    
                    
                    $('#student_sibling_id').val(response.siblingInfo[i].student_sibling_id);  
                  
                    $('#sibling-form').append('<input type="hidden" name="id" value="'+response.siblingInfo[i].id+'" />');
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
     $('.modal-footer').on('click', '.update_btn_sibling', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })
            $.ajax({
                url: "{{ route('admin.sibling.update') }}",
                type: "POST",            
                data:   
                    $('#sibling-form').serialize() + '&student_id=' + {{ $student->id }},                  
            })
            .done(function(data) {
             toastr.success(data.message)  
             $("#sibling_items").load(location.href + ' #sibling_items');
              $("#sibling-form")[0].reset();
             $('#add_sibling').modal('hide');               
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