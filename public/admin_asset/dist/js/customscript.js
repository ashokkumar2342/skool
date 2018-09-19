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
				$("#"+divId).find('.multiselect').selectpicker();
			if(callback)
				callback();
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
	$('#success-popup-content-id').html(msg); 
}

function callPopupLarge(obj,url){
	$('#ModalLargeId').modal("show"); 
	var divId='ModalLargeContentId';
	$('#'+divId).html('Please Wait......'); 
    $.get(url,{},
    function(response, status){
        if(status=="success"){
			$('#'+divId).html(response);
			callJqueryDefault(divId);
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

function callPopupsm(obj,url){
	$('#ModalSmId').modal("show"); 
	var divId='ModalSmContentId';
	$('#'+divId).html('Please Wait......'); 
    $.get(url,{},
    function(response, status){
        if(status=="success"){
			$('#'+divId).html(response);
			callJqueryDefault(divId);
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
	$('#'+divId).html('Please Wait......'); 
    $.get(url,{},
    function(response, status){
        if(status=="success"){
			$('#'+divId).html(response);
			callJqueryDefault(divId);
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

function callPopupLevel3(obj,url){
	$('#Modallevel3').modal("show"); 
	var divId='Modallevel3ContentId';
	$('#'+divId).html('Please Wait......'); 
    $.get(url,{},
    function(response, status){
        if(status=="success"){
			$('#'+divId).html(response);
			callJqueryDefault(divId);
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
	if(obj.value=="national")
		$('#city_id_div').hide();
	if(obj.value=="state" || obj.value=="muncipal")
		$('#city_id_div').show();
	
  

}

function successMsg(msg){  
 toastr.success(msg);
}
function errorMsg(msg){  
 toastr.error(msg);
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

