 @extends('admin.layout.base')
@section('body')
  <!-- Main content -->
  <section class="content-header"> 
    <h1>Send Sms<small></small></h1>
    </section>  
    <section class="content"> 
      <div class="box"> 
        <div class="box-body">
          <div class="btn-group btn-group-justified">
            {{-- <a href="#" class="btn btn-primary" id="btn_1" onclick="callAjax(this,'{{ route('admin.sms.send.form',1) }}','send_form')">Mobile No.</a> --}}
            <a href="#" class="btn btn-primary" id="btn_1" multiselect-form="true" onclick="callAjax(this,'{{ route('admin.sms.send.form',1) }}','send_form')">Class Wise</a>
            <a href="#" class="btn btn-primary"  multiselect-form="true" onclick="callAjax(this,'{{ route('admin.sms.send.form',2) }}','send_form')">Class With Section</a>
            <a href="#" class="btn btn-primary" select2="true" multiselect-form="true" onclick="callAjax(this,'{{ route('admin.sms.send.form',3) }}','send_form')">Student Wise</a>
          </div>
          <form class="add_form" action="{{ route('admin.sms.sendSms') }}" method="post" button-click="btn_1">
          {{ csrf_field() }}
          <div id="send_form" style="margin-top: 24px">
             
           </div>
          </form> 
        </div>
      </div>
    </section> 
 @endsection
 @push('scripts') 
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
 
<script type="text/javascript">
  $('#btn_1').click();
    $(document).ready(function() {
      var text_max = 0;
      $('#textarea_feedback').html(text_max + ' characters ');

      $('#textarea').keyup(function() {
          var text_length = $('#textarea').val().length;
           

          $('#textarea_feedback').html(text_length + ' characters');
      });
    }); 
    function classWise(){
      
      if($('#class_wise').is(":checked")) {
              $('.class_div').show(400);
              $('.number_div').hide(400);
      } else {
          $('.class_div').hide(400);
          $('.number_div').show(400);
      }
    }
    function SectionWise(){
      if($('#class_wise').is(":checked") && $('#section_wise').is(":checked")) {
              $('.section_div').show();
      } else {
          $('.section_div').hide();
      }
    }
 
      $("#class").change(function(){ 
        $('#section').html('<option value="">Searching ...</option>');
        $.ajax({
          method: "get",
          url: "{{ route('admin.manageSection.search') }}",
          data: { id: $(this).val() }
        })
        .done(function( response ) {            
            if(response.length>0){
                $('#section').html('<option value="">Select Section</option>');
                for (var i = 0; i < response.length; i++) {
                    $('#section').append('<option value="'+response[i].id+'">'+response[i].name+'</option>');
                } 
            }
            else{
                $('#section').html('<option value="">Not found</option>');
            }            
        });
    }); 
    
</script>
        
    </script>    
</script>
@endpush