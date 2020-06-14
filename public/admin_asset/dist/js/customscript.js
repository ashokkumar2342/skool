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
            		buttonWidth: '80%',
            	 
                     
            
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
			
				

			
			if(obj.getAttribute('button-click'))
			{	
			var myStr = obj.getAttribute('button-click');
        	var strArray = myStr.split(",");
        
	        	for(var i = 0; i < strArray.length; i++){
	        		$("#"+strArray[i]).click();
	       		 }
			}
			if(obj.getAttribute('button-click-by-class'))
			{	
			var myStr = obj.getAttribute('button-click-by-class');
        	var strArray = myStr.split(",");
        
	        	for(var i = 0; i < strArray.length; i++){
	        		$("."+strArray[i]).click();
	       		 }
			}
			if(obj.getAttribute('success-popup')){
				var response=data.msg; 
				if (response!=null) {
					if (data.status==1) {
						successMsg(response);	
					}
					else if(data.status==0){
						errorMsg(response);
					}
					 
				}
				
			
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
			if(obj.getAttribute('select2'))
			{  
				$(".select2").select2();
			}
			if(obj.getAttribute('multiselect'))
			{  
			   $('.pre-selected-options').multiSelect();
			}
			if(obj.getAttribute('daterangepicker'))
			{  
			     $('input[name="daterange"]').daterangepicker({
				     autoUpdateInput: true,
				       
				  });
			}
			if(obj.getAttribute('text-editor')!=""){
				$('.'+obj.getAttribute('text-editor')).summernote({
					toolbar: [
					     
					     ['font', ['bold', 'italic', 'underline']], 
					     ['fontsize', ['fontsize']],
					     ['color', ['color']],
					     ['para', ['ul', 'ol', 'paragraph']],
					     ['height', ['height']], 		      
					     ['insert', ['link', 'picture','video']],
					  
					   ],

					 placeholder: 'write here...',
					 height: 100
				}); 
							
			}
			else if(obj.getAttribute('data-table-without-pagination'))
			{
			$("#"+obj.getAttribute('data-table-without-pagination')).DataTable({
				'paging':   false,
				dom: 'Bfrtip',
					buttons: [
						'copy', 'csv', 'excel', 'pdf', 'print'
					]
			});
			}
			else if(obj.getAttribute('data-table-with-pagination'))
			{
			$("#"+obj.getAttribute('data-table-with-pagination')).DataTable({
				'paging':   true,
				dom: 'Bfrtip',
					buttons: [
						'copy', 'csv', 'excel', 'pdf', 'print'
					]
			});
			}
			else if(obj.getAttribute('data-table-without-pagination-disable-sorting'))
			{
			$("#"+obj.getAttribute('data-table-without-pagination-disable-sorting')).DataTable({
				'paging':   false,
				"aaSorting": [],
				dom: 'Bfrtip',
					buttons: [
						'copy', 'csv', 'excel', 'pdf', 'print'
					]
			});
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
	$('#'+divId).html('<div align="center"><img src="'+full_url_js+'/img/loader.gif" align="center" width="150px" style="padding-top:200px"></div>'); 
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
					$("#"+divId).find('.multiselect').multiselect({
						includeSelectAllOption: true,
           			 maxHeight: 400, 
            		buttonWidth: 305,
            	 
                     
            
             	 enableFiltering: true
				});
					
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
			if(obj.getAttribute('select2'))
			{  
				$(".select2").select2();
			}
			if(obj.getAttribute('crop-image'))
			{  
				var name = obj.getAttribute('crop-image')
				$uploadCrop=$('#'+name).croppie({
				    enableExif: true,
				    viewport: {
				        width: 200,
				        height: 250,         
				    },
				    boundary: {
				        width: 210,
				        height: 260
				    }
				});
			}	
				
			}
			if(obj.getAttribute('text-editor')!=""){
				$('.'+obj.getAttribute('text-editor')).summernote({
					toolbar: [
					     
					     ['style', ['style']],
					     ['font', ['bold', 'underline', 'clear']],
					     ['fontname', ['fontname']],
					     ['fontsize', ['fontsize']], 
					     ['height', ['height']], 
					     ['color', ['color']],
					     ['para', ['ul', 'ol', 'paragraph']],
					     ['table', ['table']],
					     ['insert', ['link', 'picture', 'video']],
					     ['view', ['fullscreen', 'codeview', 'help']] 

					  
					   ],

					 placeholder: 'write here...',
					 height: 100,
					  fontSizes: ['8', '9', '10', '11', '12', '14', '18', '24','28','30','32', '36', '48' , '64', '82', '150']
				}); 
							
			}
    });

}

