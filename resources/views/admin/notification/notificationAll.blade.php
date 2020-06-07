@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Notification</h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body"> 
                   <div class="row">
                    <div class="col-lg-12">
                      <table class="table-bordered table-striped table">
                        <thead>
                          <tr>
                            <th>Notification</th>
                            <th>Created At</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($notifications as $notification) 
                          @php
                            $style ='';
                          @endphp
                          @if ($notification->status==0)
                           @php
                             $style ='background-color: #dadada;border-bottom: 1px solid #ab9e9e;'
                           @endphp

                          @endif
                          <tr style="{{ $style }}">
                            <td>  <a onclick="callAjax(this,'{{ route('notification.read.status',Crypt::encrypt($notification->id)) }}')" href="{{ $notification->link!=null?route(''.$notification->link):'' }}">{{ $notification->message }}</a></td>
                            <td> <small><i class="fa fa-clock-o"></i> </small>{{ $notification->created_at != null?$notification->created_at->diffForHumans():'' }}</td>
                            <td>
                              <a href="{{ route('notification.clear',Crypt::encrypt($notification->id)) }}" title="" onclick="return confirm('are you sure do you want to delete ?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                          </tr>
                           @endforeach 
                        </tbody>
                      </table> 
                      {{$notifications->links()  }}
                    </div>                                  
                   </div> 
                      
                </div> 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box --> 
    </section>
    <!-- /.content -->
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
 
@endpush
@push('scripts')
 <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script>
       $('#student_remark_data_table').DataTable();
    </script>
    
@endpush