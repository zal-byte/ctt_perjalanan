function login( username, password ){
	
	var param = new FormData();
	var token = $("input[name=_token]").val()
	param.append('username', username);
	param.append('password', password);
	alert(token);

  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN':token
        }
    });

	$.ajax({
		type:'POST',
		url: '{{ route("ajaxPost_login")}}',
		success: function(res){
			console.log(res);
		}
	});

}