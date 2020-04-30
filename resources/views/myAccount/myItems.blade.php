@extends('layouts.app')

@section('content')
    @if (sizeof($items)>0)
		<div class="row offset-1 mt-4">
            @foreach ($items as $item)
            <div class="card" style="width: 15rem;">
                <img src="{{url($item->fileName)}}" class="card-img-top" alt="..." style="height: 10rem;width: 10rem;" >
                <div class="card-body">
                    <h5 class="card-title" style=" color: blue;font-weight: bold ">{{$item->name}}</h5>
                    <div class="row">
                        <h6 class="card-text" style="font-weight: bold">
                            Brand: {{$item->brand->brand}}
                        </h6>
                    </div>
                    <div class="row">
                        <p class="card-text">
                            Price: {{$item->price}} L.E
                        </p>
                    </div>
					<form method="POST" action="/myAccount/{{$item->id}}">
                        @csrf
                        @method('delete')
                        <button type="submit" name="submit" class="btn btn-primary">Remove</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        @else
            <div class="col-11  mt-2 text-center" style="font-weight: bolder;">
       			There are no items to Display
    		</div>
    	
        @endif
@endsection