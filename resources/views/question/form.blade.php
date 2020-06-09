
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ISKOOL</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <meta name="_token" content="{!! csrf_token() !!}" />
  <link rel="stylesheet" href="{{ asset('admin_asset/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin_asset/dist/css/font-awesome.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin_asset/dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin_asset/dist/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('admin_asset/dist/css/print.min.css')}}">
  {{-- <link rel="stylesheet" href="{{ asset('admin_asset/dist/css/alt/AdminLTE-select2.min.css')}}"> --}}
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('admin_asset/dist/css/skins/_all-skins.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin_asset/plugins/multiple-select/css/multi-select.css')}}">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link href="{!! asset('admin_asset/dist/css/bootstrap-multiselect.css') !!}"  rel="stylesheet" type="text/css">
  <link href="{!! asset('admin_asset/dist/css/summernote.css') !!}"  rel="stylesheet" type="text/css">
  <link href="{!! asset('admin_asset/dist/css/croppie.css') !!}"  rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  
   
  
  <style type="text/css" media="screen">
    th {
    text-transform: uppercase;
     }
     .content-header>.breadcrumb>li+li:before {
         content: '|\00a0';
    }
     .text-white{
      
     }    

      .fa-asterisk {
     color: red;
     font-size:7px; 
     vertical-align: super;
   }
   .cursor:hover{
    cursor: pointer !important; 
    color:#2d4e94 !important;
    text-decoration: underline !important;
   }
   .cursor{
    cursor: pointer !important; 
    color:#2d4e94 !important;
    text-decoration: underline !important;
   }

  </style>

  @stack('links')
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-red sidebar-mini" id="body_id">
    <!-- Site wrapper -->
    <div class="wrapper">
      {{-- @include('admin.include.header') --}}
      {{-- @include('admin.include.sidebar') --}}
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('body')
            <section class="content">
                <div class="box">
                    <div class="box-header">
                         
                        <h3 class="box-title">Question </h3>
                        <div class="pull-right">
                            <a href="{{ route('question.report') }}" class="btn btn-success" title="" target="_blank">Report 1</a>
                        <a href="{{ route('question.report2') }}" class="btn btn-info" title="" target="_blank">Report 2</a>
                        </div>
                        
                    </div>
                    <form action="{{ route('question.store') }}" method="post"  accept-charset="utf-8"> 
                        {{ csrf_field() }}
                        <div class="box-body" id="div_user_list_table_show"> 
                            <textarea name="editor_question" id="editor_question">
                                 
                            </textarea>
                                             
                        </div>
                        <input type="submit" name="submit"   class="btn btn-success">
                    </form>

                    <div >
                         @foreach ($datas as $data)
                            <div>
                               {!!  $data->name !!} 
                            </div>
                         @endforeach
                     </div> 
                     <div>
                        
                </div>
               <div class="row">
                   <div class="col-lg-12">
                      <table class="table">
                           <thead>
                               <tr>
                                   <th>Id</th>
                                   <th>Question</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                            @foreach($datas as $data)
                               <tr>
                                   <td>{{ $data->id }}</td>
                                   <td>{!! $data->question !!}</td>
                                   <td><a href="{{ route('question.delete',$data->id) }}" class="btn btn-success" title="">Delete</a></td>
                               </tr>
                             @endforeach  
                           </tbody>
                       </table> 
                       <div>
                           {{ $datas->links() }}
                       </div>
                   </div>
               </div>
            </section>
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
           
            </div>
            <strong>Copyright &copy; {{ date('Y') }} <a href="http://www.innovusine.com"></a>.</strong> All rights reserved.
        </footer>

        <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <script src="{{ asset('admin_asset/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{ asset('admin_asset/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('admin_asset/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin_asset/plugins/fastclick/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin_asset/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/multiple-select/js/jquery.multi-select.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin_asset/dist/js/demo.js') }}"></script>
    <script src="{{ asset('admin_asset/dist/js/toastr.min.js') }}"></script>
    <script src="{{ asset('admin_asset/dist/js/print.min.js') }}"></script>
    <script src={!! asset('admin_asset/dist/js/validation/common.js?ver=1') !!}></script>
    <script src={!! asset('admin_asset/dist/js/customscript.js?ver=1') !!}></script>
    <script src={!! asset('admin_asset/dist/js/bootstrap-multiselect.js')!!}> 
    </script>

{{-- <script src="{{ asset('admin_asset/plugins/select2/select2.full.min.js') }}"></script> --}}
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 {{-- <script src="{{ asset('admin_asset/plugins/select2/select2.full.min.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> 
 <script src={!! asset('admin_asset/dist/js/summernote.js?ver=1') !!}></script>
 <script src={!! asset('admin_asset/dist/js/croppie.js?ver=1') !!}></script>
 <script src={!! asset('admin_asset/dist/js/loader.js') !!}></script>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 {{-- <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
 <script src="https://cdn.ckeditor.com/ckeditor5/19.1.0/classic/ckeditor.js"></script> --}}
 <script>window.MathJax = { MathML: { extensions: ["mml3.js", "content-mathml.js"]}};</script>
 <script type="text/javascript" async src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=MML_HTMLorMML"></script>
  <script src={!! asset('admin_asset/ckeditor4/ckeditor.js')!!}> 

     </script>

 <script>

  
     CKEDITOR.config.toolbar_Full =
         [
         { name: 'document', items : [ 'Source'] },
         { name: 'clipboard', items : [ 'Cut','Copy','Paste','-','Undo','Redo' ] },
         { name: 'editing', items : [ 'Find'] },
         { name: 'basicstyles', items : [ 'Bold','Italic','Underline'] },
         { name: 'paragraph', items : [ 'JustifyLeft','JustifyCenter','JustifyRight'] }
         ];
     CKEDITOR.config.height = '300px';
     CKEDITOR.plugins.addExternal('divarea', '../extraplugins/divarea/', 'plugin.js');
     
     CKEDITOR.replace('editor_question', {
          extraPlugins: 'base64image,divarea,ckeditor_wiris',
          language: 'en'
     });
     
 </script>  
{{--     <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script> --}}

      {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
      {{-- @include('admin.include.message') --}}
      @if(Session::has('message'))
       
      <script type="text/javascript">
          Command: toastr["{{ Session::get('class') }}"]("{{ Session::get('message') }}");
      </script>
      @endif
      @include('admin.include.model')
    @stack('scripts')
    <script>
      $( ".datepicker").datepicker({dateFormat:'dd-mm-yy'}); 
      $('.select2').select2();
       //$('.multiselect').selectpicker(); 
        
       $('.multiselect').multiselect({
       
                    includeSelectAllOption: true,
                             maxHeight: 400, 
                          buttonWidth: '80%',
                         
                                
                       
                           enableFiltering: true
              
       
           });
       
    </script> 
</body>
</html>
 