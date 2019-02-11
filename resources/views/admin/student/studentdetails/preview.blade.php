   <div class="modal-dialog" style="width:90%"> 
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header"> 
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Student Details</h4>

      </div>
      <div class="modal-body">
        <form class="form-group form-horizontal">
        <div class="row">
          <div class="col-lg-6 form-horizontal" >
             Name : {{ $student->name }}
          </div>
          <div class="col-lg-6"> 
            Nick Name : {{ $student->nick_name }}
          </div>
          <div class="col-lg-6"> 
            Email: {{ $student->email }}
          </div>
          <div class="col-lg-6"> 
            Class  : {{ $student->class_id  }}
          </div>
          <div class="col-lg-6"> 
            Section  : {{ $student->section_id }}
          </div>
          <div class="col-lg-6"> 
            Registration No : {{ $student->registration_no }}
          </div>
          <div class="col-lg-6"> 
            Addmission No: {{ $student->admission_no  }}
          </div>
          <div class="col-lg-6"> 
         Date Of Addmission : {{ $student->date_of_admission }}
          </div>
          <div class="col-lg-6"> 
           Date of Activation : {{ $student->date_of_activation }}
          </div>
          <div class="col-lg-6"> 
          Date Of Birth : {{ $student->dob }}
          </div>
          <div class="col-lg-6"> 
            Gender : {{ $student->genders }}
          </div>
          <div class="col-lg-6"> 
            Parmanent Address  : {{ $student->p_address }}
          </div>
          <div class="col-lg-6"> 
            User Name : {{ $student->username }}
          </div> 
          <div class="col-lg-6"> 
            Password  : {{ $student->tem_pass }}
          </div> 
          <div class="col-lg-6"> 
            Father's Name : {{ $student->father_name }}
          </div>
           <div class="col-lg-6"> 
            Mother's Name : {{ $student->mother_name }}
          </div>
           <div class="col-lg-6"> 
            Father's Mobile : {{ $student->father_mobile }}
          </div> 
          <div class="col-lg-6"> 
            Mother's Mobile : {{ $student->mother_mobile }}
          </div>
           <div class="col-lg-6"> 
            Category  : {{ $student->name }}
          </div>
          <div class="col-lg-6"> 
            Religion : {{ $student->name }}
          </div>
          <div class="col-lg-6"> 
            City : {{ $student->city }}
          </div>
          <div class="col-lg-6"> 
            State : {{ $student->state }}
          </div>
          <div class="col-lg-6"> 
            Pincode : {{ $student->pincode }}
          </div> 
          <div class="col-lg-6"> 
            Corespondance Address: {{ $student->c_address }}
          </div>
             </form>

        </div>

        
      </div>
    </div>
  </div>                           
                           