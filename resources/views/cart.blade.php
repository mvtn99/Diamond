@extends('layouts.app')
@section('content')
<x-breadcrumbs>
    <li>
        <a href="{{ route('cart.index', ['cart' => $cart]) }}">Cart</a>
    </li>
</x-breadcrumbs>
    <!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>PRODUCT</th>
								<th>NAME</th>
								<th class="text-center">UNIT PRICE</th>
								<th class="text-center">QUANTITY</th>
								<th class="text-center">TOTAL</th> 
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody>
							@if (Cart::count() == 0)
								<tr>
									<td>There is no item in your cart</td>
								</tr>
							@endif
							@foreach ($cart as $item)
							<tr>
								<td class="image" data-title="No"><img src="https://via.placeholder.com/100x100" alt="#"></td>
								<td class="product-des" data-title="Description">
									<p class="product-name"><a href="#">{{ $item->name }}</a></p>
										<p class="product-des">Maboriosam in a tonto nesciung eget  distingy magndapibus.</p>
								</td>
								<td class="price" data-title="Price"><span>${{ priceFormat($item->price) }}</span></td>
								<td class="qty" data-title="Qty"><!-- Input Order -->
									<div class="input-group">
										<div class="button minus">
											<button type="button" class="btn btn-primary btn-number" data-type="minus" data-field="quant[1]">
												<i data-id="{{ $item->rowId }}" data-productQuantity="{{ $item->model->stock }}" class="ti-minus update" data-update="decrement"></i>
											</button>
										</div>
										<input id="quantity" readonly type="text" name="quant[1]" class="input-number"  data-min="1" data-max="100" value="{{ $item->qty }}">
										<div class="button plus">
											<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
												<i data-id="{{ $item->rowId }}" data-productQuantity="{{ $item->model->stock }}" class="ti-plus update" data-update="increment"></i>
											</button>
										</div>
									</div>
									<!--/ End Input Order -->
								</td>
								<td class="total-amount" data-title="Total"><span>${{ priceFormat($item->price*$item->qty) }}</span></td>
								<td class="action" data-title="Remove">
									<a class="pointer" onclick="document.getElementById('remove{{$item->id}}').submit();"><i class="ti-trash remove-icon"></i></a>
									<form id="remove{{$item->id}}" method="POST" action="{{ route('cart.destroy', ['rowId' => $item->rowId]) }}">
										@csrf
										@method('DELETE')
									</form>
								</td>
							</tr>	
							@endforeach
						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-12">
								<div class="left">
									@if (! session()->has('coupon'))
										<div class="coupon">
											<form action="{{ route('coupon.store', ['cart' => $cart->all()]) }}" method="POST">
												@csrf
												<input name="coupon" placeholder="Enter Your Coupon">
												<button type="submit" class="btn">Apply</button>
											</form>
										</div>
									@else
										<div class="mb-3">
											Applied Coupon: {{ session()->get('coupon')['name'] }}
										</div>
										<form action="{{ route('coupon.destroy') }}" method="POST" style="display:block">
											{{ csrf_field() }}
											{{ method_field('delete') }}
											<button class="btn" type="submit" style="font-size:14px;">Remove</button>
										</form>
									@endif
								</div>
							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<ul>
										@if (session()->has('coupon'))
											<li>Discount<span>${{ priceFormat($numbers['discount']) }}</span></li>
										@endif
										<li>Cart Subtotal<span>${{ priceFormat($numbers['subtotal']) }}</span></li>
										<li>Tax(9%)<span>${{ priceFormat($numbers['tax']) }}</span></li>
										<li class="last">Total<span>${{ priceFormat($numbers['total']) }}</span></li>
									</ul>
									<div class="button5">
										@if (Cart::count() > 0)
											<a href="{{ route('checkout.index') }}" class="btn">Checkout</a>
										@endif
										<a href="{{ route('home') }}" class="btn">Continue shopping</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
		</div>
	</div>
	<!--/ End Shopping Cart -->
			
	<!-- Start Shop Services Area  -->
	<section class="shop-services section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Free shiping</h4>
						<p>Orders over $100</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Free Return</h4>
						<p>Within 30 days returns</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Sucure Payment</h4>
						<p>100% secure payment</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Peice</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Services area -->

    @include('partials.newsletter')

@endsection
@section('extra-js')
	<script>
		(function(){
			const update = document.querySelectorAll('.update')

			Array.from(update).forEach(function(element) {
				element.addEventListener('click', function() {
					const id = element.getAttribute('data-id')
					const productQuantity = element.getAttribute('data-productQuantity')

					axios.patch(`/cart/${id}`, {
						type: this.getAttribute('data-update'),
						productQuantity: productQuantity
					})
					.then(function (response) {
						// console.log(response);
						window.location.href = '{{ route('cart.index') }}'
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