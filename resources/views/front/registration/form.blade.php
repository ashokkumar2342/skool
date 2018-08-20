 @extends('front.layout.base')
 @push('links')
 <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
 @endpush
@section('body')
   <section class="content-header">
         <h1>
           Registration Form
           <small>Control panel</small>
         </h1>
         <ol class="breadcrumb">
           <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
           <li class="active">Dashboard</li>
         </ol>
       </section>

     <!-- Main content -->
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">  
                <div class="col-md-12">
                   <ul class="nav nav-tabs">
                     <li class="active"><a data-toggle="tab" href="#menu1">Student Details</a></li> 
                     <li><a data-toggle="tab" href="#menu2">Previous School</a></li> 
                     <li><a data-toggle="tab" href="#menu3">Address</a></li> 
                     <li><a data-toggle="tab" href="#menu4">Father Details</a></li> 
                     <li><a data-toggle="tab" href="#menu5">Mother Details</a></li> 
                     <li><a data-toggle="tab" href="#menu6">Guardian Details</a></li> 
                     <li><a data-toggle="tab" href="#menu7">Sibling</a></li> 
                     <li><a data-toggle="tab" href="#menu8">Career Considered</a></li> 
                     <li><a data-toggle="tab" href="#menu9">Other Details</a></li> 
                     <li><a data-toggle="tab" href="#menu10">Declaration</a></li> 
           
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
 
 
</body>


@endpush
