@if(auth()->user())
@include('layouts.app')

<div class="container">

	<div class="panel-default panel col-md-12 row">
		<div class="title">
			<span style="font-size:30px">Contacts</span>
		</div>
	</div>
		

	<div class="col-md-12 row">
		<div class="search" style="margin-bottom:15px;">
			<button class="btn btn-secondary search-button" onclick="searchForm()"> Looking for someone specific?</button>
		</div>
	</div>
	
	<div class="row">
		@foreach($contacts as $contact)
	
		<div class="panel col-md-12 col-sm-12 panel-default contact contact-{{$contact->id}}">
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
				<button class="btn btn-danger btn-xs btn-primary" value="submit">Delete</button>

				</form>
								<button class="btn btn-primary btn-sm btn-warning" onclick="updateForm({{$contact->id}})">&nbsp;Edit&nbsp;</button>

				</div>

				 
		 	</div>
		</div>
		@endforeach

	</div>
	<div class="form-container panel-default col-md-12">

	</div>
	{{$contacts->links()}}
	<div class="panel-default col-md-12">

	<button class="add btn btn-primary btn-sm" style="margin-bottom:15px;" onclick="appendform()">Add Contact +</button>
	</div>

	</div>

	<script>
	function appendform(){
		var form = '';
		form += '<form action="/contact/create" role="form" method="POST">'
		form += '{!! csrf_field() !!}';
		form += '<div class="form-group">'
		form += '<div class="col-xs-3"><input type="text" class="form-control input-sm" name="name" placeholder="name"/></div>';
		form += '<div class="col-xs-3"><input type="text" class="form-control input-sm" name="nickname" placeholder="nickname"/></div>';
		form += '<div class="col-xs-3"><input type="text" class="form-control input-sm" name="phone" placeholder="Phone Number"/></div>';
		form += '<div class="col-xs-3"><input type="text" class="form-control input-sm" name="email" placeholder="Email"/></div>';
		form += '<div class="col-xs-2"><input type="text" class="form-control input-sm" name="job" placeholder="Job"/></div>';
		form += '<div class="col-xs-2"><input type="text" class="form-control input-sm" name="gender" placeholder="gender"/></div>';
		form += '<div class="col-xs-3"><input type="text" class="form-control input-sm" name="disabilities" placeholder="disabilities"/></div>';
		form += '<input type="text" class="hidden" name="owner" value="{{auth()->user()->id}}"/>';
		form += '<button class="btn btn-primary btn-success btn-sm" value="submit">Create Contact</button>';
		form += '</div>'
		form += '</form>';

		$('.form-container').append(form);
	}

	function updateForm(id){
		console.log($('.name-'+id).val());
		var form = '';
		form += '<form action="/contact/update" role="form" method="POST">'
		form += '{!! csrf_field() !!}';
		form += '<input name="id" class="hidden" value="'+id+'" />';
		form += '<div class="col-xs-3"><input type="text" class="form-control input-sm"  name="name" placeholder="name" value="'+$('.name-'+id).text()+'"/></div>';
		form += '<div class="col-xs-3"><input type="text" class="form-control input-sm" name="nickname" placeholder="nickname" value="'+$('.nickname-'+id).text()+'"/></div>';
		form += '<div class="col-xs-3"><input type="text" class="form-control input-sm" name="phone" placeholder="Phone Number" value="'+$('.phone-'+id).text()+'"/></div>';
		form += '<div class="col-xs-3"><input type="text" class="form-control input-sm" name="email" placeholder="Email" value="'+$('.email-'+id).text()+'"/></div>';
		form += '<div class="col-xs-2"><input type="text" class="form-control input-sm" name="job" placeholder="Job" value="'+$('.job-'+id).text()+'"/></div>';
		form += '<div class="col-xs-2"><input type="text" class="form-control input-sm" name="gender" placeholder="gender" value="'+$('.gender-'+id).text()+'"/></div>';
		form += '<div class="col-xs-3"><input type="text" class="form-control input-sm" name="disabilities" placeholder="disabilities" value="'+$('.disabilities-'+id).text()+'"/></div>';
		form += '<input type="text" class="hidden" name="owner" value="1"/>';
		form += '<button class="btn btn-primary btn-sm btn-success" value="submit">update Contact</button>';
		form += '</form>';

		$('.contact-'+id).append(form);
	}
	function searchForm(){
		var form = '';
		form += '<form action="/contact/search" role="form" method="POST">'
		form += '{!! csrf_field() !!}';
		form += '<div class="col-xs-3"><input type="text" class="form-control input-sm" name="name" placeholder="name"/></div>';
		form += '<div class="col-xs-3"><input type="text" class="form-control input-sm" name="nickname" placeholder="nickname"/></div>';
		form += '<div class="col-xs-3"><input type="text" class="form-control input-sm" name="phone" placeholder="Phone Number"/></div>';
		form += '<div class="col-xs-3"><input type="text" class="form-control input-sm" name="email" placeholder="Email"/></div>';
		form += '<div class="col-xs-2"><input type="text" class="form-control input-sm" name="job" placeholder="Job"/></div>';
		form += '<div class="col-xs-2"><input type="text" class="form-control input-sm" name="gender" placeholder="gender"/></div>';
		form += '<div class="col-xs-2"><input type="text" class="form-control input-sm" name="disabilities" placeholder="disabilities"/></div>';
		form += '<input type="text" class="hidden" name="owner" value="{{auth()->user()->id}}"/>';
		form += '<button class="btn btn-info btn-sm" value="submit">Search!</button>';
		form += '</form>';

		$(".search").append(form);
		$(".search-button").hide();
	}
	</script>
</div>

@else
@include('auth.login')
@endif