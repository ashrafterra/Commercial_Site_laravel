@extends('layouts.app')

@section('content')
<div class="row album py-5 bg-light">
	<div class="col-4">
		<div class="row offset-1">
			<div class="col-4"> Item Name: </div>
			<div class="col-8"> {{$item->name}} </div>
		</div>
		<div class="row offset-1">
			<div class="col-4"> Price: </div>
			<div class="col-8"> {{$item->price}} LE </div>
		</div>
		<div class="row offset-1">
			<div class="col-4"> Brand: </div>
			<div class="col-8"> {{$item->brand->brand}} </div>
		</div>
		<div class="row offset-1">
			<div class="col-3"> Description: </div>
			<div class="col-9"> {{$item->description}} </div>
		</div>
		<div class="row offset-1 mt-3">
			<!-- Modal to show contact information -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showModal">
		   	Contact us now!
			</button>
		    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
		      <div class="modal-dialog" role="document">
		        <div class="modal-content">
		          <div class="modal-header">
		            <h5 class="modal-title" id="showModalLabel">UTC Egypt</h5>
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
		          </div>
		          <div class="modal-body">
		            <div class="row offset-1">
						<div class="col-2"> Telephone: </div>
						<div class="col-2"> {{$item->contact_telephone}} </div>
					</div>
					<div class="row offset-1">
						<div class="col-2"> Email: </div>
						<div class="col-2"> {{$item->contact_email}} </div>
					</div>
		          </div>
		          <div class="modal-footer">
		            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		          </div>
		        </div>
		      </div>
		    </div>
		    <!-- Modal End-->
		</div>
	</div>
	<div class="col-6">
		<img src="{{$item->fileName}}" class="card-img-top" alt="" style="width: 30rem;height:25rem;" >    
	</div>
</div>
<!-- <div class="fb-comments" data-href="{{config('app.url')}}/items/{{$item->id}}" data-width="800" data-numposts="10"></div> -->
@endsection