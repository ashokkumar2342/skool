 <!--- Model parents      -->     
     <!-- Modal -->
    <div id="remarks" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title"> Remarks</h4>
                 </div>
                 <div class="modal-body">
                   <div id="searchResult">
                     
                   </div>
                   <form id="remarks-form">
                     <div id="parent_id">
                       
                     </div>
                    <div class="form-group">
                        {{ Form::label('remark','Remarks',['class'=>' control-label']) }}                         
                        {{ Form::textarea('remark','',['class'=>'form-control','rows'=>2 ]) }}
                        <p class="text-danger">{{ $errors->first('remark') }}</p>
                        
                    </div>
                     <button type="button" class="btn_add_remark btn btn-success">Submit</button>
                    </form>                     

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                    
                </div>
            </div>
       </div>
    </div>
 @push('scripts')
  
<script type="text/javascript">  
      
 $('.modal-body').on('click', '.btn_add_remark', function() {    
       
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        $.ajax({
            url: "{{ route('registration.remark.add') }}",
            type: "POST",            
            data: $('#remarks-form').serialize(),  
        })
        .done(function(data) {
            if (data.message == data.message) {
                 toastr[data.class](data.message)  
                 $("#remarks-form")[0].reset();
                 $('#remarks').modal('hide');
                 
            }
              else {
                   toastr[data.class](data.message) 
                  
            } 
        })
        .fail(function(data) {
         toastr.success("Somthing Went Wrong") 
 
        }) 
        
     }); 
 
function modelShow(id){
  $('#parent_id').append('<input type="hidden" name="parent_id" id="parent_id" value="'+id+'">');
    $('#remarks').modal('show');
   
   
    $.ajax({
        url: "{{ route('registration.remark.show') }}",
        type: "get",            
        data: {id:id},  
    })
    .done(function(response) {
         $.each(response, function(index, val) {
             
            $('#searchResult').html('<p>'+val.remarks+'</p>');
        });
             
        
       }) 
   
    .fail(function(response) {
     toastr.success("Somthing Went Wrong") 
    
    }) 
  }  
 
                                      
</script>
  
@endpush