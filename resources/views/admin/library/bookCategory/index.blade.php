@extends('admin.layout.base')
@section('body')
<section class="content-header">
     <button class="btn btn-sm btn-info pull-right" onclick="callPopupLarge(this,'{{ route('admin.library.book.category.add.form') }}')">Add Book Category</button> 
    <h1>Books Category<small>List</small> </h1>
</section>  
<section class="content"> 
    <div class="box"> 
        <div class="box-body">
            <table class="table" id="book_category_table">
                <thead>
                    <tr>
                        <th>Sr.No.</th>
                        <th>Category</th>
                        <th>Code</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $id=1;
                    @endphp
                    @foreach ($BookCategorys as $BookCategory)
                    <tr>
                        <td>{{$id++}}</td>
                        <td>{{$BookCategory->name}}</td>
                        <td>{{$BookCategory->code}}</td>
                        <td>{{$BookCategory->description}}</td>
                        <td>
                         @if(App\Helper\MyFuncs::menuPermission()->w_status == 1)    
                         <a onclick="callPopupLarge(this,'{{ route('admin.library.book.category.add.form',Crypt::encrypt($BookCategory->id)) }}) }}')" title="Edit" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
                         @endif
                         @if(App\Helper\MyFuncs::menuPermission()->d_status == 1) 
                         <a href="{{ route('admin.library.book.category.delete',Crypt::encrypt($BookCategory->id)) }}" title="Delete" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
                         @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section> 
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
<script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#book_category_table').DataTable();
    });
</script>
@endpush
