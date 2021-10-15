@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        @foreach ($products as $product)
        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
            <div class="single-product">
                <div class="product-img">
                    <a href="{{ Route('products.show', ['product' => $product]) }}">
                        <img class="default-img img-fluid" src="https://via.placeholder.com/550x750" alt="#">
                        <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                    </a>
                    <div class="button-head">
                        <div class="product-action">
                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                        </div>
                        <div class="product-action-2">
                            <a title="Add to cart" href="#">Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="product-content">
                    <h3><a href="{{ Route('products.show', ['product' => $product]) }}">{{ $product->name }}</a></h3>
                    <div class="product-price">
                        <span class="old">${{ $product->price + 8 }}</span>
                        <span>${{ $product->price }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mx-auto my-5" style="width: fit-content">
        {{ $products->links() }}
    </div>
</div>
@endsection