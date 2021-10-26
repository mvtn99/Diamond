@extends('layouts.app')
@section('content')
<x-breadcrumbs>
    <li>
        <a href="{{ route('products.show', ['product' => $product]) }}">Product Details</a>
    </li>
</x-breadcrumbs>
<section class="shop single section">
    <div class="container">
        <div class="row"> 
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <!-- Product Slider -->
                        <div class="product-gallery">
                            <!-- Images slider -->
                            <div class="flexslider-thumbnails">
                                <ul class="slides">
                                    <li data-thumb="{{ asset('images/image1.jpg') }}" rel="adjustX:10, adjustY:">
                                        <img src="{{ asset('images/image1.jpg') }}" alt="#">
                                    </li>
                                    <li data-thumb="{{ asset('images/image4.jpg') }}">
                                        <img src="{{ asset('images/image4.jpg') }}" alt="#">
                                    </li>
                                    <li data-thumb="{{ asset('images/image1.jpg') }}">
                                        <img src="{{ asset('images/image1.jpg') }}" alt="#">
                                    </li>
                                    <li data-thumb="{{ asset('images/image1.jpg') }}">
                                        <img src="{{ asset('images/image1.jpg') }}" alt="#">
                                    </li>
                                </ul>
                            </div>
                            <!-- End Images slider -->
                        </div>
                        <!-- End Product slider -->
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="product-des">
                            <!-- Description -->
                            <div class="short">
                                <h4>{{ $product->name }}</h4>
                                <div class="rating-main">
                                    <ul class="rating">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                        <li class="dark"><i class="fa fa-star-o"></i></li>
                                    </ul>
                                    <div class="total-review">({{ $comments->count() }}) Reviews</div> 
                                    @if ($product->stock > 5)
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-check-circle-o" style="color: green;"></i> in stock</span>
                                        </div>
                                    @elseif ($product->stock > 0)
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-exclamation-circle" aria-hidden="true" style="color: rgb(220, 187, 0);"></i> low stock</span>
                                        </div>
                                    @else
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-times" aria-hidden="true" style="color: red;"></i> not in stock</span>
                                        </div>
                                    @endif
            
                                    
                                </div>
                                <p class="price"><span class="discount">${{ $product->price }}</span><s>${{ priceFormat($product->price + 10) }}</s> </p>
                                <p class="description">eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in</p>
                            </div>
                            <!--/ End Description -->
                            <!-- Color -->
                            <div class="color">
                                <h4>Available Options <span>Color</span></h4>
                                <ul>
                                    <li><a disabled href="#" class="one"><i class="ti-check"></i></a></li>
                                    <li><a href="#" class="two"><i class="ti-check"></i></a></li>
                                    <li><a href="#" class="three"><i class="ti-check"></i></a></li>
                                    <li><a href="#" class="four"><i class="ti-check"></i></a></li>
                                </ul>
                            </div>
                            <!--/ End Color -->
                            <!-- Size -->
                            <div class="size">
                                <h4>Size</h4>
                                <ul>
                                    <li><a disabled href="#" class="one">S</a></li>
                                    <li><a href="#" class="two">M</a></li>
                                    <li><a href="#" class="three">L</a></li>
                                    <li><a href="#" class="four">XL</a></li>
                                    <li><a href="#" class="four">XXL</a></li>
                                </ul>
                            </div>
                            <!--/ End Size -->
                            <!-- Product Buy -->
                            <div class="product-buy">
                                <form id="add-cart" action="{{ route('cart.store', ['product' => $product]) }}" method="post">
                                    @csrf
                                    <div class="quantity">
                                        <h6>Quantity :</h6>
                                        <!-- Input Order -->
                                        <div class="input-group">
                                            <div class="button minus">
                                                <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quantity">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" name="quantity" class="input-number" data-min="1" data-max="1000" value="1">
                                            <div class="button plus">
                                                <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quantity">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!--/ End Input Order -->
                                    </div>
                                </form>
                                <div class="add-to-cart mt-3">
                                    @if ($product->stock > 0)
                                    <a class="btn" onclick="document.getElementById('add-cart').submit();" type="submit">Add to cart</a>
                                    @endif
                                    <a href="#" class="btn min"><i class="ti-heart"></i></a>
                                </div>
                                <p class="cat">Category :<a href="{{ route('products.index', ['category' => $category->name]) }}">{{ ucfirst($category->name) }}</a></p>
                            </div>
                            <!--/ End Product Buy -->
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="product-info">
                            <div class="nav-main">
                                <!-- Tab Nav -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description" role="tab" aria-selected="true">Description</a></li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#reviews" role="tab" aria-selected="false">Reviews</a></li>
                                </ul>
                                <!--/ End Tab Nav -->
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <!-- Description Tab -->
                                <div class="tab-pane fade active show" id="description" role="tabpanel">
                                    <div class="tab-single">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="single-des">
                                                    {{ $product->description }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Description Tab -->
                                <!-- Reviews Tab -->
                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <div class="tab-single review-panel">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="ratting-main">
                                                    <div class="avg-ratting">
                                                        <h4>4.5 <span>(Overall)</span></h4>
                                                        <span>Based on {{ $comments->count() }} Comments</span>
                                                    </div>
                                                    @foreach ($comments as $comment)
                                                        <!-- Single Rating -->
                                                        <div class="single-rating">
                                                            <div class="rating-author">
                                                                <img src="images/comments1.jpg" alt="#">
                                                            </div>
                                                            <div class="rating-des">
                                                                <h6>{{ $comment->name }}</h6>
                                                                <div class="ratings">
                                                                    <ul class="rating">
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star-half-o"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                    </ul>
                                                                    <div class="rate-count">(<span>3.5</span>)</div>
                                                                </div>
                                                                <p>{{ $comment->body }}</p>
                                                            </div>
                                                        </div>
                                                        <!--/ End Single Rating -->
                                                    @endforeach
                                                </div>
                                                <!-- Review -->
                                                <div class="comment-review">
                                                    <div class="add-review">
                                                        <h5>Add A Review</h5>
                                                        <p>Your email address will not be published. Required fields are marked</p>
                                                    </div>
                                                    <h4>Your Rating</h4>
                                                    <div class="review-inner">
                                                        <div class="ratings">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star-o rating_star"></i></li>
                                                                <li><i class="fa fa-star-o rating_star"></i></li>
                                                                <li><i class="fa fa-star-o rating_star"></i></li>
                                                                <li><i class="fa fa-star-o rating_star"></i></li>
                                                                <li><i class="fa fa-star-o rating_star"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/ End Review -->
                                                <!-- Form -->
                                                <form class="form" method="post" action="mail/mail.php">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label>Your Name<span>*</span></label>
                                                                <input type="text" name="name" required="required" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label>Your Email<span>*</span></label>
                                                                <input type="email" name="email" required="required" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                            <div class="form-group">
                                                                <label>Write a review<span>*</span></label>
                                                                <textarea name="message" rows="6" placeholder=""></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                            <div class="form-group button5">	
                                                                <button type="submit" class="btn">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!--/ End Form -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Reviews Tab -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('partials.relatedProducts')
@endsection
@section('extra-js')
    <script>
        const ratingStars = [...document.getElementsByClassName("rating_star")];

        function executeRating(stars) {
            const starClassActive = "rating_star fa fa-star";
            const starClassInactive = "rating_star fa fa-star-o";
            const starsLength = stars.length;
            let i;
            stars.map((star) => {
                star.onclick = () => {

                    i = stars.indexOf(star);

                    if (star.className===starClassInactive) {
                        for (i; i >= 0; --i) stars[i].className = starClassActive;
                    } else {
                        for (++i; i < starsLength; ++i) stars[i].className = starClassInactive;
                    }
                };
            });
        }
        executeRating(ratingStars);
    </script>
@endsection