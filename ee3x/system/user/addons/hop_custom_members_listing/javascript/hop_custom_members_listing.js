
if (window.location.href.indexOf("/cp/members") >= 0) {
	// Note: that doesn't mean we are on a member listing page

	// Retrieve list of member ids
	let member_ids = [];
	$('form[action*="/cp/members"] .tbl-wrap table tbody tr').each(function(idx, element){
		member_ids.push($(element).find('input[name="selection[]"]').attr('value'));
	});

	if (member_ids.length) {
		// Ajax query to get back the member data
		$.ajax({
			method: "POST",
			url: hcml_ajax_url,
			data: { m_ids: member_ids }
		})
		.done(function(member_data) {
			console.log(member_data);
			$('form[action*="/cp/members"] .tbl-wrap table tbody tr').each(function(idx, element){
				const mem_id = $(element).find('input[name="selection[]"]').attr('value');
				if (member_data[mem_id]) {
					$(element).find('td:nth-child(2)').append('<span class="meta-info">— '+member_data[mem_id].first_name+' '+member_data[mem_id].last_name+'</span>');
				}
			});
		})
		.fail(function(jqXHR, textStatus, errorThrown) {
			console.log("Error fetching members extra data: "+textStatus);
		});
	}
}