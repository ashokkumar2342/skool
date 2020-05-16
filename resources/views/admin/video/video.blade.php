{{-- <div class="col-lg-3">
    <input type="file" multiple="true" name="video" style="margin-top:20px">
    </div>
    <div class="col-lg-1 col-md-1 col-xs-1">
      <input type="submit" class="btn btn-success btn-sm" style="margin-top: 20px">
    </div>
    <div class="col-lg-12 table-responsive" style="margin-top: 20px">
    <table class="table">
      <tbody>
    @foreach ($videos as $video)
        <tr>
        <td>
           @php
           $path = route('admin.video.and.pdf.play',$video->path);
           @endphp
           <video width="300" controls>
               <source src="{{ route('admin.video.and.pdf.play',$video->path) }}" type="video/mp4">
           </video>
           <a href="#" class="btn btn-xs btn-danger" style="margin-top: -150px"><i class="fa fa-trash"></i></a>
        </td>
        <td>
        </td>
        </tr>
        @endforeach 
        </tbody>
        </table>
        </div> --}}