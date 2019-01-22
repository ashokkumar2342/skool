<div class="row"> 

            <div class="col-lg-12"> 
              <form action="{{ route('document') }}" content-refresh="parent_document_table" id="document-form" method="post"  no-reset="true" class="add_form" no-reset="false" class="add_form" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <div class="form-group col-lg-4">
                          {{ Form::label('document_type_id','Document Type',['class'=>' control-label']) }}
                          {!! Form::select('document_type',$documentTypes, null, ['class'=>'form-control','placeholder'=>'Select Document Type','required']) !!}
                          <p class="text-danger">{{ $errors->first('parents') }}</p>
                     </div> 
                     <div class="form-group col-lg-4">
                         {{ Form::label('file','File/ ONLY PDF',['class'=>' control-label']) }} 
                         {!! Form::file('file', ['class'=>'form-control','accept'=>'application/pdf']) !!}
                         <p class="text-danger">{{ $errors->first('file') }}</p>
                     </div> 
                      <div class="form-group col-lg-4"><br>
                        @if ($pr->status!=11)
                        <input type="submit" class="btn btn-success" value="Upload">
                        @endif
                         
                     </div>  
 
              </form>  

            </div>
            <div class="col-lg-12">
              <table class="table" id="parent_document_table">
                <thead> 
                  <tr>
                    <th>Document Type Name</th>
                    <th>Action</th>
                  </tr> 
                </thead>
                <tbody>
                  @foreach($registrationDocuments as $registrationDocument)
                  <tr>
                    <td>{{ $registrationDocument->documentTypes->name or '' }}</td>
                    <td>
                      <a href="{{ url('storage/document/'.$registrationDocument->name) }}" target="blank" class="btn btn-success btn-xs">Download</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                  
                </thead>
              </table>
            </div>
 
        <div class="clearfix">
            
        </div>
        <div class="text-center">
            
        <a data-toggle="tab"  class="btn btn-primary btn-size-md menu10" style="width:85px" href="#menu11">Next</a>
        </div>
 
    </div>
 