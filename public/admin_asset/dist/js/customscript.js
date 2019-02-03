var full_url_js=window.location.protocol+'//'+ window.location.hostname;
function callAjax(obj,url,divId,callback){
	$('#'+divId).html('Please Wait......'); 
    $.get(url,
    {
        id: obj.value
    },
    function(data, status){
        if(status=="success")
		{
			$('#'+divId).html(data);
			if(obj.getAttribute('no-add-form')!="true")
				callJqueryDefault(divId);
			if(obj.getAttribute('multiselect-form')=="true")
				$("#"+divId).find('.multiselect').multiselect({
					includeSelectAllOption: true,
           			 maxHeight: 400, 
            		buttonWidth: 300,
            
             	 enableFiltering: true
				});
			if(callback)
				callback();
			if(obj.getAttribute('data-table'))
				{
					stateSave: true;
									
				$("#"+obj.getAttribute('data-table')).DataTable({
					'iDisplayLength': 10,
				});
				
				  // Add event listener for opening and closing details
				  $("#"+obj.getAttribute('data-table')).on('click', '#checkAll', function () {
					   
					    $('input:checkbox').not(this).prop('checked', this.checked);

				  });
				
				}
				

			
			if(obj.getAttribute('button-click') && data.status==1)
			{	
			var myStr = obj.getAttribute('button-click');
        	var strArray = myStr.split(",");
        
	        	for(var i = 0; i < strArray.length; i++){
	        		$("#"+strArray[i]).click();
	       		 }
			}
			if(obj.getAttribute('success-popup')){
				var response=data.msg; 
				successMsg(response);	
			
				// callSuccessPopup(response);
			}
			if(obj.getAttribute('select-triger')){
				
				 var myStr = obj.getAttribute('select-triger');
        	    var strArray = myStr.split(",");
        
	        	for(var i = 0; i < strArray.length; i++){
	        		$("#"+strArray[i]).trigger('change');
	       		 }
			}
			if(obj.getAttribute('check-all')){
				  // Add event listener for opening and closing details
				  $("#"+obj.getAttribute('check-all')).on('click', '#checkAll', function () {
					   alert('test');

				  });
			}			 
			if(obj.getAttribute('redirect-to'))
			{
				var redirect=obj.getAttribute('redirect-to');
				setTimeout(window.location.replace(redirect), 3000);
				;
			}
				 
		}
    });

}
function callAjaxUrl(url,divId,callback){
	$('#'+divId).html('Please Wait......'); 
    $.get(url,{},
    function(data, status){
        if(status=="success")
		{
			$('#'+divId).html(data);	
			callJqueryDefault(divId);
			if(callback)
				callback();
		}
    }); 
}
 

function callDataTable(url,divId,tableId){
	$('#'+divId).html('Please Wait......'); 
    $.get(url,{},
    function(data, status){
        if(status=="success")
		{
			$('#'+divId).html(data);
			if ( ! $.fn.DataTable.isDataTable("#"+tableId) ) 
			{
			$("#"+tableId).DataTable({
				'iDisplayLength': 10,
			});
			}
			callJqueryDefault(divId);
		}
    });

}

function callSuccessPopup(msg){
	$('#success-popup').modal("show"); 
	$('.modal-body').html(msg); 
	$('#success-popup-content-id').html(msg); 
}

function callPopupLarge(obj,url){
	$('#ModalLargeId').modal("show"); 
	var divId='ModalLargeContentId';
	$('#'+divId).html('<div align="center"><img src="'+full_url_js+'/img/loader.gif" align="center"></div>'); 
    $.get(url,{},
    function(response, status){
        if(status=="success"){
			$('#'+divId).html(response);
			callJqueryDefault(divId);
			if(obj.getAttribute('datatable-view-without-pagination')=="true")
				if ( ! $.fn.DataTable.isDataTable('.datatablepopup') ) 
			{
				$("#"+divId).find('.datatablepopup').DataTable({
				'paging':   false,
				});
			}

			if(obj.getAttribute('multi-select')=="true")
				{
					$("#"+divId).find('.multiselect').multiselect();
				}
			if(obj.getAttribute('button-click'))
			{ 
			var myStr = obj.getAttribute('button-click');
        	var strArray = myStr.split(",");
        
	        	for(var i = 0; i < strArray.length; i++){
	        		$("#"+strArray[i]).click();
	       		 }
			}

			if(obj.getAttribute('datatable-view')=="true")

				if ( ! $.fn.DataTable.isDataTable('.datatablepopup') ) 
				{
					 
				$("#"+divId).find('.datatablepopup').DataTable({
				'iDisplayLength': 10,
				});
				 
			}
			if(obj.getAttribute('select-triger')){
				
				 var myStr = obj.getAttribute('select-triger');
        	    var strArray = myStr.split(",");
        
	        	for(var i = 0; i < strArray.length; i++){
	        		$("#"+strArray[i]).trigger('change');
	       		 }
			}
				
				
			}
    });

}

