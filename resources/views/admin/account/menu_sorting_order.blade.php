 @extends('admin.layout.base')
 @push('links')

 @endpush
@section('body')
 
   <section class="content-header">
    
    <h1>Menu Ordering<small>List</small> </h1>
       
    </section>  
    <section class="content">
       
          <div class="box"> 
            <div class="box-body">  
              <div class="col-lg-4" style="margin-left: -40px">
                <ul class="sortable-posts">
                   @foreach($menuTypes as $menuType)
                    <ol class="ui-state-default" style="padding: 4px;font-size:20px" id="{{ $menuType->id }}">{{ $menuType->sorting_id+1 }}<span class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{ $menuType->name }}</ol>
                  @endforeach
                </ul>
              </div>
              <div class="col-lg-4">
                <label>Menu Type</label>
                <select name="menu_id" class="form-control" onchange="callAjax(this,'{{ route('admin.account.menu.filte') }}','sub_menu_table')">
                  <option selected disabled>Select Menu Type</option> 
                  @foreach ($menuTypes as $menuType)
                       <option value="{{ $menuType->id }}">{{ $menuType->name }}</option>
                    
                  @endforeach
                  
                </select>
                
              </div> 
              <div class="col-lg-4" id="sub_menu_table">

              </div>
            
          </div>
        </div>

    </section>
    <!-- /.content -->

@endsection

@push('scripts')
 

  <script>
    $(function() {
        $("#sortable").sortable();
        $("#sortable").disableSelection();
    });
  $( function() {  
    $(".sortable-posts").sortable({
        stop: function() { 
            $.map($(this).find('ol'), function(el) {
                var id = el.id;
                var sorting = $(el).index();
                $.ajax({
                    url: '{{ route('admin.account.menu.ordering.store') }}',
                    type: 'GET',
                    data: {
                        id: id,
                        sorting: sorting
                    },
                });
            });
        }
    });
  } );  
  
  </script>
 
  @endpush
     
 
 