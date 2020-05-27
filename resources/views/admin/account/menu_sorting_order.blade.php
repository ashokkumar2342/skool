 @extends('admin.layout.base')
 @push('links')

 @endpush
@section('body')
 
   <section class="content-header">
    <form action="{{ route('admin.account.menu.report') }}" method="post" target="blank">
                {{ csrf_field() }}
               <div class="col-md-4 pull-right">
               <div class="panel panel-default" style="margin-top: -10px;height: 50px">
                <div class="panel-body">
                  <label class="radio-inline"><input type="radio" name="optradio" value="menu_wise">Menu Wise</label>
                  <label class="radio-inline"><input type="radio" name="optradio" checked value="all">All</label>
                 <input type="submit" value="Report" class="btn btn-primary btn-sm pull-right">
                </div>
              </div>  
               </div> 
                 </form>
   
    <h1>Menu Ordering<small>List</small> </h1>
       
    </section>  
    <section class="content">
       
          <div class="box" style="margin-top: 5px"> 
            <div class="box-body">  
              <div class="col-lg-6" style="margin-left: -40px">
                <ul class="sortable-posts">
                   @foreach($menuTypes as $menuType)
                    <ol class="ui-state-default" style="padding: 4px;font-size:20px" onclick="callAjax(this,'{{ route('admin.account.menu.filte',$menuType->id) }}','sub_menu_table')" id="{{ $menuType->id }}">{{ $menuType->sorting_id+1 }}<span class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{ $menuType->name }}</ol>
                  @endforeach
                </ul>
              </div>
              <div class="col-lg-6" id="sub_menu_table">
                 
                
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
     
 
 