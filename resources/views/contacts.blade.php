
@include('layouts.app')
@if(auth()->user())
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
				<div class="col-xs-4 col-sm-1 col-md-3">
				Gender: <span class="gender-{{$contact->id}}">{{$contact->gender}}</span>
				</div>
				<div class="col-xs-4 col-sm-2 col-md-3">
				Nickname: <span class="nickname-{{$contact->id}}">{{$contact->nickname}}</span>
				</div>
				<div class="col-xs-4 col-sm-3 col-md-3">
				Email: <span class="email-{{$contact->id}}">{{$contact->email}}</span>
				</div>
				<div class="col-xs-4 col-sm-3 col-md-3">
				Phone: <span class="phone-{{$contact->id}}">{{$contact->phone}}</span>
				</div>

				<div class="col-xs-4 col-sm-1 col-md-3">
				Address: <span class="address-{{$contact->id}}">{{$contact->address}}</span>
				</div>
				<div class="col-xs-4  col-sm-1 col-md-3">
				Job: <span class="job-{{$contact->id}}">{{$contact->job}}</span>
				</div>
				<div class="col-xs-4 col-sm-1 col-md-3">
				Additional Info: <span class="disabilities-{{$contact->id}}">{{$contact->disabilities}}</span>
				</div>
				<div class="col-xs-4 col-sm-1 col-md-3">
				
<div class="modal fade" id="delete-{{$contact->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Do you really want to delete {{$contact->name}}?</p>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn- btn-small" data-dismiss="modal">Cancel</button>
   	<button type="button" class="btn btn-danger btn-small btn-primary" onclick="submit({{$contact->id}})"  data-dismiss="modal" value="submit" >Delete</button>


	 </form>
      </div>
    </div>
  </div>
</div>


								<button class="btn btn-danger btn-xs btn-primary" data-toggle="modal" data-target="#delete-{{$contact->id}}">Delete</button>
								<button class=" edit-btn btn btn-primary btn-xs btn-warning" onclick="updateForm({{$contact->id}})">&nbsp;Edit&nbsp;</button>

				</div>

				 
		 	</div>
		</div>
		@endforeach

	</div>
	<div class="form-container panel-default col-md-12">

	</div>
	@if($contacts)
	{{$contacts->links()}}
	@endif
	<div class="panel-default col-md-12">

	<button class="add add-btn btn btn-primary btn-sm" style="margin-bottom:15px;" onclick="appendform()">Add Contact +</button>
	</div>

	</div>

@include('snippets.rolodex')
</div>
 
@endif
