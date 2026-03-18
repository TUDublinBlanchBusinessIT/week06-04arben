@extends('layouts.app')

@section('content')
<div style="padding-top:1%">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <ul class="navbar-nav ms-auto">

            <li class="nav-item">
                <button id="checkOut" type="button"
                    class="btn btn-primary" style="margin-right:5px;">
                    Check Out
                </button>
            </li>

            <li class="nav-item">
                <button id="emptycart" type="button"
                    class="btn btn-primary" style="margin-right:5px;">
                    Empty Cart
                </button>
            </li>

            <li class="nav-item">
                <span style="font-size:30px;"
                    class="glyphicon glyphicon-shopping-cart"></span>
            </li>

            <li class="nav-item">
                <div id="shoppingcart"
                    style="color:white; margin-left:5px;">
                    0
                </div>
            </li>

        </ul>
    </nav>
</div>

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
            <button class="btn btn-success addItem"
                    value="{{$product->id}}">
                Add To Cart
            </button>
        </div>

    </div>
</div>

@endforeach

</div>
<script>
$(".addItem").click(function() {

    var id = $(this).val();

    $.ajax({
        type: "GET",
        url: "/product/additem/" + id,

        success: function(response) {
            $('#shoppingcart').text(response.total);
        },

        error: function() {
            alert("Error adding item");
        }
    });
});
</script>





@endsection