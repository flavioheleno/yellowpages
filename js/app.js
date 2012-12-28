//requirejs basic syntax, requires jquery and bootstrap
require(["jquery", "bootstrap"], function($) {
	//jquery regular code
	$(function() {
		//handles all link clicks that must be used as 'buttons'
		$('.monitor').on('click', function(e) {
			switch ($(this).attr('href')) {
				case '#about':
					$('#about').modal();
					break;
				case '#close_about':
					$('#about').modal('hide');
					break;
				case '#new_record':
					$('#new').modal();
					break;
				case '#close_new':
					$('#new').modal('hide');
					break;
				case '#add_record':
					//some user input validation (not too complex or complete)
					if (($('#firstname').val() == '') || ($('#lastname').val() == '') || ($('#phonenumber').val() == '')) {
						alert('AHA! You must fill all the fields.. :)');
						break;
					}
					var phone_regex = /^[0-9]+$/;
					if (!phone_regex.test($('#phonenumber').val())) {
						alert('Hey, you! The phone number can contain only digits!');
						break;
					}
					$('#add_record').attr('disabled', 'disabled');
					//posts the new record form data
					var postdata = 'firstname='+$('#firstname').val()+'&lastname='+$('#lastname').val()+'&phonenumber='+$('#phonenumber').val();
					$.ajax({
						url: 'app/add.php',
						timeout: 3000,
						type: 'POST',
						data: postdata,
						error: function() {
							alert('Help me, I\'m locked inside this machine!! Just kidding, the fact is that I couldn\'t fulfill your request </3');
							$('#add_record').removeAttr('disabled');
						},
						success: function(data) {
							if (data.status) {
								alert('Hooray! Your new record was successfully added!');
								$('#addform')[0].reset();
							} else
								alert(data.msg);
							$('#add_record').removeAttr('disabled');
						}
					});
					break;
				case '#close_alert':
					$('#err_alert').alert('close');
					break;
			}
			return false;
		});
		//cleans the displayed results and the search query
		$('#display_clear').on('click', function(e) {
			$('#display').html('');
		});
		//if the user hit on search button, the page will have a location.search value, this way the page can load the data if it's available
		if (location.search) {
			var qry = location.search.substr(8);
			if (qry.substr(0, 1) != '+')
				qry = qry.replace('+', ' ');
			$('#search').val(qry);
			info_lookup(qry);
		}
		//fetchs the select record info using ajax
		function info_lookup(key) {
			$.ajax({
				url: 'app/info.php?'+key,
				timeout: 3000,
				error: function() {
					display_error('An error occurred while fetching record data, I\'ll try to find it in other database..');
					return false;
				},
				success: function(data) {
					if (data.status) {
						if (data.records == 1)
							display_info(data.info[0]);
						else
							display_list(data.info);
					} else
						display_error('Could not find any information for '+key+', try something different');
				}
			});
		}
		//displays a single record info using table
		function display_info(info) {
			var content = '<table class="table table-hover">';
			content += '	<thead>';
			content += '		<tr>';
			content += '			<th></th>';
			content += '			<th>Last name</th>';
			content += '			<th>First name</th>';
			content += '			<th>Phone number</th>';
			content += '		</tr>';
			content += '	</thead>';
			content += '	<tbody>';
			content += '		<tr>';
			content += '			<td><i class="icon-user"></i></td>';
			content += '			<td>'+info.lastname+'</td>';
			content += '			<td>'+info.firstname+'</td>';
			content += '			<td>'+info.phonenumber+'</td>';
			content += '		</tr>';
			content += '	</tbody>';
			content += '</table>';
			$('#display').html(content);
		}
		//displays a list of records info using table
		function display_list(info) {
			var content = '<table class="table table-hover">';
			content += '	<thead>';
			content += '		<tr>';
			content += '			<th>#</th>';
			content += '			<th>Last name</th>';
			content += '			<th>First name</th>';
			content += '			<th>Phone number</th>';
			content += '		</tr>';
			content += '	</thead>';
			content += '	<tbody>';
			$.each(info, function(k, v) {
				content += '		<tr>';
				content += '			<td>'+(k + 1)+'</td>';
				content += '			<td>'+v.lastname+'</td>';
				content += '			<td>'+v.firstname+'</td>';
				content += '			<td>'+v.phonenumber+'</td>';
				content += '		</tr>';
			});
			content += '	</tbody>';
			content += '</table>';
			$('#display').html(content);
		}
		//displays alert message
		function display_error(msg) {
			$('#errmsg').text(msg);
			$('#err_alert').fadeIn(1500, function() {
				setTimeout(function() { $('#err_alert').fadeOut(1500); }, 5000);
			});
		}
		//typeahead function, using ajax to query database as data-source
		$('#search').typeahead({
			source: function(query, process) {
				return $.ajax({
					url: 'app/query.php?'+query,
					timeout: 3000,
					error: function() {
						display_error('An error occurred while fetching search data');
						return false;
					},
					success: function(data) {
						if (data.status)
							return process(data.list);
						return false;
					}
				});
			},
			updater: function(item) {
				info_lookup(item);
				return item;
			}
		});
	});
});