function callPopupsm(obj,url){
	$('#ModalSmId').modal("show"); 
	var divId='ModalSmContentId';
	$('#'+divId).html('<div align="center"><img src="'+full_url_js+'/img/loader.gif" align="center" width="150px" style="padding-top:200px"></div>'); 
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
	$('#'+divId).html('<div align="center"><img src="'+full_url_js+'/img/loader.gif" align="center" width="150px" style="padding-top:200px"></div>'); 
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
	$('#'+divId).html('<div align="center"><img src="'+full_url_js+'/img/loader.gif" align="center" width="150px" style="padding-top:200px"></div>'); 
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
	$('#'+divId).html('<div align="center"><img src="'+full_url_js+'/img/loader.gif" align="center" width="150px" style="padding-top:200px"></div>'); 
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
	$('#'+divId).html('<div align="center"><img src="'+full_url_js+'/img/loader.gif" align="center" width="150px" style="padding-top:200px"></div>'); 
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
function callErrorPopup(msg){
	$('#error-popup').modal("show"); 
	$('#error-popup-content-id').html(msg); 
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

 function imageBind(obj) {
 	var reader = new FileReader();
 	     reader.onload = function (e) {
 	       $uploadCrop.croppie('bind', {
 	         url: e.target.result
 	       }).then(function(){
 	         console.log('jQuery bind complete');
 	       });
 	     }
 	     reader.readAsDataURL(obj.files[0]);
 } 
 function imageUpload(url,btnId) { 	
 	  $uploadCrop.croppie('result', {
 	    type: 'canvas',
 	    size: 'viewport'
 	  }).then(function (resp) {
 	    $.ajax({
 	      url: url,
 	      type: "POST",
 	      data: {"image":resp},
 	      success: function (data) {   
 	      successMsg("Image Save Successfully")     
 	       var myStr = btnId;
           	var strArray = myStr.split(",");
           
   	        	for(var i = 0; i < strArray.length; i++){
   	        		$("#"+strArray[i]).click();
   	       		 }
 	      }
 	    });
 	  }); 	 
 }
 $.ajaxSetup({
 headers: {
     'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
 }
 });

 
 function fetchNotifications() { 
     var page = $('.endless-pagination').data('next-page'); 
     
     if(page !== null) {
     	$('#notification_wait').show();

         clearTimeout( $.data( this, "scrollCheck" ) );

         $.data( this, "scrollCheck", setTimeout(function() {

             var scroll_position_for_posts_load = $('#notification_list').height() + $('#notification_list').scrollTop() + 100;

             if(scroll_position_for_posts_load >= $('#notification_list').height()) {            	
                 $.get(page, function(data){
                     $('.notifications').append(data.notifications);
                     $('.endless-pagination').data('next-page', data.next_page);
                     $('#notification_wait').hide();
                 });
             }
         }, 500))

     }
 } 
 //scroll on window
 $('#notification_list').scroll(fetchNotificationsAll);

 function fetchNotificationsAll() {
 	 
     var page = $('.endless-pagination2').data('next-page');
     var hasPage = $('.endless-pagination2').data('has-page');
     
  
     if(page !== null && hasPage == 1) {
 	$('#message_wait').show();
         clearTimeout( $.data( this, "scrollCheck" ) );

         $.data( this, "scrollCheck", setTimeout(function() {
             var scroll_position_for_posts_load = $(window).height() + $(window).scrollTop() + 100;

             if(scroll_position_for_posts_load >= $(document).height()) {
             	       
                 $.get(page, function(data){
                                        	 
                     $('.notificationItmes').append(data.notifications);
                     
                     $('.endless-pagination2').data('next-page', data.next_page);
                      $('#message_wait').hide();	 

                 });
             }
         }, 350))

     }
 }

