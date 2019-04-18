@extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
 
@endpush
@section('body')
<section class="content-header">
    <h1> SMS</h1>
      <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>        
      </ol>
</section>
    <section class="content">        
        {{Form::close()}}
      	<div class="box">        
            <!-- /.box-header -->
           
               <div class="row">
                   <div class="col-md-12">
                     <div class="checkbox text-center">
                       <label style="padding-right: 50px"><input type="checkbox" value="class_wise" name="class_wise" id="class_wise" onclick="classWise()">Class</label>
                       <label><input type="checkbox" value="section_wise" id="section_wise" name="section_wise" onclick="SectionWise()">Section</label> 
                     </div>
                     
                     </div> 
                    <form class="form-group col-md-11 add_form" action="{{ route('admin.sms.sendSms') }}" method="post" id="theform" novalidate>
                    {{ csrf_field() }}
                      
                      <div class="form-group col-md-12 class_div" style="display: none">
                        <label>Class</label>
                         {!! Form::select('class',$classes, '', ['class'=>'form-control', 'id'=>'class' ,'placeholder'=>'Select Class','required']) !!}
                      </div>

                    <div class="form-group col-md-12 section_div" style="display: none">
                        <label>Section</label>
                         {!! Form::select('section',[], null, ['class'=>'form-control','id'=>'section','placeholder'=>'Select Section']) !!}
                      </div>
                      <div class="form-group col-md-12 number_div">
                        <label   for="text">Mobile Number</label>
                        <textarea class="form-control" rows="2" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="mobile" id="txtboxToFilter" placeholder="Enter number" required=""  maxlength="10" ></textarea>
                        <p class="text-danger">{{ $errors->first('mobile') }}</p>
                      </div>                         
                      <div class="form-group col-md-12">
                        <label for="comment">Message:</label>
                        <textarea class="form-control" rows="5" name="message" id="textarea" placeholder="Enter message" required=""></textarea>
                        <p class="text-danger">{{ $errors->first('message') }}</p>
                       <span id="textarea_feedback">160 characters remaining</span>
                      </div>                
                        {{-- <button type="submit" class="btn btn-success" id="btnsubmit">Submit</button> --}}
                        <div class="text-center">
                          <input type="submit" class="btn btn-success"  value="send" id="btnsubmit">
                        </div>
                      </form> 
                   
               </div>
            </div>
            <!-- /.box-body -->
           
        </div>
        <!-- /.box -->
 
    </section>

    <!-- /.content -->
@endsection
 @push('scripts') 
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
 
<script type="text/javascript">
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