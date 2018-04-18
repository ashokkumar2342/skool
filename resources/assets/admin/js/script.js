
$('body').find('*').on('click',function(e){
	if($(this).attr('data-prevent') == 'true'){
		e.preventDefault();
	}
	if ($(this).attr('data-action') === 'delete') {
	e.preventDefault();		
		if (confirm('Are you sure to delete this data.')) {
			var html = $(this).html();
			var text = ' '+$(this).text();
			$(this).html('<i class="fa fa-spin fa-spinner"></i>'+text);
			$(this).closest($(this).attr('data-parent')).find('*').addClass('disabled');
			axios.delete($(this).attr('data-url')).then(response => {
                if (response.data.status === 'OK' ) {
                	$(this).closest($(this).attr('data-parent')).remove();
                	if(response.data.message){
	                    toastr.success(response.data.message); 
	                }
                }
                else{
                	$(this).closest($(this).attr('data-parent')).find('*').removeClass('disabled');
                	$(this).html(html);
                	if(response.data.message){
	                    toastr.error(response.data.message); 
	                }
                }                
            }).catch(error=> {
            	$(this).closest($(this).attr('data-parent')).find('*').removeClass('disabled');
                $(this).html(html);
                toastr.error('Whoops, looks like something went wrong ! Try again ...'); 
            });
		}
	}

	if ($(this).attr('data-action') === 'btnStatus') {
		var text = ' '+$(this).text();
		$(this).html('<i class="fa fa-spin fa-spinner"></i>'+text).addClass('disabled');
		axios.put($(this).attr('data-url')).then(response => {
            if (response.data.status === 'OK' ) {
            	$(this).html(response.data.btn.text).addClass(response.data.btn.addClass).removeClass(response.data.btn.removeClass+' disabled');
            	if(response.data.message){
                    toastr.success(response.data.message); 
                }
            }
            else{
            	$(this).html(text).removeClass('disabled');
            	if(response.data.message){
                    toastr.error(response.data.message); 
                }
            }                
        }).catch(error=> {
        	$(this).html(html);
            toastr.error('Whoops, looks like something went wrong ! Try again ...'); 
        });
	}
	if ($(this).attr('data-action') === 'reset-password') {	
		if (confirm('Are you sure to reset password of this user.')) {
			var html = $(this).html();
			$(this).html('<i class="fa fa-spin fa-spinner"></i>').addClass('disabled');
			axios.put($(this).attr('data-url')).then(response => {
                if (response.data.status === 'OK' ) {
                	$(this).html(html).removeClass('disabled');
                	if(response.data.message){
	                    toastr.success(response.data.message); 
	                }
                }
                else{
                	$(this).html(html).removeClass('disabled');
                	if(response.data.message){
	                    toastr.error(response.data.message); 
	                }
                }                
            }).catch(error=> {
            	$(this).html(html).removeClass('disabled')
                toastr.error('Whoops, looks like something went wrong ! Try again ...'); 
            });
		}
	}
	
});