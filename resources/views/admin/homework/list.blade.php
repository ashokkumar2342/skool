@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1>Homework  <small>List</small> </h1>
      <ol class="breadcrumb">
      </ol>
</section>
    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">             
                <div class="col-md-12">                                          
                   <div class="col-lg-2">                         
                      <div class="form-group">
                          {!! Form::select('class',$classes, '', ['class'=>'form-control', 'id'=>'class' ,'placeholder'=>'Select Class','required']) !!}
                          <p class="text-danger">{{ $errors->first('session') }}</p>
                      </div>
                       <div class="form-group">
                          {!! Form::select('section',[], null, ['class'=>'form-control','id'=>'section','placeholder'=>'Select Section','required']) !!}
                          <p class="text-danger">{{ $errors->first('session') }}</p>
                        </div>
                    </div>                     
                    <div class="col-lg-10">                         
                        <div class="form-group">
                          {{ Form::textarea('homework','',['class'=>'form-control','id'=>'homework','rows'=>4, 'placeholder'=>'Enter Homework']) }}
                          <p class="text-danger">{{ $errors->first('homework') }}</p>
                        </div>
                    </div>
                </div>  
            <div class="row">
                 <div class="col-md-12 text-center">
                     <button class="btn btn-success" type="submit" id="btn_homework">Create Homework</button>
                 </div>
             </div>                     
           
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

            <div class="box">             
              <!-- /.box-header -->
                <div class="box-body">
                    <table id="homework_table" class="display table">                     
                        <thead>
                            <tr>
                                <th>Sn</th>
                                <th>Time</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Homework</th>
                                <th>Action</th>                             
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($homeworks as $homework)
                                <tr>
                                    <td>{{ ++$loop->index}}</td>
                                    <td>{{ $homework->created_at ==null?$homework->created_at :$homework->created_at->diffForHumans() }}</td>
                                    <td>{{ $homework->classes->name }}</td>
                                    <td>{{ $homework->sectionTypes->name }}</td>
                                    <td>{{ $homework->homework }}</td>
                                    <td>
                                        <button type="button" class="btn_parents_image btn btn-info btn-xs" data-toggle="modal" data-id="{{ $homework->id }}" data-target="#image_parent"><i class="fa fa-eye"></i> </button>

                                        <button type="button" class="homework_edit btn btn-warning btn-xs" data-toggle="modal" data-id="{{ $homework->id }}" data-target="#add_parent"><i class="fa fa-edit"></i> </button>

                                        <button class="btn_delete btn btn-danger btn-xs" onclick="return confirm('Are you Sure delete')" data-id="{{ $homework->id }}"  ><i class="fa fa-trash"></i></button>
                                    </td>
                                
                                </tr>

                            @endforeach
                        </tbody>
                             {{ $homeworks->links() }} 

                    </table>
                </div>
            </div>    

          <!-- Trigger the modal with a button --> 
 
    </section>
    <!-- /.content -->
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush 
 @push('scripts')
 <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> 
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

 <script type="text/javascript"> 
    // $(document).ready( function () {
    //     $('#homework_table').DataTable();
       
    // } )
    $("#class").change(function(){ 
        $('#section').html('<option value="">Searching ...</option>');
        $.ajax({
          method: "get",
          url: "{{ route('admin.manageSection.search') }}",
          data: { id: $(this).val() }
        })
        .done(function( response ) {            
            if(response.length>0){
                $('#section').html('<option value="">Select Section</option>');
                for (var i = 0; i < response.length; i++) {
                    $('#section').append('<option value="'+response[i].id+'">'+response[i].name+'</option>');
                } 
            }
            else{
                $('#section').html('<option value="">Not found</option>');
            }            
        });
    }); 
    $('#btn_homework').on('click',function(event) {
        $.ajaxSetup({
           headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       $.ajax({
            url: '{{ route('admin.homework.post') }}',
            type: 'POST',       
            data: {class:$('#class').val(),section:$('#section').val(),homework:$('#homework').val()},
        })
        .done(function(data) {
            if (data.class === 'error') {                 
                 $.each(data.errors, function(index, val) {
                     toastr[data.class](val) 
                 });                 
            }
              else {                 
                toastr[data.class](data.message)  
                $("#homework").val('');
                $("#class").val('');
                $("#section").val('');
                $("#homework_table").load(location.href + ' #homework_table'); 
            } 
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
         
    });

    $('#homework_table').on('click', '.btn_delete', function(event) {
        event.preventDefault();  
        var id = $(this).data("id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });      
        $.ajax({
            url: '{{ route('admin.homework.delete') }}',
            type: 'delete',
            data: {id: id},
        })
        .done(function(data) {
            toastr[data.class](data.message)
            $("#homework_table").load(location.href + ' #homework_table'); 
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        
    });   
    
</script>


@endpush