<ul class="sortable-posts">
@foreach($submenus as $submenus)
<ol class="ui-state-default" style="padding: 4px;font-size:20px" id="{{ $submenus->id }}">{{ $submenus->sorting_id+1 }}<span class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{ $submenus->name }}</ol>
@endforeach
</ul>