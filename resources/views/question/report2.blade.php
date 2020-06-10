 <!DOCTYPE html>
 <html>

 <head>
 	<head>
 	  <meta charset="utf-8"> 
 	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 	  <title>Question Report</title>
 	  <!-- Tell the browser to be responsive to screen width -->
 	  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 	<title></title>
  <style type="text/css" media="screen">
   @page  
   { 
       size: auto;   /* auto is the initial value */ 

       /* this affects the margin in the printer settings */ 
       margin: 25mm 25mm 25mm 25mm;  
   }
   
  </style>
 </head>
 <body>
 
    <table> 
      <tbody>
        @php
          $time =0;
        @endphp
        @foreach ($datas as $data)
        @if ($time==0)
        <tr>
        @endif 
          <td> {!! $data->id !!}.  </td>
          <td style="padding-right: 40px"> {!! $data->question !!} </td>
        @if ($time ==2)
          </tr>
        @endif
          @php
            $time ++;
          @endphp
          @if ($time==2)
           @php
             $time=0;
           @endphp
          @endif
         @endforeach 
      </tbody>
    </table>

 <script>window.MathJax = { MathML: { extensions: ["mml3.js", "content-mathml.js"]}};</script>
 <script type="text/javascript" async src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=MML_HTMLorMML"></script>
  <script src={!! asset('admin_asset/ckeditor4/ckeditor.js')!!}> </script>
  <script src="{{ asset('admin_asset/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
  
  <script src="http://mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
  <script>
    // var doc = new jsPDF()
     
    // doc.text('Hello world!', 10, 10)
    // doc.save('a4.pdf')
  </script>

  <script>
 
    window.print();
    
     
  </script>
 
 </body>
 </html>