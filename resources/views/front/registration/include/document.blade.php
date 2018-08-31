<div class="row">
           <form action="{{ route('document') }}" method="post" no-reset="true" class="add_form" accept-charset="utf-8"  >
        {{ csrf_field() }}                          
        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">

            <div class="col-lg-6 b-r">
                <div class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-md-12">
                               <div class="form-group">
                                   <div class="col-md-12">
                                       {!! Form::file('marksheet','', ['class'=>'form-control']) !!}
                                       </select>
                                       <b class="floating-lable">Marksheet </b>   file size 100kb</b>
                                   </div>
                               </div>
                                <div class="form-group">
                                   <div class="col-md-12">
                                       {!! Form::file('leaving_certificate','', ['class'=>'form-control']) !!}
                                       </select>
                                       <b class="floating-lable">Leaving Certificate </b>   file size 100kb</b>
                                   </div>
                               </div>
                               <div class="form-group">
                                   <div class="col-md-12">
                                       {!! Form::file('income_certificate','', ['class'=>'form-control']) !!}
                                       </select>
                                       <b class="floating-lable">Income Certificate </b>   file size 100kb</b>
                                   </div>
                               </div>
                               <div class="form-group">
                                   <div class="col-md-12">
                                       {!! Form::file('cortt_certificate','', ['class'=>'form-control']) !!}
                                       </select>
                                       <b class="floating-lable">Cortt Certificate </b>   file size 100kb</b>
                                   </div>
                               </div>
                            </div>

                        </div>

                     

                    </div>
                    <!-- /.box-body -->
                    <!-- /.box-footer -->
                </div>
            </div>


            <div class="col-lg-6">
                <div class="form-horizontal">
                    <div class="box-body"> 
                         <div class="form-group">
                            <div class="col-md-12">
                                {!! Form::file('aadhaar_card','', ['class'=>'form-control']) !!}
                                </select>
                                <b class="floating-lable">Aadhaar Card </b>   file size 100kb</b>
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-md-12">
                                {!! Form::file('birth_certificate','', ['class'=>'form-control']) !!}
                                </select>
                                <b class="floating-lable">Birth Certificate </b>   file size 100kb</b>
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-md-12">
                                {!! Form::file('domicile_certificate','', ['class'=>'form-control']) !!}
                                </select>
                                <b class="floating-lable">Domicile Certificate </b>   file size 100kb</b>
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-md-12">
                                {!! Form::file('rashan_card','', ['class'=>'form-control']) !!}
                                </select>
                                <b class="floating-lable">Rashan Card </b>   file size 100kb</b>
                            </div>
                        </div>

                        

                    </div>
                    <!-- /.box-body -->
                    <!-- /.box-footer -->
                    
                </div>
            </div>

        </div>
        <div class="clearfix">
            
        </div>
        <div class="text-center">
            @if ($pr->status!=11)
            <input type="submit" id="btnSave" value="Save" class="btn btn-primary btn-size-md" style="width:85px" tabindex="0" />
            @endif
        <a data-toggle="tab"  class="btn btn-primary btn-size-md menu10" style="width:85px" href="#menu11">Next</a>
        </div>
    </form>
    </div>
 