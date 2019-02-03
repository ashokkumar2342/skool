{{-- <form action="webcam_submit" method="get" accept-charset="utf-8"> --}}
        
   
    
        <div class="col-md-12" id="show_webcam">
            <div class="text-center">
        <div id="camera_info"></div>
         <div id="camera"></div><br>

          
        <button id="take_snapshots" class="btn btn-success btn-sm">Take Snapshots</button>
        <button id="hide_webcam" class="btn btn-warning btn-sm">Hide</button>
        {{-- <input type="text" name="image" value="" id="image"> --}}
      </div>
    </div> 
 
 
@push('scripts')      
 <script>
     $('#showImg').on('click','.btn_web',function(){
        $('#show_webcam').show(); 
        $('#crop-show').hide(); 
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
            snapshot.show();
 
          snapshot.upload({
            api_url: "{{ url('api/imageweb',$student->id) }}"
        }).done(function(response) {
           $("#showImg").load(location.href + ' #showImg');  
           this.discard();
          }).fail(function(response) {
            alert("Upload failed with status " + response);
          });
        })
 
     
  });

 $('#show_webcam').on('click','#hide_webcam',function(){
    $('#show_webcam').hide('400');

 });

 !function(t){"use strict";var e=t.HTMLCanvasElement&&t.HTMLCanvasElement.prototype,o=t.Blob&&function(){try{return Boolean(new Blob)}catch(t){return!1}}(),n=o&&t.Uint8Array&&function(){try{return 100===new Blob([new Uint8Array(100)]).size}catch(t){return!1}}(),r=t.BlobBuilder||t.WebKitBlobBuilder||t.MozBlobBuilder||t.MSBlobBuilder,a=/^data:((.*?)(;charset=.*?)?)(;base64)?,/,i=(o||r)&&t.atob&&t.ArrayBuffer&&t.Uint8Array&&function(t){var e,i,l,u,b,c,d,B,f;if(e=t.match(a),!e)throw new Error("invalid data URI");for(i=e[2]?e[1]:"text/plain"+(e[3]||";charset=US-ASCII"),l=!!e[4],u=t.slice(e[0].length),b=l?atob(u):decodeURIComponent(u),c=new ArrayBuffer(b.length),d=new Uint8Array(c),B=0;B<b.length;B+=1)d[B]=b.charCodeAt(B);return o?new Blob([n?d:c],{type:i}):(f=new r,f.append(c),f.getBlob(i))};t.HTMLCanvasElement&&!e.toBlob&&(e.mozGetAsFile?e.toBlob=function(t,o,n){t(n&&e.toDataURL&&i?i(this.toDataURL(o,n)):this.mozGetAsFile("blob",o))}:e.toDataURL&&i&&(e.toBlob=function(t,e,o){t(i(this.toDataURL(e,o)))})),"function"==typeof define&&define.amd?define(function(){return i}):"object"==typeof module&&module.exports?module.exports=i:t.dataURLtoBlob=i}(window);

 </script>
    @endpush
