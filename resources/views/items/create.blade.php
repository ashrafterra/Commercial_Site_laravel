@extends('layouts.app')
@section('content')
	<div class="row offset-1">
		<div class="form-group border col-6 offset-1 ">

			<nav class="navbar navbar-dark  mb-1 " style="background-color: #e3f2fd;">
				<div class="col text-center">
					<span class="navbar-brand mb-0 h1" style="color: orange;">
					Register New Product </span>	
				</div>
			</nav>
			<form method="post" action="/items" enctype="multipart/form-data" >
				@csrf
				<!-- Item Name and price  -->
				<div class="form-row">
					<div class="form-group col-6">
						<label for="name">Item Name: </label>
						<input 
		                    type="text" 
		                    id="name" 
		                    name="name"
		                    placeholder="Item Name" 
		                    value="{{old('name')}}"
		                    class="form-control {{isset($errors->getMessages()['name']) ? 'is-invalid' : ''}}"
		                    required/>
						@isset ($errors->getMessages()['name'])
							<div class="invalid-feedback">
		                        {{$errors->getMessages()['name'][0]}}
							</div>
						@endisset
					</div>
					<div class="form-group col-6">
						<label for="display_name">Price: </label>
						<input 
		                    type="text" 
		                    id="price" 
		                    name="price"
		                    placeholder="Item Price"
		                    value="{{old('price')}}"
		                    class="form-control {{isset($errors->getMessages()['price']) ? 'is-invalid' : ''}}"
		                    required/>
						@isset ($errors->getMessages()['price'])
							<div class="invalid-feedback">
		                        {{$errors->getMessages()['price'][0]}}
							</div>
						@endisset
					</div>
				</div>
				<!-- End of Item Name and Price -->
				<!-- Category and Brand  -->
				<div class="form-row">
					<div class="form-group col-6">
						<label for="brand_id">brand: </label>
						<select
							type="text" 
		                    id="brand_id" 
		                    name="brand_id"
		                    value="{{old('brand_id')}}">
		                    @foreach ($brands as $brand)
							<option id="{{$brand->id}}" value="{{$brand->id}}">{{$brand->brand}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-6">
						<label for="display_name">Category: </label>
						<select
							type="text" 
		                    id="category" 
		                    name="category"
		                    value="{{old('category')}}">
		                    @foreach ($categories as $category)
							<option id="$category->id">{{$category->category}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<!-- End of Category and Brand -->

		        <!-- Item Description -->
				<div class="form-row">
					<div class="form-group col-12">
						<label for="domain_url">description: </label>
						<textarea
								type="text"
								id="description"
								name="description"
								placeholder="description"
								value="{{old('description')}}"
								class="form-control {{isset($errors->getMessages()['description']) ? 'is-invalid' : ''}}"
								required></textarea>
						@isset ($errors->getMessages()['description'])
							<div class="invalid-feedback">
								{{$errors->getMessages()['description'][0]}}
							</div>
						@endisset
					</div>
				</div>
				<!-- End of Item Description-->
				<!-- Seller Telephone and Email  -->
				<div class="form-row">
					<div class="form-group col-6">
						<label for="contact_email">Seller Email: </label>
						<input
								type="text"
								id="contact_email"
								name="contact_email"
								placeholder="Seller Email"
								value="{{old('contact_email')}}"
								class="form-control {{isset($errors->getMessages()['contact_email']) ? 'is-invalid' : ''}}"
								required/>
						@isset ($errors->getMessages()['contact_email'])
							<div class="invalid-feedback">
								{{$errors->getMessages()['contact_email'][0]}}
							</div>
						@endisset
					</div>
					<div class="form-group col-6">
						<label for="contact_telephone">Seller Telephone: </label>
						<input
								type="text"
								id="contact_telephone"
								name="contact_telephone"
								placeholder="Seller Telephone"
								value="{{old('contact_telephone')}}"
								class="form-control {{isset($errors->getMessages()['contact_telephone']) ? 'is-invalid' : ''}}"
								required/>
						@isset ($errors->getMessages()['contact_telephone'])
							<div class="invalid-feedback">
								{{$errors->getMessages()['contact_telephone'][0]}}
							</div>
						@endisset
					</div>
	            </div>
				<!-- End of Seller Telephone and Email-->
				<!-- image upload section  -->
				<div class="form-row">
		            <div class="form-group">
		                <label for="image">image:</label>
						<small id="logoHelp" class="form-text text-muted">file Should be  jpg, jpeg, png,or gif, and  not exceeding 300*200 pixels</small>
		                <input 
			                type="file" 
			                class="form-control-file {{isset($errors->getMessages()['image']) ? 'is-invalid' : ''}}" 
			                id="image" 
			                name="image"  
			                required/>
		                 @isset ($errors->getMessages()['image'])
		                    <div class="invalid-feedback">
		                        {{$errors->getMessages()['image'][0]}}
		                    </div>
		                @endisset
		            </div>
		        </div>
				<!--  End of image upload section  -->
				<input type="submit" name="upload" value="upload" class="btn btn-primary"/>
			</form>
		</div>
	</div>
@endsection

