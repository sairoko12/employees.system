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
	$("#new-employee").submit(function(e) {
		e.preventDefault();
		e.stopPropagation();

		$.ajax({
			url: "/employees/add",
			type: "POST",
			data: $(this).serialize(),
			dataType: "json",
			beforeSend: function() {
				$("#progress-employee").show();
			},
			complete: function() {
				$("#progress-employee").hide();
			},
			success: function(response) {
				$("#employee-id").val(response.employee);
				$("#address-form").show();

				var label = $("#address-form").children('h3').text();
				var replace = label.replace(':name', response.employeeName);

				$("#address-form").children('h3').text(replace);
			},
			error: onError
		});

		return false;
	});

	$("#address-form").submit(function(e) {
		e.preventDefault();
		e.stopPropagation();

		var employee = $("#employee-id").val();

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
					location.href = "/employees";
				}
			},
			error: onError
		});

		return false;
	});
});