@extends('layouts.app')

@section('content')
<!-- Slider Area -->
<section class="hero-slider">
    <!-- Single Slider -->
    <div class="single-slider">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-9 offset-lg-3 col-12">
                    <div class="text-inner">
                        <div class="row">
                            <div class="col-lg-7 col-12">
                                <div class="hero-text">
                                    <h1><span>UP TO 50% OFF </span>Shirt For Man</h1>
                                    <p>Maboriosam in a nesciung eget magnae <br> dapibus disting tloctio in the find it pereri <br> odiy maboriosm.</p>
                                    <div class="button">
                                        <a href="#" class="btn">Shop Now!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Single Slider -->
</section>
<!--/ End Slider Area -->
<section class="small-banner section">
    <div class="container-fluid">
        <div class="row">
            <!-- Single Banner  -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-banner">
                    <img src="https://via.placeholder.com/305x188" alt="#">
                    <div class="content">
                        <p>Man's Collectons</p>
                        <h3>Summer travel <br> collection</h3>
                        <a href="#">Discover Now</a>
                    </div>
                </div>
            </div>
            <!-- /End Single Banner  -->
            <!-- Single Banner  -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-banner">
                    <img src="https://via.placeholder.com/305x188" alt="#">
                    <div class="content">
                        <p>Bag Collectons</p>
                        <h3>Awesome Bag <br> 2020</h3>
                        <a href="#">Shop Now</a>
                    </div>
                </div>
            </div>
            <!-- /End Single Banner  -->
            <!-- Single Banner  -->
            <div class="col-lg-4 col-12">
                <div class="single-banner tab-height">
                    <img src="https://via.placeholder.com/305x188" alt="#">
                    <div class="content">
                        <p>Flash Sale</p>
                        <h3>Mid Season <br> Up to <span>40%</span> Off</h3>
                        <a href="#">Discover Now</a>
                    </div>
                </div>
            </div>
            <!-- /End Single Banner  -->
        </div>
    </div>
</section>
<div class="product-area section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Trending Item</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-info">
                    <div class="nav-main">
                        <!-- Tab Nav -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#man" role="tab">Man</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#woman" role="tab">Woman</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#kids" role="tab">Kids</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#accessories" role="tab">Accessories</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#perfume" role="tab">Perfume</a></li>
                        </ul>
                        <!--/ End Tab Nav -->
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <!-- Start Single Tab -->
                        @foreach ($products as $key => $group)
                         <div class="tab-pane fade show active" id="{{ $key }}" role="tabpanel">
                            <div class="tab-single">
                                <div class="row">
                                    @foreach ($group as $product)
                                    <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <a href="{{ Route('products.show', ['product' => $product]) }}">
                                                    <img class="default-img img-fluid" src="https://via.placeholder.com/550x750" alt="#">
                                                    <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                                </a>
                                                <div class="button-head">
                                                    <div class="product-action">
                                                        <a data-toggle="modal" data-target="#quick-shop-modal" title="Quick View" href="#"><i class=" ti-eye show-modal" data-id="{{ $product->id }}"></i><span>Quick Shop</span></a>
                                                        <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
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
                            </div>
                        </div>   
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="midium-banner mb-5">
    <div class="container">
        <div class="row">
            <!-- Single Banner  -->
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-banner">
                    <img src="https://via.placeholder.com/600x370" alt="#">
                    <div class="content">
                        <p>Man's Collectons</p>
                        <h3>Man's items <br>Up to<span> 50%</span></h3>
                        <a href="#">Shop Now</a>
                    </div>
                </div>
            </div>
            <!-- /End Single Banner  -->
            <!-- Single Banner  -->
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-banner">
                    <img src="https://via.placeholder.com/600x370" alt="#">
                    <div class="content">
                        <p>shoes women</p>
                        <h3>mid season <br> up to <span>70%</span></h3>
                        <a href="#" class="btn">Shop Now</a>
                    </div>
                </div>
            </div>
            <!-- /End Single Banner  -->
        </div>
    </div>
