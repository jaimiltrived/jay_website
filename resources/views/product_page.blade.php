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
</head>
<body>
    <div class="page-title-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-title text-center">
                        <h3>Shop</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-title-wrapper-end -->

    <!-- Filter Area Start -->
    <div class="filter-area pt-40 pb-40">
        <div class="container">
            <form action="{{ route('shop') }}" method="GET">
                <div class="row">
                   
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <label for="category">Category:</label>
                        <select name="category" id="category" class="form-control">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                  
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <label for="price_min">Price Range:</label>
                        <div class="input-group">
                            <input type="number" name="price_min" id="price_min" placeholder="Min" class="form-control" value="{{ request('price_min') }}">
                            <span class="input-group-addon">to</span>
                            <input type="number" name="price_max" id="price_max" placeholder="Max" class="form-control" value="{{ request('price_max') }}">
                        </div>
                    </div>

                    
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <button type="submit" class="btn btn-primary mt-25">Apply Filters</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Filter Area End -->
