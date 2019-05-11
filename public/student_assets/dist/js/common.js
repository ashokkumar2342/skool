function callJqueryDefault(divId){
	$("#"+divId).find(".add_form").submit(function(event){
    event.preventDefault(); //prevent default action 
	$("#"+divId).find(".alert").remove();
	var formObj=this;
	var pleaseWait=$("<div>please wait.......</div>");
	var uploadProgress=$("<div id='upload-progress'><div class='progress-bar'></div></div>");
	pleaseWait.insertAfter(this);
    var post_url = this.action; //get form action url
    var request_method = 'POST'; //get form GET/POST method
    var form_data = new FormData(this); //Encode form elements for submission
    
    $.ajax({
        url : post_url,
        type: request_method,
        data : form_data,
        contentType: false,
        processData:false,
        xhr: function(){
        //upload Progress
        var xhr = $.ajaxSettings.xhr();
        if (xhr.upload) {
			
			pleaseWait.remove();
			//update progressbar
			uploadProgress.insertAfter(formObj);
			//console.log(5);
            xhr.upload.addEventListener('progress', function(event) {
                var percent = 0;
                var position = event.loaded || event.position;
                var total = event.total;
                if (event.lengthComputable) {
                    percent = Math.ceil(position / total * 100);
                }
				//console.log(2);
				$("#upload-progress .progress-bar").css("width", + percent +"%");
				//console.log(3);
            }, true);
        }
        return xhr;
    }
    }).done(function(response){ //
	
	pleaseWait.remove();
	uploadProgress.remove();
	
	if(response.status==0){
		if(formObj.getAttribute('import')=="true"){
			errorMsg(response.msg)
			//$('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button> <strong>'+response.msg+'</strong>'+response.data+'</div>').insertAfter(formObj);
			formObj.reset();
		}else{
			if(formObj.getAttribute('error-id')){
				$('#'+formObj.getAttribute('error-id')).html(response.msg);
			}else{
				errorMsg(response.msg)
				//$(formObj).append($('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><strong>Warning!</strong> '+response.msg+'</div>'));

			}
		}
	}else if(response.status==1){
		if(formObj.getAttribute('success-id')){
				$('#'+formObj.getAttribute('success-id')).html(response.msg);
		}else if(formObj.getAttribute('success-popup')){
			console.log(response.msg);
			// callSuccessPopup(response.msg);
			successMsg(response.msg)
		}else if(formObj.getAttribute('profile-pic')){
			$('.'+formObj.getAttribute('profile-pic')).attr( 'src', response.msg + '?dt=' + (+new Date()) );
		}else if(formObj.getAttribute('success-content-id')){
				$('#'+formObj.getAttribute('success-content-id')).html(response.data);
				if(formObj.getAttribute('x-table'))
				{
				$.fn.editable.defaults.mode = 'inline';
				$.ajaxSetup({
					      headers: {
					          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					      }
					  });
				$('.update').editable();
				}
				if(formObj.getAttribute('data-table'))
				{
				$("#"+formObj.getAttribute('data-table')).DataTable({
					'iDisplayLength': 10,
				});
				}
				else if(formObj.getAttribute('data-table-without-pagination'))
				{
				$("#"+formObj.getAttribute('data-table-without-pagination')).DataTable({
					'paging':   false,
					dom: 'Bfrtip',
						buttons: [
							'copy', 'csv', 'excel', 'pdf', 'print'
						]
				});
				}
				else if(formObj.getAttribute('child-table'))
				{
									var table = $("#"+formObj.getAttribute('child-table')).DataTable({});
									stateSave: true;

						  // Add event listener for opening and closing details
						  $("#"+formObj.getAttribute('child-table')).on('click', 'td.details-control', function () {
							  var tr = $(this).closest('tr');
							  var row = table.row(tr);

							  if (row.child.isShown()) {
								  // This row is already open - close it
								  row.child.hide();
								  tr.removeClass('shown');
							  } else {
								  // Open this row
								  row.child(format(tr.data('child-value'))).show();
								  tr.addClass('shown');
							  }
						  });
						    // Add event listener for opening and closing details
						    $("#"+formObj.getAttribute('child-table')).on('click', '#checkAll', function () {
						  	  // Get all rows with search applied
						  	        var rows = table.rows({ 'search': 'applied' }).nodes();
						  	        // Check/uncheck checkboxes for all rows in the table
						  	        // $('input[type="checkbox"]', rows).prop('checked', this.checked); 
						  	        // only checked show page data
						  	        $('input:checkbox').not(this).prop('checked', this.checked);

						    });
				}
		}else{
			successMsg(response.msg)
			// $(formObj).append($('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><strong>Success!</strong> '+response.msg+'</div>'));
		}
		
		if(formObj.getAttribute('call-back'))
		{
			var callback=formObj.getAttribute('call-back');
			console.log(typeof window[callback]);
			if(typeof window[callback] == "function")
                    window[callback].call(); //wi
			//console.log(formObj.getAttribute('call-back'));
			
			//eval(callback());
		}
		if(formObj.getAttribute('redirect-to'))
		{
			var redirect=formObj.getAttribute('redirect-to');
			setTimeout(window.location.replace(redirect), 3000);
			;
		}

		if(formObj.getAttribute('display-url') && formObj.getAttribute('display-div'))
		{	
			var url=formObj.getAttribute('display-url');
			var div=formObj.getAttribute('display-div');
			
			callAjaxUrl(url,div,'');
		}

		if(formObj.getAttribute('button-click') && response.status==1)
		{	
			var myStr = formObj.getAttribute('button-click');
        	var strArray = myStr.split(",");
        
        	for(var i = 0; i < strArray.length; i++){
        		$("#"+strArray[i]).click();
       		 }
		}

		if(formObj.getAttribute('content-refresh') && response.status==1)
		{	
			var myStr = formObj.getAttribute('content-refresh');
        	var strArray = myStr.split(",");
        
        	for(var i = 0; i < strArray.length; i++){
        		$("#"+strArray[i]).load(location.href + ' #'+strArray[i]);
       		 }
		}
		
		if(formObj.getAttribute('no-reset')!="true"){
			formObj.reset();
			$(formObj).find('.multiselect').selectpicker("refresh");
			$(formObj).find('.summernote').shouldInitialize = function () {
				$(formObj).find('.summernote').summernote("reset");
				};
		}
		if(formObj.getAttribute('call-jquery-default')!=""){
					callJqueryDefault(formObj.getAttribute('call-jquery-default'));
					
				}
			
	}
    });
});
}
callJqueryDefault('body_id');

