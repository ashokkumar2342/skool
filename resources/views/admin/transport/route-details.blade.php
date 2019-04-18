  @extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Route Details </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12"> 
	                <form class="form add_form" content-refresh="route_table" action="{{ route('admin.routeDetails.post') }}" method="post" no-reset="true">              
                  {{ csrf_field() }}                                       
	                   <div class="col-lg-3">                                             
                        <div class="form-group">
                          
                          {{ Form::label('route_id','Select Route',['class'=>' control-label']) }}
                              <select name="route_id" id="route_id" class="form-control"  onchange="callAjaxUrl('{{ route('admin.routeDetails.get') }}'+'?route_id='+this.value+'','searchResult')">
                                <option selected disabled value="">Select Route</option>
                                @foreach($routes as $route)
                                <option value="{{ $route->id }}">{{ $route->name }}</option>
                                @endforeach
                              </select>
                        </div>                                         
                     </div> 
                         <table class="table table-bordered">
                            <thead>                  
                            <tr>
                                <th style="width: 10px">id</th>
                                <th> <input  class="checked_all" type="checkbox"></th>
                               <td><b>Boarding Point Name</b></td>                         
                               <td><b>Morning</b></td>                         
                               <td><b>Evening</b></td>              
                            </tr>
                            </thead>
                            <tbody id="searchResult">                      
                            </tbody>
                           <tfoot>
                             <tr>
                               <td colspan="5">                                 
                                 <div class="row">                              
                                  <div class="col-md-12 text-center">
                                   <button class="btn btn-success " id="subjectBtn">Save</button>
                                  </div>
                                 </div>  
                               </td>
                            </tr>
                           </tfoot>
                          </tbody>
                      </table>                  
	                </form> 

                </div> 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

            <div class="box">             
              <!-- /.box-header -->
                <div class="box-body">
                                                       
                     <div class="col-lg-3">                                             
                        <div class="form-group">
                          
                          {{ Form::label('route_id','Route',['class'=>' control-label']) }}
                              <select name="route_id" id="route_id" class="form-control"  onchange="callAjaxUrl('{{ route('admin.routeDetailsView.get') }}'+'?route_id='+this.value+'','route_details_view_Result')">
                                <option selected disabled value="">Select Route</option>
                                @foreach($routes as $route)
                                <option value="{{ $route->id }}">{{ $route->name }}</option>
                                @endforeach
                              </select>
                        </div>                                         
                     </div> 
                        <div id="route_details_view_Result">
                                          
                          </div>                
                 

                </div>   
             </div>    

           
 
    </section>
    <!-- /.content -->
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.css" integrity="sha256-4zmTXfA1u+L/3UWfbkPTMAsb5pNv45V8/b1uwJEdiAs=" crossorigin="anonymous" /> 
 
@endpush
@push('scripts')
 <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js" integrity="sha256-bmXHkMKAxMZgr2EehOetiN/paT9LXp0KKAKnLpYlHwE=" crossorigin="anonymous"></script>
<script>
 $( function() {
  $('.checked_all').on('change', function() {     
          $('.checkbox').prop('checked', $(this).prop("checked"));              
  });
  //deselect "checked all", if one of the listed checkbox product is unchecked amd select "checked all" if all of the listed checkbox product is checked
  $('.checkbox').change(function(){ //".checkbox" change 
      if($('.checkbox:checked').length == $('.checkbox').length){
             $('.checked_all').prop('checked',true);
      }else{
             $('.checked_all').prop('checked',false);
      }
  }); 
 

   });
 
 </script>
 <script>
  $( function() {
    
    $('button').click(function(){
        $('#searchResult input:radio:checked').filter(':checked').click(function () {
          $(this).prop('checked', false);
        });
        $('.'+$(this).attr('data-click')).prop('checked', true);
      });
    });
  </script>
    
@endpush