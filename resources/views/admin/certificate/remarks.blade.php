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
                       <table class="table table-bordered"> 
                          <thead>
                          <tr>
                              <th style="width: 100px">Remarks By</th>
                              <th style="width: 100px">Date</th>
                              <th>Remarks</th> 
                          </tr> 
                          </thead>
                          <tbody id="searchResult"> 
                          </tbody> 
                    </table>
                   <form id="remarks-form">
                     
                    <div class="form-group">
                        {{ Form::label('remark','Remarks',['class'=>' control-label']) }}                         
                        {{ Form::textarea('remark','',['class'=>'form-control','rows'=>2 ]) }}
                        <p class="text-danger">{{ $errors->first('remark') }}</p>
                        <input type="hidden" name="certificate_id" id="certificate_id" value="">
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
       var id = $('certificate_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        $.ajax({
            url: "{{ route('admin.remark.add') }}",
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
 
$( "#dataTable" ).on( "click", ".btn_add_remarks", function() {
    $('#remarks').modal('show');
    var id = $(this).data("id");
    $('#certificate_id').val(id);
    $.ajax({
        url: "{{ route('admin.remark.show') }}",
        type: "get",            
        data: {id:id},  
    })
    .done(function(response) {
       if(response.length>0){
           $('#searchResult').html('');
           for (var i = 0; i < response.length; i++) {
             $('#searchResult').append(response[i]);
             
           } 
       }
       else{
           $('#searchResult').html('<tr><td colspan="7"><h4 class="text-danger text-center">Record not found</h4></td></tr>');
       }
       }) 
   
    .fail(function(response) {
     toastr.success("Somthing Went Wrong") 
    
    }) 
    
 });
                                      
</script>
  
@endpush