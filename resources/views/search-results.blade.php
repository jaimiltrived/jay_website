
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Optional CSS -->
</head>
<body>

<div class="container">
    <h1>Search Results</h1>

    <!-- Check if there are any products matching the search query -->
    @if($products->isEmpty())
        <p>No products found for your query.</p>
    @else
        <!-- bedroom-all-product-area-start -->
        <div class="bedroom-all-product-area ptb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-9 col-sm-9 col-xs-12">
                        <div class="caregory-products-area">
                            <div class="tab-content">
                                <div class="tab-pane active" id="viewed">
                                    <div class="row">
                                        <!-- Loop through each product in search results -->
                                        @foreach($products as $product)
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                            <div class="single-new-product mt-40 category-new-product">
                                                <div class="product-img">
                                                    <a href="{{ route('product_details', $product->id) }}">
                                                        <img src="{{ URL::to('/') }}/img/product/{{ $product->product_image }}"
                                                             class="first_img" alt="{{ $product->product_name }}" />
                                                    </a>
                                                    <div class="new-product-action">
                                                        <a href="{{ route('product_details', $product->id) }}">
                                                            <span class="lnr lnr-cart cart_pad"></span>Add to Cart
                                                        </a>
                                                        <a href="#">
                                                            <span class="lnr lnr-heart"></span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-content text-center">
                                                    <a href="{{ route('product_details', $product->id) }}">
                                                        <h3>{{ $product->product_name }}</h3>
                                                    </a>
                                                    <div class="product-price-star">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="price">
                                                        <h4>Rs{{ $product->new_price }}.00</h4> 
                                                    </div>
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
            </div>
        </div>
        <!-- bedroom-all-product-area-end -->
    @endif
</div>

</body>
</html>
