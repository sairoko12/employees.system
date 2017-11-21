function onError(err) {
	console.log(err.responseText);

	try {
		var response = JSON.parse(err.responseText);

		if (response.errors) {
			var message = response.message;

			for (var i in response.errors) {
				message += "\n  - " + response.errors[i][0];
			}

			alert(message);

			return false;
		}
	} catch (Err) {
		return false;
	}		
}

$(document).ready(function(e) {
	$('#add-address').on('show.bs.modal', function (event) {
	  	var button = $(event.relatedTarget);
	  	var employeeName = button.data('nombre');
	  	var employee = button.data('employee');

		var modal = $(this);
		modal.find('.modal-title').text('Agregar dirección para ' + employeeName);
		modal.find('.modal-body input[name="employee"]').val(employee);
	});

	$("#add-address-form").submit(function(e) {
		e.preventDefault();
		e.stopPropagation();

		var employee = $("#employee-id").val();
		console.log(employee);
		$.ajax({
			url: '/employees/address/' + employee,
			type: 'POST',
			dataType: 'json',
			data: $(this).serialize(),
			beforeSend: function() {
				$("#progress-address").show();
			},
			complete: function() {
				$("#progress-address").hide();
			},
			success: function(response) {
				if (response.success) {
					location.reload();
				}
			},
			error: onError
		});

		return false;
	});
});