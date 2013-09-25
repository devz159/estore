$(document).ready(function() {
	var base_url = $('meta[name*="url"]').attr('content');

	$('.delete').click(function(){
		
		var currtr = $(this);
		//alert(currtr.attr("jocode"));
		$("#dialog-confirm p").text("Delete product: " + $(this).closest('tr').find('td:eq(0)').text() + " ?");
	 	$("#dialog-confirm").dialog({
						buttons : {
							"Delete" : function() {
								
								$.post(base_url + "admin/product/deleteproduct", {'product_ID': currtr.parent().parent().attr('productid')})
								.success(function(data) {
									if(data == 1){
										currtr.closest('tr').remove('tr');
									}else{
										//error
										alert('error');
									}
								});	
								
								$(this).dialog("close");
								
							},
							Cancel : function() {
								$(this).dialog("close");
							}
						}
					});
		
		
		return false;
	});
});