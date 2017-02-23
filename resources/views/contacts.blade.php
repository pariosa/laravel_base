@include('layouts.app')

<div class="container">

	<div class="panel-default col-md-12">
		<div class="panel-heading">
			Contacts
		</div>
		@foreach($contacts as $contact)
		 
		<div class="panel panel-default contact contact-{{$contact->id}}">
			<div class="panel-heading">
				<span class="name-{{$contact->id}}">{{$contact->name}}</span>
			</div>
			<div class="panel-body">
				<div class="col-sm-1">
				Gender: <span class="gender-{{$contact->id}}">{{$contact->gender}}</span>
				</div>
				<div class="col-sm-2">
				Nickname: <span class="nickname-{{$contact->id}}">{{$contact->nickname}}</span>
				</div>
				<div class="col-sm-3">
				Email: <span class="email-{{$contact->id}}">{{$contact->email}}</span>
				</div>
				<div class="col-sm-3">
				Phone: <span class="phone-{{$contact->id}}">{{$contact->phone}}</span>
				</div>
				<div class="col-sm-1">
				Job: <span class="job-{{$contact->id}}">{{$contact->job}}</span>
				</div>
				<div class="col-sm-1">
				Disabilities: <span class="disabilities-{{$contact->id}}">{{$contact->disabilities}}</span>
				</div>
				<div class="col-sm-1">
				<form method="POST" role="form" action="/contact/delete">
				{!! csrf_field() !!}
				<input class="hidden" type='text' name='id' value="{{$contact->id}}"/>
				<button class="btn btn-primary" value="submit">Delete</button>

				</form>
								<button class="btn btn-primary" onclick="updateForm({{$contact->id}})">Edit</button>

				</div>

				 
		 	</div>
		</div>
		@endforeach

	</div>
	<div class="form-container panel-default col-md-12">

	</div>
	<div class="panel-default col-md-12">

	<button class="add btn btn-primary" onclick="appendform()">Add Contact +</button>
	</div>

	<script>
	function appendform(){
		var form = '';
		form += '<form action="/contact/create" role="form" method="POST">'
		form += '{!! csrf_field() !!}';
		form += '<input type="text" name="name" placeholder="name"/>';
		form += '<input type="text" name="nickname" placeholder="nickname"/>';
		form += '<input type="text" name="phone" placeholder="Phone Number"/>';
		form += '<input type="text" name="email" placeholder="Email"/>';
		form += '<input type="text" name="job" placeholder="Job"/>';
		form += '<input type="text" name="gender" placeholder="gender"/>';
		form += '<input type="text" name="disabilities" placeholder="disabilities"/>';
		form += '<input type="text" class="hidden" name="owner" value="1"/>';
		form += '<button class="btn btn-primary" value="submit">Create Contact</button>';
		form += '</form>';

		$('.form-container').append(form);
	}

	function updateForm(id){
		console.log($('.name-'+id).val());
		var form = '';
		form += '<form action="/contact/update" role="form" method="POST">'
		form += '{!! csrf_field() !!}';
		form += '<input name="id" class="hidden" value="'+id+'" />';
		form += '<input type="text" name="name" placeholder="name" value="'+$('.name-'+id).text()+'"/>';
		form += '<input type="text" name="nickname" placeholder="nickname" value="'+$('.nickname-'+id).text()+'"/>';
		form += '<input type="text" name="phone" placeholder="Phone Number" value="'+$('.phone-'+id).text()+'"/>';
		form += '<input type="text" name="email" placeholder="Email" value="'+$('.email-'+id).text()+'"/>';
		form += '<input type="text" name="job" placeholder="Job" value="'+$('.job-'+id).text()+'"/>';
		form += '<input type="text" name="gender" placeholder="gender" value="'+$('.gender-'+id).text()+'"/>';
		form += '<input type="text" name="disabilities" placeholder="disabilities" value="'+$('.disabilities-'+id).text()+'"/>';
		form += '<input type="text" class="hidden" name="owner" value="1"/>';
		form += '<button class="btn btn-primary" value="submit">update Contact</button>';
		form += '</form>';

		$('.contact-'+id).append(form);
	}
	</script>
</div>