@extends('layouts.app')

@section('content')

<div class='d-flex flex-wrap align-content-start bg-light'>

@foreach($products as $product)

<div class="p-2 border col-4 g-3">
    <div class="card text-center">

        <div class="card-header">
            <h5>{{ $product->name }} {{ $product->description }}</h5>
        </div>

        <div class="card-body">
            <img style="width:65%;height:200px;"
                 src="{{ asset('/img/' . $product->image) }}"/>
        </div>

        <div class="card-footer">
            <button class="btn btn-success">Add To Cart</button>
        </div>

    </div>
</div>

@endforeach

</div>

@endsection