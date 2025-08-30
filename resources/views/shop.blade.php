@extends('master')
@section('nav')
    <!doctype html>
    <html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Shop</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                overflow-x: hidden;
                background-color: #f0ece4;
                color: #a37645;
            }

            .rooms-section {
                padding-top: 0;
                padding-bottom: 80px;
            }

            .room-item {
                margin-bottom: 30px;
            }

            .room-item img {
                min-width: 100%;
            }

            .room-item .ri-text {
                border: 1px solid #ebebeb;
                border-top: none;
                padding: 24px 24px 30px 28px;
            }

            .room-item .ri-text h4 {
                color: #19191a;
                margin-bottom: 17px;
            }

            .room-item .ri-text h3 {
                color: #dfa974;
                font-weight: 700;
                margin-bottom: 14px;
            }

            .room-item .ri-text h3 span {
                font-family: "Cabin", sans-serif;
                font-size: 14px;
                font-weight: 400;
                color: #19191a;
            }

            .room-item .ri-text table {
                margin-bottom: 18px;
            }

            .room-item .ri-text table tbody tr td {
                font-size: 16px;
                color: #707079;
                line-height: 36px;
            }

            .room-item .ri-text table tbody tr td.r-o {
                width: 125px;
            }

            .room-item .ri-text .primary-btn {
                color: #19191a;
            }

            @media(max-width: 992px) {
                body {
                    margin-top: 10%;
                }
            }
        </style>
    </head>

    <body>
        <!-- Filter Area Start -->
        <div class="filter-area pt-40 pb-40">
            <div class="container">
                <form action="{{ route('shop') }}" method="GET">
                    <div class="row">
                        <!-- Type Filter -->
                        <div class="col-lg-3 col-md-4">
                            <label for="type">Type:</label>
                            <select name="type" id="type" class="form-control">
                                <option value="">All Types</option>
                                @foreach($types as $type)
                                    <option value="{{ $type->type }}" {{ request('type') == $type->type ? 'selected' : '' }}>
                                        {{ ucfirst($type->type) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-lg-2 col-md-2">
                            <label for="min_price">Min Price:</label>
                            <input type="number" name="min_price" class="form-control" value="{{ request('min_price') }}"
                                placeholder="0">
                        </div>


                        <div class="col-lg-2 col-md-2">
                            <label for="max_price">Max Price:</label>
                            <input type="number" min="0" name="max_price" class="form-control" value="{{ request('max_price') }}"
                                placeholder="10000">
                        </div>


                        <div class="col-lg-3 col-md-4 align-self-end">
                            <button type="submit" class="btn btn-primary mt-2">Apply Filters</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <!-- Filter Area End -->

        <!-- Products Area Start -->

        <section class="rooms-section spad">
            <div class="container">
                <div class="row">
                    @forelse($products as $product)
                        <div class="col-lg-4 col-md-6">
                            <div class="room-item">
                                <a href="{{ route('product_details', $product->id) }}">
                                    <img src="{{ URL::to('/') }}/img/room/{{ $product->product_image }}" class="card-img-top"
                                        style="height:317px; width:416px;" alt="{{ $product->product_name }}" />
                                </a>
                                <div class="ri-text">
                                    <h4>{{ $product->product_name }}</h4>
                                    <h3>Rs {{ $product->new_price }}<span>/Pernight</span></h3>
                                    <table class="table-bordred">
                                        <tbody>
                                            <tr>
                                                <td class="r-o">Capacity:</td>
                                                <td>Max person {{ $product->capacity }}</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Type:</td>
                                                <td style="text-transform:capitalize;">{{ $product->type }}</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Occupancy:</td>
                                                <td style="text-transform:capitalize;">{{ $product->occupancy_status }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="{{ route('product_details', $product->id) }}" class="primary-btn">More Details</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No products found.</p>
                    @endforelse
                </div>
            </div>
            
        </section>


    </body>

    </html>
@endsection