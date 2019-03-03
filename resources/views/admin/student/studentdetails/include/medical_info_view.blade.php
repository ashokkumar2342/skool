   <style type="text/css" media="screen">
  .bd{
    border-bottom: #eee solid 2px;;
  }
  
</style>
   <div class="modal-dialog" style="width:70%"> 
    <div class="modal-content">
      <div class="modal-header"> 
        <button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button> 
          <h4 align="center"><b>Student Details</b></h4>
          </div>
         <div class="modal-body">
          <div class="row">  
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
               <div class="col-lg-6 b-r">
                   <div class="form-horizontal">
                       <div class="box-body">
                           <div class="form-group">
                               <div class="col-sm-12 bd"> 
                                <p>Height :<b> {{ $studentMedicalInfo->height or '' }}  </b> </p>  
                               </div>
                           </div>
                           <div class="form-group">
                               <div class="col-sm-12 bd"> 
                                <p>Blood Group :<b> {{ $studentMedicalInfo->bloodgroups->name or '' }}  </b> </p>  
                               </div>
                           </div> 
                           <div class="form-group">
                               <div class="col-sm-12 bd"> 
                                <p>BP Uper:<b> {{ $studentMedicalInfo->bp_uper or '' }}  </b> </p>  
                               </div>
                           </div>
                            <div class="form-group">
                               <div class="col-sm-12 bd"> 
                                <p>Narration:<b> {{ $studentMedicalInfo->narration or '' }}  </b> </p>  
                               </div>
                           </div>
                           <div class="form-group">
                               <div class="col-sm-12 bd"> 
                                <p>Alergey:<b> {{ $studentMedicalInfo->alergey or '' }}  </b> </p>  
                               </div>
                           </div>
                           <div class="form-group">
                               <div class="col-sm-12 bd"> 
                                <p>Dental:<b> {{ $studentMedicalInfo->dental or '' }}  </b> </p>  
                               </div>
                           </div> 
                           <div class="form-group">
                               <div class="col-sm-12 bd"> 
                                <p>Physical Handicapped:<b> {{ $studentMedicalInfo->physical_handicapped or '' }}  </b> </p>  
                               </div>
                           </div> <div class="form-group">
                               <div class="col-sm-12 bd"> 
                                <p>ID_marks1  :<b> {{ $studentMedicalInfo->id_marks1 or '' }}  </b> </p>  
                               </div>
                           </div>
                        </div>
                    </div>
               </div>
               <div class="col-lg-6 b-r">
                   <div class="form-horizontal">
                       <div class="box-body">
                           <div class="form-group">
                               <div class="col-sm-12 bd"> 
                                <p>Weight :<b> {{ $studentMedicalInfo->weight or '' }}  </b> </p>  
                               </div>
                           </div> 
                           <div class="form-group">
                               <div class="col-sm-12 bd"> 
                                <p>BP Lower :<b> {{ $studentMedicalInfo->bp_lower or '' }}  </b> </p>  
                               </div>
                           </div> 
                           <div class="form-group">
                               <div class="col-sm-12 bd"> 
                                <p>Hemoglobin :<b> {{ $studentMedicalInfo->hb or '' }} </b> </p>  
                               </div>
                           </div> 
                           <div class="form-group">
                               <div class="col-sm-12 bd"> 
                                <p>Vision :<b> {{ $studentMedicalInfo->vision or '' }} </b> </p>  
                               </div>
                           </div> 
                           <div class="form-group">
                               <div class="col-sm-12 bd"> 
                                <p>Alergey Vacc :<b> {{ $studentMedicalInfo->alergey_vacc or '' }} </b> </p>  
                               </div>
                           </div>
                           <div class="form-group">
                               <div class="col-sm-12 bd"> 
                                <p>Complextion  :<b> {{ $studentMedicalInfo->complextion or '' }} </b> </p>  
                               </div>
                           </div> 
                           <div class="form-group">
                               <div class="col-sm-12 bd"> 
                                <p>ID_marks2  :<b> {{ $studentMedicalInfo->id_marks2 or '' }} </b> </p> 
                               </div>
                           </div> <div class="form-group">
                               <div class="col-sm-12 bd"> 
                                <p>Ondate  :<b> {{ $studentMedicalInfo->ondate or '' }} </b> </p>  
                               </div>
                           </div>
                        </div>
                    </div>
               </div>
           </div>
        </div>
      </div> 


            <div class="modal-footer">
               <button type="button" class="add_btn_medical btn btn-success ">Print</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
            </div>
        </div>
   </div>
</div>
