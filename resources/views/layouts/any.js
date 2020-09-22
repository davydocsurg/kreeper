var receiver_id ='';
	var my_id = '{{ Auth::id() }}';
	${document}.ready(function () {
		// ajax setup form csrf token
		$.ajaxSetup({
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		});

		// ENABLE PUSHER LOGGING
		Pusher.logToConsole = true;

		var pusher = new Pusher('...slug...', {
			cluster: 'ap2',
			forceTLS:true
		});

		var channel = pusher.subscribe('my-channel');
		channel.bind('my-event', function (data) {
			alert(JSON.stringify(data));
			if (my_id == data.from) {
				// alert('sender');
				$('#' + data.from).click();
			} else if (my_id == data.to) {
				if(receiver_id == data.from) {
					$('#' + data.from).click();
				} else {
					// if receiver is not selected, notify that user
					var pending = parseInt($('#' + data.from).find('.pending').html());

					if (pending) {
						$('#' + data.from).find('.pending').html(pending + 1);

					} else {
						$('#' + data.from).append('<span class ="pending">i</span>');
					}
				}
			}
		});

		$('.user').click(function () {
			$('.user').removeClass('active');
			$(this).addClass('active');
			$(this).find('.pending').remove();

			receiver_id = $(this).attr('id');
			$.ajax({
				type: 'get',
				url: "message/" + receiver_id,
				data: "",
				cache: false,
				success: function (data) {
					$('#messages').html(data)
				}
			});

			// to check if when enter key is pressed, receiver is selected and action isn't null
			if (e.keyCode == 13 && message != '' && receiver_id !='') {
				$(this).val(''); //clears the input after submit

				var datastr = "receiver_id=" + receiver_id + "&message=" + message;
				$.ajax({
					type: "post",
					url: "message",
					data: datastr,
					cache: false,
					success: function (data) {
						$('#messages').html(data);
						scrollToBottomFunc();
					},
					error: function (jqXHR, status, err) {

					},
					complete: function () {
						scrollToBottomFunc();
					}
				})
			}
		})
	})

	// auto scroll down logic
	function scrollToBottomFunc() {
		$('.message-wrapper').animate((
			scrollTop: $('.message-wrapper').get(0).scrollHeight }, 50);
		))
	}