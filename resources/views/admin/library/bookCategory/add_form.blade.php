<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" id="btn_close" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">{{@$BookCategory->id?'Edit':'Add'}}</h4>
</div>
<div class="modal-body">
  <form action="{{ route('admin.library.book.category.store',@$BookCategory->id) }}" method="post" class="add_form" content-refresh="book_category_table" button-click="btn_close">
    {{csrf_field()}}
    <div class="row">
      <div class="col-lg-12 form-group">
        <label>Category Name</label>
        <input type="text" name="category_name" class="form-control" maxlength="30" placeholder="Enter Category Name" value="{{@$BookCategory->name}}">
      </div>
      <div class="col-lg-12 form-group">
        <label>Code</label>
        <input type="text" name="code" class="form-control" maxlength="3" placeholder="Enter Code" value="{{@$BookCategory->code}}">
      </div>
      <div class="col-lg-12 form-group">
        <label>Description</label>
        <textarea class="form-control" name="description">{{@$BookCategory->description}}</textarea>
      </div>
      <div class="col-lg-12 form-group text-center">
        <input type="submit" class="btn btn-success">
        
      </div>
    </div>
  </form>
</div>
</div>
</div>


