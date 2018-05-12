{{-- <form action="webcam_submit" method="get" accept-charset="utf-8"> --}}
        
   
   <div class="container" id="show_webcam"> 
        <div class="col-md-6">
            <div class="text-center">
        <div id="camera_info"></div>
         <div id="camera"></div><br>

          
        <button id="take_snapshots" class="btn btn-success btn-sm">Take Snapshots</button>
        <button id="hide_webcam" class="btn btn-warning btn-sm">Hide</button>
        {{-- <input type="text" name="image" value="" id="image"> --}}
      </div>
    </div> 
    </div> <!-- /container -->  
{{-- </form> --}}
 
@push('scripts')      
 <script>
     $('#showImg').on('click','.btn_web',function(){
        $('#show_webcam').show(); 
           var options = {
             shutter_ogg_url: "{{ asset('jpeg_camera/shutter.ogg') }}",
             shutter_mp3_url: "{{ asset('jpeg_camera/shutter.mp3') }}",
             swf_url: "{{ asset('jpeg_camera/jpeg_camera.swf') }}",
           };
           var camera = new JpegCamera("#camera", options);
         
         $('#take_snapshots').click(function(){
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            var snapshot = camera.capture();
             console.log(snapshot.toString());
 
          snapshot.upload({
            api_url: "{{ route('admin.student.profilepic.webupdate',$student->id) }}"
        }).done(function(response) {
          $('#imagelist').prepend("<tr><td><img src='"+response+"' width='100px' height='100px'></td><td>"+response+"</td></tr>");
          }).fail(function(response) {
            alert("Upload failed with status " + response);
          });
        })
 
     
  });

 $('#show_webcam').on('click','#hide_webcam',function(){
    $('#show_webcam').hide('400');
 });

 </script>
    @endpush