function callPopupsm(obj,url){
	$('#ModalSmId').modal("show"); 
	var divId='ModalSmContentId';
	$('#'+divId).html('<div align="center"><img src="'+full_url_js+'/img/loader.gif" align="center"></div>'); 
    $.get(url,{},
    function(response, status){
        if(status=="success"){
			$('#'+divId).html(response);
			callJqueryDefault(divId);
			if(obj.getAttribute('datatable-view-without-pagination')=="true")
				if ( ! $.fn.DataTable.isDataTable('.datatablepopup') ) 
			{
				$("#"+divId).find('.datatablepopup').DataTable({
				'paging':   false,
				});
			}
			if(obj.getAttribute('datatable-view')=="true")
				if ( ! $.fn.DataTable.isDataTable('.datatablepopup') ) 
			{
				$("#"+divId).find('.datatablepopup').DataTable({
				'iDisplayLength': 10,
			});
			}
				
			}
    });

}

function callPopupMd(obj,url){
	$('#ModalMdId').modal("show"); 
	var divId='ModalMdContentId';
	$('#'+divId).html('<div align="center"><img src="'+full_url_js+'/img/loader.gif" align="center"></div>'); 
    $.get(url,{},
    function(response, status){
        if(status=="success"){
			$('#'+divId).html(response);
			callJqueryDefault(divId);
			if(obj.getAttribute('datatable-view-without-pagination')=="true")
				if ( ! $.fn.DataTable.isDataTable('.datatablepopup') ) 
			{
				$("#"+divId).find('.datatablepopup').DataTable({
				'paging':   false,
				});
			}
			if(obj.getAttribute('datatable-view')=="true")
				if ( ! $.fn.DataTable.isDataTable('.datatablepopup') ) 
			{
				$("#"+divId).find('.datatablepopup').DataTable({
				'iDisplayLength': 10,
			});
			}
				
			}
    });

}


function callPopupLevel2(obj,url){
	$('#Modallevel2').modal("show"); 
	var divId='Modallevel2ContentId';
	$('#'+divId).html('<div align="center"><img src="'+full_url_js+'/img/loader.gif" align="center"></div>'); 
    $.get(url,{},
    function(response, status){
        if(status=="success"){
			$('#'+divId).html(response);
			callJqueryDefault(divId);
			if(obj.getAttribute('datatable-view-without-pagination')=="true")
				if ( ! $.fn.DataTable.isDataTable('.datatablepopup') ) 
			{
				$("#"+divId).find('.datatablepopup').DataTable({
				'paging':   false,
				});
			}
			if(obj.getAttribute('datatable-view')=="true")
				if ( ! $.fn.DataTable.isDataTable('.datatablepopup') ) 
			{
				$("#"+divId).find('.datatablepopup').DataTable({
				'iDisplayLength': 10,
			});
			}
			if(obj.getAttribute('multi-select')=="true")
				{
					$("#"+divId).find('.multiselect').multiselect();
				}
				
			}
    });

}

function callPopupLevel3(obj,url){
	$('#Modallevel3').modal("show"); 
	var divId='Modallevel3ContentId';
	$('#'+divId).html('<div align="center"><img src="'+full_url_js+'/img/loader.gif" align="center"></div>'); 
    $.get(url,{},
    function(response, status){
        if(status=="success"){
			$('#'+divId).html(response);
			callJqueryDefault(divId);
			if(obj.getAttribute('datatable-view-without-pagination')=="true")
				if ( ! $.fn.DataTable.isDataTable('.datatablepopup') ) 
			{
				$("#"+divId).find('.datatablepopup').DataTable({
				'paging':   false,
				});
			}
			if(obj.getAttribute('datatable-view')=="true")
				if ( ! $.fn.DataTable.isDataTable('.datatablepopup') ) 
			{
				$("#"+divId).find('.datatablepopup').DataTable({
				'iDisplayLength': 10,
			});
			}
				
			}
    });

}

