<ul class="sortable-submenu">
@foreach($submenus as $submenus)
<ol class="ui-state-default" style="padding: 4px;font-size:20px" id="{{ $submenus->id }}">{{ $submenus->sorting_id+1 }}<span class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{ $submenus->name }}</ol>
@endforeach
</ul>
<script>
	$( function() {  
	  $(".sortable-submenu").sortable({
	      stop: function() { 
	          $.map($(this).find('ol'), function(el) {
	              var id = el.id;
	              var sorting = $(el).index();
	              $.ajax({
	                  url: '{{ route('admin.account.submenu.ordering.store') }}',
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