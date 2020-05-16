<div class="col-lg-3">
    <input type="file" multiple="true" name="pdf" style="margin-top:20px">
</div>
<div class="col-lg-1 col-md-1 col-xs-1">
    <input type="submit" class="btn btn-success btn-sm" style="margin-top: 20px">
</div>
<div class="col-lg-12 table-responsive">
    <table class="table">
        <th></th>
        <th></th>
        <tbody>
            @foreach ($pdfs as $pdf)
            <tr>
                <td>
                    <a href="{{ route('admin.video.and.pdf.play',$pdf->path) }}" target="blank" style="margin:10px">{{ $pdf->path?'Open the pdf!' : '' }}</a>
                    <a href="{{ route('admin.video.and.pdf.destroy',Crypt::encrypt($pdf->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');"  class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>