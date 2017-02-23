	<script>
	function appendform(){
		var form = '';
		form += '<form action="/contact/create" role="form" method="POST">'
		form += '{!! csrf_field() !!}';
		form += '<div class="form-group">'
		form += '<div class="col-md-3"><input type="text" class="form-control input-sm" name="name" placeholder="name"/></div>';
		form += '<div class="col-md-3"><input type="text" class="form-control input-sm" name="nickname" placeholder="nickname"/></div>';
		form += '<div class="col-md-3"><input type="text" class="form-control input-sm" name="phone" placeholder="Phone Number"/></div>';
		form += '<div class="col-md-3"><input type="text" class="form-control input-sm" name="email" placeholder="Email"/></div>';
		form += '<div class="col-md-2"><input type="text" class="form-control input-sm" name="job" placeholder="Job"/></div>';
		form += '<div class="col-md-2"><input type="text" class="form-control input-sm" name="gender" placeholder="gender"/></div>';
		form += '<div class="col-md-3"><input type="text" class="form-control input-sm" name="disabilities" placeholder="disabilities"/></div>';
						form += '<div class="col-md-4"><input type="text" class="form-control input-sm" name="address" placeholder="address" /></div>';

		form += '<input type="text" class="hidden" name="owner" value="{{auth()->user()->id}}"/>';
		form += '<button class="btn btn-primary btn-success btn-sm" value="submit">Create Contact</button>';
		form += '</div>'
		form += '</form>';

		$('.form-container').append(form);

		$(".add-btn").hide();
	}

	function updateForm(id){
		console.log($('.name-'+id).val());
		var form = '';
		form += '<form action="/contact/update" role="form" method="POST">'
		form += '{!! csrf_field() !!}';
		form += '<input name="id" class="hidden" value="'+id+'" />';
		form += '<div class="col-md-3"><input type="text" class="form-control input-sm"  name="name" placeholder="name" value="'+$('.name-'+id).text()+'"/></div>';
		form += '<div class="col-md-3"><input type="text" class="form-control input-sm" name="nickname" placeholder="nickname" value="'+$('.nickname-'+id).text()+'"/></div>';
		form += '<div class="col-md-3"><input type="text" class="form-control input-sm" name="phone" placeholder="Phone Number" value="'+$('.phone-'+id).text()+'"/></div>';
		form += '<div class="col-md-3"><input type="text" class="form-control input-sm" name="email" placeholder="Email" value="'+$('.email-'+id).text()+'"/></div>';
		form += '<div class="col-md-2"><input type="text" class="form-control input-sm" name="job" placeholder="Job" value="'+$('.job-'+id).text()+'"/></div>';
		form += '<div class="col-md-2"><input type="text" class="form-control input-sm" name="gender" placeholder="gender" value="'+$('.gender-'+id).text()+'"/></div>';
		form += '<div class="col-md-3"><input type="text" class="form-control input-sm" name="disabilities" placeholder="disabilities" value="'+$('.disabilities-'+id).text()+'"/></div>';
				form += '<div class="col-md-4"><input type="text" class="form-control input-sm" name="address" placeholder="address" value="'+$('.address-'+id).text()+'"/></div>';

		form += '<input type="text" class="hidden" name="owner" value="{{auth()->user()->id}}"/>';
		form += '<button class="btn btn-primary btn-sm btn-success" value="submit">update Contact</button>';
		form += '</form>';

		$('.contact-'+id).append(form);

		$(".edit-btn").hide();
	}
	function searchForm(){
		var form = '';
		form += '<form action="/contact/search" role="form" method="POST">'
		form += '{!! csrf_field() !!}';
		form += '<div class="col-md-3"><input type="text" class="form-control input-sm" name="name" placeholder="name"/></div>';
		form += '<div class="col-md-3"><input type="text" class="form-control input-sm" name="nickname" placeholder="nickname"/></div>';
		form += '<div class="col-md-3"><input type="text" class="form-control input-sm" name="phone" placeholder="Phone Number"/></div>';
		form += '<div class="col-md-3"><input type="text" class="form-control input-sm" name="email" placeholder="Email"/></div>';
		form += '<div class="col-md-2"><input type="text" class="form-control input-sm" name="job" placeholder="Job"/></div>';
		form += '<div class="col-md-2"><input type="text" class="form-control input-sm" name="gender" placeholder="gender"/></div>';
		form += '<div class="col-md-2"><input type="text" class="form-control input-sm" name="disabilities" placeholder="disabilities"/></div>';
						form += '<div class="col-md-4"><input type="text" class="form-control input-sm" name="address" placeholder="address" /></div>';

		form += '<input type="text" class="hidden" name="owner" value="{{auth()->user()->id}}"/>';
		form += '<button class="btn btn-info btn-sm" value="submit">Search!</button>';
		form += '</form>';

		$(".search").append(form);
		$(".search-button").hide();
	}

function submit(id){
 form= "";
 form += '<form method="POST" id="delete-'+id+'" role="form" action="/contact/delete">';
 form += '{!! csrf_field() !!}';
 form +='<input class="hidden" type="text" name="id" value="'+id+'"/>';
 form +='</form>';
 $(form).appendTo('body').submit();
}

	</script>