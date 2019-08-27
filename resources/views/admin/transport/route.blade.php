@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Route </h1>
      @includeIf('admin.include.hot_menu', ['menu_type_id' => 14])
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
	                <form class="add_form" content-refresh="route_table" action="{{ route('admin.route.post') }}" method="post">              
                  {{ csrf_field() }}                                       
	                   <div class="col-lg-4">                                             
	                       <div class="form-group">
                          <label>Route Name</label>
	                         {{ Form::text('name','',['class'=>'form-control','id'=>'name', 'placeholder'=>'  Route Name','maxlength'=>'50','required']) }}
	                        
	                       </div>                                         
	                    </div>
	                     
                      <div class="col-lg-8">                                             
                         <div class="form-group">
                          <label>Description</label>
                           {{ Form::text('description','',['class'=>'form-control','id'=>'description','rows'=>4, 'placeholder'=>' Description','maxlength'=>'250',]) }}
                          
                         </div>                                         
                      </div>
                       
	                     <div class="col-lg-12 text-center">                                             
	                     <button class="btn btn-success" type="submit" id="btn_fee_account_create">Create</button> 
	                    </div>                     
	                </form> 
                </div> 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

            <div class="box">             
              <!-- /.box-header -->
                <div class="box-body">
                    <table id="route_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>Sn</th>
                               
                                <th>Route Name</th> 
                                <th>Description</th> 
                                <th>Action</th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($routes as $route)
                        	<tr>
                        		<td>{{ ++$loop->index }}</td>
                        	 
                            <td>{{ $route->name }}</td>
                             
                        		<td>{{ $route->description }}</td>
                        		<td> 
                        			{{-- <button type="button" class="btn_edit btn btn-warning btn-xs" data-toggle="modal" data-id="{{ $transport->id }}"  data-code="{{ $transport->code }}" data-name="{{ $transport->name }}" data-description="{{ $transport->description }}" data-target="#add_parent"><i class="fa fa-edit"></i> </button> --}}
                               @if(App\Helper\MyFuncs::menuPermission()->d_status == 1)
                        			<a href="{{ route('admin.route.delete',Crypt::encrypt($route->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn_delete btn btn-danger btn-xs"    ><i class="fa fa-trash"></i></a>
                              @endif
                        		</td>
                        	</tr>  	 
                        @endforeach	
                           
                        </tbody>
                             

                    </table>
                </div>
            </div>    

           
 
    </section>
    <!-- /.content -->
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
 
@endpush
@push('scripts')
 <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
    
@endpush