function callPopupLevel4(obj,url){
	$('#Modallevel4').modal("show"); 
	var divId='Modallevel4ContentId';
	$('#'+divId).html('<div align="center"><img src="'+full_url_js+'/img/loader.gif" align="center"></div>'); 
    $.get(url,{},
    function(response, status){
        if(status=="success"){
			$('#'+divId).html(response);
			callJqueryDefault(divId);
			if(obj.getAttribute('datatable-view-without-pagination')=="true")
				if ( ! $.fn.DataTable.isDataTable('.datatablepopup') ) 
			{
				$("#"+divId).find('.datatablepopup').DataTable({
				'paging':   false,
				});
			}
			if(obj.getAttribute('datatable-view')=="true")
				if ( ! $.fn.DataTable.isDataTable('.datatablepopup') ) 
			{
				$("#"+divId).find('.datatablepopup').DataTable({
				'iDisplayLength': 10,
			});
			}
				
			}
    });

}


function changeUserType(obj,url){
	
    $.get(url,{
        id: obj.value
    },
    function(data, status){
        if(status=="success")
		{
			if(data.status==1)
				window.location.reload();
		}
    });

}
function changeJurisdiction(obj){ 
	if(obj=="National"){
	$('#state').prop('disabled', 'disabled');
	$('#city').prop('disabled', 'disabled'); 
	}
	if(obj=="State"){
		$('#state').prop('disabled', false); 
		$('#city').prop('disabled', 'disabled'); 
	}
	if(obj=="Municipal"){
		$('#state').prop('disabled', false); 
		$('#city').prop('disabled', false); 
	}

}

function changeAt(obj){  
	$('.pre-disable').attr("readonly","readonly");
	if (obj==null) {
		console.log('empty')
	}else{
		$.each(obj, function( index, value ) {  	 
    	$('#'+value).removeAttr("readonly"); 
    	$('#edit_remark').removeAttr("readonly"); 
	}); 
	}
	
}

function showHideDiv(val,divName)
{  
	if (val==0)
	 {
	 	$('#'+divName).hide(400); 
	 }
	if (val==1)
	 {
	 	$('#'+divName).show(400);
	}

}

function updateType(obj){  
	 
	 if (obj=='correction') {
	 	
	 	$('#notification_date').removeAttr('required');
	 	$('#notification_no').removeAttr('required');
	 	$('#notification').hide(500);
	 }else{	 		 	 
	 	$('#notification_date').attr("required", "true");
	 	$('#notification_no').attr("required", "true");
	 	$('#notification').show(500);
	 }
	
}

function successMsg(msg){  
toastr.success(msg); 
 	// $.toast({
 	// 	heading: msg, 
 	// 	position: 'top-right',
 	// 	loaderBg:'#f0c541',
 	// 	icon: 'success',
 	// 	hideAfter: 3500, 
 	// 	stack: 6
 	// }); 
}

function errorMsg(msg){  
  toastr.error(msg); 
 	// $.toast({
 	// 	heading: msg, 
 	// 	position: 'top-right',
 	// 	loaderBg:'#f0c541',
 	// 	icon: 'error',
 	// 	hideAfter: 3500, 
 	// 	stack: 6
 	// }); 
}


function callchildTable(url,divId,tableId){
	$('#'+divId).html('Please Wait......'); 
    $.get(url,{},
    function(data, status){
        if(status=="success")
		{
			$('#'+divId).html(data);
			if ( ! $.fn.DataTable.isDataTable("#"+tableId) ) 
			{
				var table = $("#"+tableId).DataTable({});

						  // Add event listener for opening and closing details
						  $("#"+tableId).on('click', 'td.details-control', function () {
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
			
			callJqueryDefault(divId);
		}
    }); 
} 

 

 