</section>
<br>
<section class="shop-home-list section mt-4">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <div class="section-title">
                    <h2>Hot Item</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="shop-section-title">
                            <h1>On sale</h1>
                        </div>
                    </div>
                </div>
                <!-- Start Single List  -->
                <div class="single-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="list-image overlay">
                                <img src="https://via.placeholder.com/130x150" alt="#">
                                <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h4 class="title"><a href="#">Licity jelly leg flat Sandals</a></h4>
                                <p class="price with-discount">$59</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single List  -->
                <!-- Start Single List  -->
                <div class="single-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="list-image overlay">
                                <img src="https://via.placeholder.com/130x150" alt="#">
                                <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                <p class="price with-discount">$44</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single List  -->
                <!-- Start Single List  -->
                <div class="single-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="list-image overlay">
                                <img src="https://via.placeholder.com/130x150" alt="#">
                                <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                <p class="price with-discount">$89</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single List  -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="shop-section-title">
                            <h1>Best Seller</h1>
                        </div>
                    </div>
                </div>
                <!-- Start Single List  -->
                <div class="single-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="list-image overlay">
                                <img src="https://via.placeholder.com/130x150" alt="#">
                                <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                <p class="price with-discount">$65</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single List  -->
                <!-- Start Single List  -->
                <div class="single-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="list-image overlay">
                                <img src="https://via.placeholder.com/130x150" alt="#">
                                <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                <p class="price with-discount">$33</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single List  -->
                <!-- Start Single List  -->
                <div class="single-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="list-image overlay">
                                <img src="https://via.placeholder.com/130x150" alt="#">
                                <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                <p class="price with-discount">$77</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single List  -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="shop-section-title">
                            <h1>Top viewed</h1>
                        </div>
                    </div>
                </div>
                <!-- Start Single List  -->
                <div class="single-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="list-image overlay">
                                <img src="https://via.placeholder.com/130x150" alt="#">
                                <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                <p class="price with-discount">$22</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single List  -->
                <!-- Start Single List  -->
                <div class="single-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="list-image overlay">
                                <img src="https://via.placeholder.com/130x150" alt="#">
                                <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                <p class="price with-discount">$35</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single List  -->
                <!-- Start Single List  -->
                <div class="single-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="list-image overlay">
                                <img src="https://via.placeholder.com/130x150" alt="#">
                                <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                <p class="price with-discount">$99</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single List  -->
            </div>
        </div>
    </div>
</section>
<section class="cown-down">
    <div class="section-inner ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-12 padding-right">
                    <div class="image">
                        <img src="https://via.placeholder.com/750x593" alt="#">
                    </div>	
                </div>	
                <div class="col-lg-6 col-12 padding-left">
                    <div class="content">
                        <div class="heading-block">
                            <p class="small-title">Deal of day</p>
                            <h3 class="title">Beatutyful dress for women</h3>
                            <p class="text">Suspendisse massa leo, vestibulum cursus nulla sit amet, frungilla placerat lorem. Cars fermentum, sapien. </p>
                            <h1 class="price">$1200 <s>$1890</s></h1>
                            <div class="coming-time">
                                <div class="clearfix" data-countdown="2023/02/30"><div class="cdown"><span class="days"><strong>501</strong><p>Days.</p></span></div><div class="cdown"><span class="hour"><strong> 1</strong><p>Hours.</p></span></div> <div class="cdown"><span class="minutes"><strong>55</strong> <p>MINUTES.</p></span></div><div class="cdown"><span class="second"><strong> 38</strong><p>SECONDS.</p></span></div></div>
                            </div>
                        </div>
                    </div>	
                </div>	
            </div>
        </div>
    </div>
</section>
	<!-- Start Shop Blog  -->
	<section class="shop-blog section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>From Our Blog</h2>
					</div>
				</div>
			</div>
			<div class="row">
                @foreach ($posts as $post)
                    
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Blog  -->
					<div class="shop-single-blog">
						<img src="https://via.placeholder.com/370x300" alt="#">
						<div class="content">
							<p class="date">{{ date('d F, Y', strtotime($post['created_at'])) }}</p>
							<a href="#" class="title">{{ $post->title }}</a>
							<a href="{{ Route('posts.show', ['post' => $post]) }}" class="more-btn">Continue Reading</a>
						</div>
					</div>
					<!-- End Single Blog  -->
				</div>
                @endforeach
			</div>
		</div>
	</section>
	<!-- End Shop Blog  -->
	
	<!-- Start Shop Services Area -->
	<section class="shop-services section home">
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
						<h4>Best Price</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Services Area -->
	
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
