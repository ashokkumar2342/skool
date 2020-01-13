@extends('admin.layout.base')
@section('body')
<section class="content-header">
	<a href="#" onclick="callPopupLarge(this,'{{ route('admin.boardingPoint.edit') }}')" class="btn_edit btn btn-info btn-sm pull-right">Add Boarding Point</a>
	<h1>Boardings Point <small>List</small> </h1>

</section>
<section class="content"> 
	<div class="box"> 
		<div class="box-body">
			<table id="boardingPoint_table" class="display table">                     
				<thead>
					<tr>
						<th>Sr.no.</th>

						<th>Name</th> 
						<th>Address</th> 
						<th>Single Side Amount</th> 
						<th>Both Side Amount</th>  
						<th>Action</th>                                                            
					</tr>
				</thead>
				<tbody>
					@foreach ($BoardingPoints as $boardingPoint)
					<tr>
						<td>{{ ++$loop->index }}</td>

						<td>{{ $boardingPoint->name }}</td>

						<td>{{ $boardingPoint->address }}</td>
						<td>{{ $boardingPoint->single_side_fee_amount }}</td>
						<td>{{ $boardingPoint->both_side_fee_amount }}</td>

						<td>
							@if(App\Helper\MyFuncs::menuPermission()->w_status == 1) 
							<a href="#" onclick="callPopupLarge(this,'{{ route('admin.boardingPoint.edit',Crypt::encrypt($boardingPoint->id)) }}')" class="btn_edit btn btn-info btn-xs"    ><i class="fa fa-edit"></i></a>
							@endif

							@if(App\Helper\MyFuncs::menuPermission()->d_status == 1) 
							<a href="{{ route('admin.boardingPoint.delete',Crypt::encrypt($boardingPoint->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn_delete btn btn-danger btn-xs"    ><i class="fa fa-trash"></i></a>
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
<script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script>
 	$('#boardingPoint_table').DataTable();
 </script>
@endpush