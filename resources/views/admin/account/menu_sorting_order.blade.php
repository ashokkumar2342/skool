 @extends('admin.layout.base')
@section('body')
 <style type="">
   var el = document.getElementById('items');
var sortable = Sortable.create(el);
 </style>
   <section class="content-header">
    
    <h1>Menu Ordering<small>List</small> </h1>
       
    </section>  
    <section class="content">
       
          <div class="box"> 
            <div class="box-body"> 
            <div id="simpleList" class="list-group">
              @php
                $arrayId=1;
              @endphp
              @foreach ($menuTypes as $menuType)
              <div class="list-group-item" name="menu_id"  >{{ $menuType->name }}<a ondragend="callAjax(alert('ddd'))" style="float: right;">{{ $arrayId ++ }}</a></div>
 
              @endforeach
              
            </div> 
          </div>
        </div>

    </section>
    <!-- /.content -->

@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@push('scripts')

 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
   <script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>

 <script type="text/javascript">
  // Simple list
Sortable.create(simpleList, { /* options */ });

// List with handle
Sortable.create(listWithHandle, {
  handle: '.glyphicon-move',
  animation: 150
});

     $(document).ready(function(){
        $('#event_type_data_table').DataTable();
    });

     $('#btn_event_type_table_show').click();
  </script>
  @endpush
     
 
 