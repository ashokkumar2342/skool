@extends('admin.layout.base')
@section('body')
    <section class="content">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ (@$classFee)?'Update':'Add' }}Class Fees</h3>
              <div class="clearfix"><br></div>
              <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title text-right">
                      <a data-toggle="collapse" href="#collapse1">{{ (@$classFee)?'Update':'Add' }} Class Fees</a>
                    </h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse {{ (@$classFee || $errors->first())?'in':'' }}">
                    <div class="panel-body ">
                   {{ Form::open(['route'=>(@$classFee)?['admin.account.classfee.update',$classFee->id]:'admin.account.classfee.add']) }}
                    <div class="row">
                        <dir class="col-md-6 ">
                            <div class="form-group">
                                {!! Form::label('session', 'Select Session :', ['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::select('session', $sessions, @$classFee->session_id, ['class'=>'form-control','placeholder'=>'select session']) !!}
                                </div>
                            </div>
                        </dir>
                        <dir class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('class', 'Select Class :', ['class'=>'col-md-3 control-label']) !!}
                                <div class="col-md-9">
                                    {!! Form::select('class', $classes, @$classFee->class_id, ['class'=>'form-control','placeholder'=>'select session']) !!}
                                </div>
                            </div>
                        </dir>
                    </div>
                            <hr >

                     <div class="col-lg-4">                         
                       <div class="form-group">
                        {{ Form::label('admission_fees','Admission Fees (In Rs.)',['class'=>' control-label']) }}
                        {{ Form::number('admission_fees',@$classFee->admission_fee,['class'=>'form-control required']) }}
                        <p class="text-danger">{{ $errors->first('admission_fees') }}</p>
                        </div>
                     </div>
                     <div class="col-lg-4">                         
                       <div class="form-group">
                        {{ Form::label('registration_fees','Registration Fees (In Rs.)',['class'=>' control-label']) }}
                        {{ Form::number('registration_fees',@$classFee->registration_fee,['class'=>'form-control required']) }}
                        <p class="text-danger">{{ $errors->first('registration_fees') }}</p>
                        </div>
                     </div>
                     <div class="col-lg-4">                         
                       <div class="form-group">
                        {{ Form::label('annual_charges','Annual Charges (In Rs.)',['class'=>' control-label']) }}
                        {{ Form::number('annual_harges',@$classFee->annual_fee,['class'=>'form-control required']) }}
                        <p class="text-danger">{{ $errors->first('annual_harges') }}</p>
                        </div>
                     </div>
                     <div class="col-lg-4">                         
                       <div class="form-group">
                        {{ Form::label('bus_fees','Bus Fees (In Rs.)',['class'=>' control-label']) }}
                        {{ Form::number('bus_fees',@$classFee->bus_fee,['class'=>'form-control required']) }}
                        <p class="text-danger">{{ $errors->first('bus_fees') }}</p>
                        </div>
                     </div>
                     <div class="col-lg-4">                         
                       <div class="form-group">
                        {{ Form::label('caution_money','Caution Money (In Rs.)',['class'=>' control-label']) }}
                        {{ Form::number('caution_money',@$classFee->caution_fee,['class'=>'form-control required']) }}
                        <p class="text-danger">{{ $errors->first('caution_money') }}</p>
                        </div>
                     </div>
                     <div class="col-lg-4">                         
                       <div class="form-group">
                        {{ Form::label('activity_charges','Activity Charges (In Rs.)',['class'=>' control-label']) }}
                        {{ Form::number('activity_charges',@$classFee->activity_charge,['class'=>'form-control required']) }}
                        <p class="text-danger">{{ $errors->first('activity_charges') }}</p>
                        </div>
                     </div>
                     <div class="col-lg-4">                         
                       <div class="form-group">
                        {{ Form::label('smart_class_fees','Smart Class Fees (In Rs.)',['class'=>' control-label']) }}
                        {{ Form::number('smart_class_fees',@$classFee->smart_fee,['class'=>'form-control required']) }}
                        <p class="text-danger">{{ $errors->first('smart_class_fees') }}</p>
                        </div>
                     </div>
                     <div class="col-lg-4">                         
                       <div class="form-group">
                        {{ Form::label('tuition_fees','Tuition Fees (In Rs.)',['class'=>' control-label']) }}
                        {{ Form::number('tuition_fees',@$classFee->tution_fee,['class'=>'form-control required']) }}
                        <p class="text-danger">{{ $errors->first('tuition_fees') }}</p>
                        </div>
                     </div>
                     <div class="col-lg-4">                         
                       <div class="form-group">
                        {{ Form::label('other_charges','Sms Charges (In Rs.)',['class'=>' control-label']) }}
                        {{ Form::number('other_charges',@$classFee->other_fee,['class'=>'form-control required']) }}
                        <p class="text-danger">{{ $errors->first('other_charges') }}</p>
                        </div>
                     </div>

                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-success">{{ (@$classFee)?'Update':'Submit' }}</button>
                        </div>
                    </div>
                   {{ Form::close() }} 


                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th> id</th>                
                  <th>Session</th>
                  <th>Class Name</th>
                  <th>Total Fee</th>
                  <th width="80px">Action</th>                  
                </tr>
                </thead>
                <tbody>
                @foreach($classfees as $classfee)
                <tr>
                  <td>{{ $classfee->id }}</td>
                  <td>{{ $classfee->sessions->date }}</td>
                  <td>{{ $classfee->classes->alias or '' }}</td>
                  <td>{{ array_sum(array_only(collect($classfee)->toArray(),['admission_fee','registration_fee','annual_fee','bus_fee','caution_fee','activity_charge','smart_fee','tution_fee','other_fee'])) }}</td>
                  <td align="center">
                    <a class="btn btn-info btn-xs" href="{{ route('admin.account.classfee.edit',$classfee->id) }}"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this data ?')" href="{{ route('admin.account.classfee.delete',$classfee->id) }}"><i class="fa fa-trash"></i></a>
                  </td>
                 
                </tr>
                @endforeach
                </tbody>
                 
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- Trigger the modal with a button -->


    </section>
    <!-- /.content -->
@endsection
@push('links')
<style type="text/css">
  .feeTable tbody td{
    padding:10px;
    margin:10px;
  }
</style>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
 @push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
     $(document).ready(function(){
        $('#dataTable').DataTable();
        
     @if(@$section || $errors->first())
     $('#add_section').modal('show'); 
     @endif
     
 </script>
@endpush