function format(value) {
     return '<div>' + value + '</div>';
}		

  
function child_table_by_click(table_id){
	  if ( ! $.fn.DataTable.isDataTable("#"+table_id) ) 
			{
				var table = $("#"+table_id).DataTable({});

						  // Add event listener for opening and closing details
						  $("#"+table_id).on('click', 'td.details-control', function () {
							  var tr = $(this).closest('tr');
							  var row = table.row(tr);

							  if (row.child.isShown()) {
								  // This row is already open - close it
								  row.child.hide();
								  tr.removeClass('shown');
							  } else {
								  // Open this row
								  row.child(format(tr.data('child-value'))).show();
								  tr.addClass('shown');
							  }
						  });
			}
									
				
  } 

    function advSrchMatch(value) {
	if(value==2)
		$(".adv_srch_cond").val(0);
	else if(value==1)
		$(".adv_srch_cond").val(1);
  }
  function showDatePicker(obj){
	  console.log(obj);
	  if(typeof(obj)!="undefined" && obj){
	var id=obj.getAttribute("picker_id");
	if(obj.value==5)
		$("#"+id+"-content").show();
	else
		$("#"+id+"-content").hide();
	  }
}
function advanceSearch(init){
	
	$('#public-methods').multiSelect();
	$('#select-all').click(function(){
		$('#public-methods').multiSelect('select_all');
		return false;
	});
	$('#deselect-all').click(function(){
		$('#public-methods').multiSelect('deselect_all');
		return false;
	});
	searchDatepicker('adv-search-datepicker');
	showDatePicker(document.getElementById('adv_search_date_by'));
	if(init==1)
	searchDatepicker('basic-search-datepicker');
	$('#adv_search_content_tab .multiselect').selectpicker();
	
	$('#adv_search_content_tab .multiselect').on('changed.bs.select', function(e) {
		var obj=$(e.currentTarget);
		if(typeof(obj.val()) != "undefined" && obj.val()){
			console.log(obj.val());
			var url=$(this).attr('load_url');
			var loadId=$(this).attr('load_id');
			var data={};
			data["id"]=obj.val();
			var url_data;
			if(url_data=$(this).attr('send_data')){
				var url_data_arr= url_data.split(",");
				$.each(url_data_arr, function( index, value ) {
				  data[value]= $('#'+value).val();
				});
				
			}
			loadSelectBoxData(data,url,loadId);
		}
	});
}
function searchData(){
	advanceSearch();
	$('#adv_search_btn_id').trigger('click');
}
function searchDatepicker(datepickerId){
	$('#'+datepickerId).daterangepicker({
		buttonClasses: ['btn', 'btn-sm'],
		applyClass: 'btn-info',
		cancelClass: 'btn-default',
		format: 'MM/DD/YY',
	});
	$("#"+datepickerId+"-content").hide();
}
function loadSelectBoxData(dataToSend,url,selectBoxId){
	var selectBoxObj=$('#'+selectBoxId);
	 $.get(url,dataToSend,
    function(data, status){
        if(data.status==1)
		{
			selectBoxObj.find('option').remove();
			$.each(data.data, function (key, entry) {
				selectBoxObj.append($('<option></option>').attr('value', entry.value).text(entry.text));
			});
			if(selectBoxObj.attr('multiple')=="multiple")
				selectBoxObj.selectpicker('refresh');
		}
    });
}
function loadData(obj){
	var data={};
	data["id"]=obj.value;
	if(url_data=obj.getAttribute('send_data')){
		var url_data_arr= url_data.split(",");
		$.each(url_data_arr, function( index, value ) {
		  data[value]= $('#'+value).val();
		});
		
	}
	var url=obj.getAttribute('load_url');
	var loadId=obj.getAttribute('load_id');
	loadSelectBoxData(data,url,loadId);	
}
function getSelectedOptions(sel) {
  var opts = [],
    opt;
  var len = sel.options.length;
  for (var i = 0; i < len; i++) {
    opt = sel.options[i];

    if (opt.selected) {
      opts.push(opt);
    }
  }

  return opts;
}
function searchForm(formObj){
	var pleaseWait=$("<div>please wait.......</div>");
	var uploadProgress=$("<div class='upload-progress'><div class='progress-bar'></div></div>");
	pleaseWait.insertAfter(formObj);
    var post_url = formObj.getAttribute('search-url'); //get form action url
    var request_method = 'POST'; //get form GET/POST method
    var form_data = new FormData(formObj); //Encode form elements for submission
    $(formObj).find(".alert").remove();
    $.ajax({
        url : post_url,
        type: request_method,
        data : form_data,
        contentType: false,
        processData:false,
        xhr: function(){
        //upload Progress
        var xhr = $.ajaxSettings.xhr();
        if (xhr.upload) {
			
			pleaseWait.remove();
			//update progressbar
			uploadProgress.insertAfter(formObj);
			//console.log(5);
            xhr.upload.addEventListener('progress', function(event) {
                var percent = 0;
                var position = event.loaded || event.position;
                var total = event.total;
                if (event.lengthComputable) {
                    percent = Math.ceil(position / total * 100);
                }
				//console.log(2);
				uploadProgress.css("width", + percent +"%");
				//console.log(3);
            }, true);
        }
        return xhr;
    }
    }).done(function(response){ //
	
	pleaseWait.remove();
	uploadProgress.remove();
	
	if(response.status==0){
		if(formObj.getAttribute('import')=="true"){
			errorMsg(response.msg)
			//$('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button> <strong>'+response.msg+'</strong>'+response.data+'</div>').insertAfter(formObj);
			formObj.reset();
		}
		else{
			if(formObj.getAttribute('error-id')){
				$('#'+formObj.getAttribute('error-id')).html(response.msg);
			}else{
				errorMsg(response.msg)
				
				//$(formObj).append($('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><strong>Warning!</strong> '+response.msg+'</div>'));
			}
		}
	}else if(response){
		console.log(response);
		$('#adv_filter_content').html(response);
		if(formObj.getAttribute('data-table-without-pagination'))
				{
					$('#'+formObj.getAttribute('data-table-without-pagination')).DataTable({
					'paging':   false,
					dom: 'Bfrtip',
						buttons: [
							'copy', 'csv', 'excel', 'pdf', 'print'
						]
				});
				}
				
		
		else{
			$(formObj).append($('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><strong>Success!</strong> '+response.msg+'</div>'));
		}

		if(formObj.getAttribute('content-refresh') && response.status==1)
		{	
			var myStr = formObj.getAttribute('content-refresh');
        	var strArray = myStr.split(",");
        
        	for(var i = 0; i < strArray.length; i++){
        		$("#"+strArray[i]).load(location.href + ' #'+strArray[i]);
       		 }
		}

		if(formObj.getAttribute('no-reset')!="true"){
			formObj.reset();
			$(formObj).find('.multiselect').selectpicker("refresh");
			$(formObj).find('.summernote').summernote("reset");
		}
			
	}
    });
}
