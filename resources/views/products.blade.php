@extends('layouts.app')
@section('content')
<x-breadcrumbs>
    <li>
        <a href="{{ route('products.index') }}">{{ __('Shop') }}</a>
    </li>
</x-breadcrumbs>
<section class="product-area shop-sidebar shop section">
    <div class="container">
        <div class="row">
            @include('partials.sidebar')
            <div class="col-lg-9 col-md-8 col-12">
                <div class="row">
                    <div class="col-12">
                        <!-- Shop Top -->
                        <div class="shop-top">
                                <div>
                                    <h2 class="stylish-heading">{{ ucfirst($categoryName) }}</h2>
                                </div>
                                <div class="shop-shorter">
                                    <div class="single-shorter">
                                        <label>Show:</label>
                                        <select style="display: none;">
                                            <option selected="selected"> </option>
                                            <option>High to Low</option>
                                            <option>Low to High</option>
                                        </select>
                                        <div class="nice-select" tabindex="0">
                                            <span class="current">Select</span>
                                            <ul class="list">
                                                <li data-value="Name" class="option selected">Newest</li>
                                                <a href="{{ route('products.index', ['category'=> request()->category, 'sort' => 'high_price']) }}"><li data-value="Price" class="option">High Price</li></a>
                                                <li data-value="Size" class="option">Low Price</li>
                                                <li data-value="Size" class="option">Bestsellers</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!--/ End Shop Top -->
                    </div>
                </div>
                <div class="row">
                    @forelse ($products as $product)
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="{{ route('products.show', ['product' => $product]) }}">
                                        <img class="default-img" src="https://via.placeholder.com/500x700" alt="#">
                                        <img class="hover-img" src="https://via.placeholder.com/500x700" alt="#">
                                    </a>
                                    <div class="button-head">
                                        <div class="product-action">
                                            <a data-toggle="modal" data-target="#quick-shop-modal" title="Quick View" href="#"><i class=" ti-eye show-modal" data-id="{{ $product->id }}"></i><span>Quick Shop</span></a>
                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                            <div></div>
                                        </div>
                                        <div class="product-action-2">
                                            <form id="add{{$product->id}}" action="{{ route('cart.store', ['product' => $product]) }}" method="POST">
                                                @csrf
                                                <a title="Add to cart" onclick="document.getElementById('add{{$product->id}}').submit();" type="submit">Add to cart</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="{{ route('products.show', ['product' => $product]) }}">{{ $product->name }}</a></h3>
                                    <div class="product-price">
                                        <span>${{ $product->price }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div style="text-align: left">No items found</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

<div class="mx-auto my-5" style="width: fit-content">
    {{ $products->appends(request()->input())->links() }}
</div>
<div class="test">

</div>

@include('partials.newsletter')
<!-- Modal -->
@include('partials.modal')
<!-- Modal end -->

@endsection
@section('extra-js')
    <script>
        (function(){
			const showModal = document.querySelectorAll('.show-modal')
            const modalForm = document.getElementById('modal-form')
            const modalName = document.getElementById('modal-name')
            const modalPrice = document.getElementById('modal-price')
            const modalDescp = document.getElementById('modal-descp')
            let route = '{{ route('cart.store', ['product' => ':id']) }}'


			Array.from(showModal).forEach(function(element) {
				element.addEventListener('click', function() {
					const id = element.getAttribute('data-id')

					axios.get(`/modal/${id}`, {
						
					})
					.then(function (response) {
						console.log(response.data.product);
                        route = route.replace(':id', response.data.product.id)
                        modalForm.action = route
                        modalName.innerHTML = response.data.product.name
                        modalPrice.innerHTML = '$' + response.data.product.price
                        modalDescp.innerHTML = response.data.product.description.substr(0, 120)

						// window.location.href = '{{ route('cart.index') }}'
					})
					.catch(function (error) {
						// console.log(error);
						window.location.href = '{{ route('cart.index') }}'
					});
				})
			})

		})();
    </script>
@endsection