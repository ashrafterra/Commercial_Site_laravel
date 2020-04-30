@extends('layouts.app')

@section('content')
	@if (isset($items))
		<div class="row offset-1">
			<div class="col-1">
				Total cost =
			</div>
			<div class="col-1">
				{{$cost}} L.E
			</div>
			<a href="/cart/buy" class="btn btn-primary">
				<div class="col-1">
					Buy
				</div>
			</a>
		</div>
		<div class="row offset-1 mt-4">
        @foreach ($items as $item)
            <div class="card" style="width: 12rem;">
                <img src="{{url($item->fileName)}}" class="card-img-top" alt="..." style="width: 10rem;height:  6rem;" >
                <div class="card-body">
                    <h5 class="card-title">{{$item->brand}}</h5>
                    <p class="card-text">{{$item->price}} L.E</p>
            	</div>
					<form method="POST" action="/cart/{{$item->id}}">
                        @csrf
                        @method('delete')
                        <input type="text" name="id" value="{{$item->id}}" hidden="">
                        <button type="submit" name="submit" class="btn btn-primary">Remove</button>
                    </form>
            </div>
        @endforeach
        </div>
        @else
        	<div class="col-11  mt-2 text-center" style="font-weight: bolder;">
       			There are no items to Display
    		</div>
    	
        @endif

@endsection