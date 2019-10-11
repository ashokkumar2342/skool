<div class="row"> 
        <div class="col-lg-2">
          @php
            $schoolDetails=App\School_details::first(); 
            // $logo = route('admin.student.logo.image',$schoolDetails->logo);
                
            $path =storage_path('app/'.$schoolDetails->logo);
          @endphp
          <img  src="{{ $path }}" alt="" width="60%" style="margin: 70px ; margin-top: 25"> 
        </div>
        <div class="col-lg-10" style="margin-left: 90px">
          <h2 style="color:#7f2809;"><b>{{ $schoolDetails->name }}</b></h2><h6>(Affiliated to C.B.S.E, New Delhi)</h6><h6>Affiliation No 3456789 | School Code 47789</h6><h5><b>{{ $schoolDetails->address }}</b></h5> 
        </div>
       </div>