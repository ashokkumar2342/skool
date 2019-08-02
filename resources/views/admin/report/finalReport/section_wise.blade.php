@if ($checkMenuID==1)
  
           <div class="col-lg-4">
              <label>Section Name</label></br>
              <select name="section_wise[]"  class="form-control multiselect" multiple="multiple">
                <option value="1">Student Details</option>
                <option value="2">Perent Details</option>
                <option value="3">Medical Details</option>
                <option value="4">Sibling Details</option>
                <option value="5">Subject Details</option>
                <option value="6">Document Details</option> 
              </select> 
            </div>
           <div class="col-lg-2" style="margin-top: 20px">
              <label>Document Marge</label>
              <input type="checkbox" name="document_marge" value="1">
            </div>
   @endif
   @if ($checkMenuID==2)
  
<div class="col-lg-4">
              <label>Fild Name</label></br>
              <select name="fild_name[]"  class="form-control multiselect" multiple="multiple">
                <h2><optgroup label="Student Details"></optgroup></h2>
                <option value="name">name</option>
                <option value="father_name">Father name</option>
                <option value="mother_name">Mother name</option>
                <option value="father_mobile">Mobile No</option>
                <option value="registration_no">Registration No</option>
                <option value="admission_no">Admission No</option> 
                <option value="date_of_admission">Date of Admission</option>
                <option value="date_of_birth">Date of Birth</option> 
                <option value="email">Email</option>
                <option value="username">Username</option>
                
                <h2><optgroup label="Perent Details"></optgroup></h2> 
                <option value="1">Father Details</option>
                <option value="2">Mother Details</option>
                <option value="3">Grand Father Details</option> 
                <h2><optgroup label="Medical Details"></optgroup></h2>
                <option value="ondate">Ondate</option>
                <option value="bloodgroups">Bloodgroups</option> 
                <option value="hb">HB</option> 
                <option value="bp">BP</option> 
                <option value="height">Height</option> 
                <option value="weight">Weight</option> 
                <option value="dental">Dental</option> 
                <option value="vision">Vision</option> 
                <h2><optgroup label="Sibling Details"></optgroup></h2>
                <option value="sib_registration_no">registration_no</option>
                <option value="sib_name">name</option>
                {{-- <h2><optgroup label="Subject Details"></optgroup></h2>
                <option value="sib_registration_no">registration_no</option>
                <option value="sib_name">  name</option>
                <h2><optgroup label="Document Details"></optgroup></h2>
                <option value="sib_registration_no">registration_no</option>
                <option value="sib_name">  name</option>  --}}
              </select>
              
            </div>
   @endif
          @if (empty($registration))
              <div class="col-lg-10 text-center"> 
               <input type="submit" value="Request" class="btn btn-success" style="margin: 28px;margin-right: 10px">
              </div> 
              @else
              <div class="col-lg-10 text-center"> 
               <input type="submit" value="Download PDF" class="btn btn-success" style="margin: 28px;margin-right: 10px">
              </div>
          @endif