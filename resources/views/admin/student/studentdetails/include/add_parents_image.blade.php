 <!--- Model parents      -->     
     <!-- Modal -->
    <div id="image_parents" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title"> Upload Image</h4>
                 </div>
                 <div class="modal-body">
                   <form  id="image-form" method="post" enctype="multipart/form-data">
                     
                     
                     <input type="hidden" name="student_id" id="student_id" value="{{ $student->id }}">
                    <div class="form-group">
                        {{ Form::label('file','Image',['class'=>' control-label']) }}                         
                        {{-- {{ Form::file('file','',['class'=>'form-control',' required']) }} --}}
                        <input type="file" name="image" id="image" required="">
                        <p class="text-danger">{{ $errors->first('file') }}</p>

                        <input type="hidden" name="parents_id" id="parents_id" value="">
                    </div>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     
                    <button type="button" class="btn_save_image btn btn-success">Save</button>
                </div>
             </form> 
              
            </div>
       </div>
    </div>
 @push('scripts')
  
<script>

    $( "#parents_items" ).on( "click", ".btn_parents_image", function() {   
       $('#image_parents').modal('show'); 
       var id = $(this).data("id");
       $('#parents_id').val(id);
       
    });
     $( "#image_parents" ).on( "click", ".btn_save_image", function(e) {   
 

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        e.preventDefault();
        var image = $('#image')[0].files[0];
        var parents = $('#parents_id').val();
        var student = $('#student_id').val();
      var formData = new FormData(this);
       
      formData.append('image', image);
      formData.append('parent_id', parents);
      formData.append('student_id', student);
      $.ajax({
          url: '{{ route('admin.parents.image') }}',
          type: 'POST',          
          data: formData,
          processData: false,
          contentType: false,
      })
      .done(function(data) {
           toastr[data.class](data.message)  
           $("#image-form")[0].reset();
           $("#parents_items").load(location.href + ' #parents_items');
          $('#image_parents').modal('hide');
      })
      .fail(function() {
          console.log("error");
      })
      .always(function() {
          console.log("complete");
      });
       
    });
</script>
  
@endpush