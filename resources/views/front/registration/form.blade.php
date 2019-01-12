 @extends('front.layout.base')
 @push('links')
 <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
   <style type="text/css" media="screen">
       .fa-asterisk{
        color:red;
       }
   </style>
 @endpush
 
@section('body')
   <section class="content-header">
         <h1>
           Registration Form
           <small>Control panel</small>
         </h1>
         <ol class="breadcrumb">
           <li><button type="button"   onclick="callPopupLarge(this,'{{ route('preview',Crypt::encrypt($pr->id)) }}')" class="btn btn-primary btn-size-xs" data-toggle="modal"  >Preview </button></li> 
           <li> 
              <a href="{{ route('preview.download',Crypt::encrypt($pr->id)) }}" class="btn btn-info btn-size-xs" target="_blank" title="download">Download</a>
           </li> 
         </ol>
       </section>

     <!-- Main content -->
    <section class="content">
        <div class="box">
          @php
            $active = $pr->status+1;
            $menu =$pr->status;
            $btn = 'address';
          @endphp             
            <!-- /.box-header -->
            <div class="box-body">  
                <div class="col-md-12">
                   <ul class="nav nav-tabs">
                     <li id="mm1" ><a data-toggle="tab" href="#menu1">Student Details </a></li> 
                     <li id="mm2" ><a data-toggle="tab" href="#menu2">Previous School </a></li> 
                     <li id="mm3"><a data-toggle="tab" href="#menu3">Address</a></li> 
                     <li id="mm4" ><a data-toggle="tab" href="#menu4">Father Details</a></li> 
                     <li id="mm5" ><a data-toggle="tab" href="#menu5">Mother Details</a></li> 
                     <li id="mm6" ><a data-toggle="tab" href="#menu6">Guardian Details</a></li> 
                     <li id="mm7" ><a data-toggle="tab" href="#menu7">Sibling</a></li> 
                     <li id="mm8" ><a data-toggle="tab" href="#menu8">Career Considered</a></li> 
                     <li id="mm9" ><a data-toggle="tab" href="#menu9">Other Details</a></li> 
                     <li id="mm10" ><a data-toggle="tab" href="#menu10">Document</a></li> 
                     <li id="mm11" ><a data-toggle="tab" href="#menu11">Declaration</a></li> 
           
                   </ul>

                   <div class="tab-content">
                     <div id="menu1" class="tab-pane fade in active">                       
                         @include('front.registration.include.studentDetails')                        
                     </div>
                     <div id="menu2" class="tab-pane">
                        @include('front.registration.include.previousSchool') 
                     </div>
                     <div id="menu3" class="tab-pane fade">
                        @include('front.registration.include.address') 
                     </div>
                     <div id="menu4" class="tab-pane fade">
                        @include('front.registration.include.father') 
                     </div>
                     <div id="menu5" class="tab-pane fade">
                        @include('front.registration.include.mother') 
                     </div>
                     <div id="menu6" class="tab-pane fade">
                        @include('front.registration.include.guardian') 
                     </div>
                     <div id="menu7" class="tab-pane fade">
                        @include('front.registration.include.sibling') 
                     </div>
                     <div id="menu8" class="tab-pane fade">
                        @include('front.registration.include.career') 
                     </div>
                     <div id="menu9" class="tab-pane fade">
                        @include('front.registration.include.other') 
                     </div>
                     <div id="menu10" class="tab-pane fade">
                        @include('front.registration.include.document') 
                     </div> 
                     <div id="menu11" class="tab-pane fade">
                        @include('front.registration.include.declaration') 
                     </div> 
                   </div> 
                </div>

                 
            </div>
        </div> 

     </section>
     <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
  
@endsection
@push('scripts')
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script>
     
      $( document ).ready(function() {
        $( ".menu{{ $menu }}" ).trigger("click");         
    });
      function menu(val){         
        var array = val.split("mm"); 
        var lastEl = array[array.length-1];
          finaldata = lastEl-1;
             
        $('#mm'+finaldata+'').removeClass('active');    
        $('#'+val+'').addClass('active');    
       
         
      }
     
      $("#SiblingYes").click(function() {
        $('#tdSibling').show(400); 
    
    }); 
     $("#SiblingNo").click(function() {
        $('#tdSibling').hide(400); 
    
    }); 

     function chkagreeshowHide()
     {   
         if($('#chkAgree').is(":checked"))   
             $("#btn-final-Save").attr("disabled", false);
         else
             $("#btn-final-Save").attr("disabled", true);
     }
     
     

   </script>
@endpush
