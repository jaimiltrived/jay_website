@extends('adm_masterview')
@section('sidebar')
    <style>
        body {
            background-color: #e8ecfa;
            /* matches your panel */
        }

        .card {
            border: none;
        }

        .form-label {
            color: #000;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }
    </style>
    <div class="container" style="padding-top: 7%;">
        <div class="card shadow" style="border-radius: 12px;">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">Edit Home Section</h4>
            </div>
            <div class="card-body bg-light">
                <form action="{{ route('edit_home_content',  $content->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">

                        <!-- Section Title -->
                        <div class="col-md-12">
                            <label for="sectionTitle" class="form-label fw-bold">Section Title</label>
                            <input type="text" class="form-control" id="sectionTitle" name="section_title"
                                value="{{ $content->section_title }}" placeholder="Enter section title">
                            @error('section_title') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Hotel Name -->
                        <div class="col-md-12">
                            <label for="hotelName" class="form-label fw-bold">Hotel Name</label>
                            <input type="text" class="form-control" id="hotelName" name="hotel_name"
                                value="{{ $content->hotel_name }}" placeholder="Enter hotel name">
                            @error('hotel_name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Description -->
                        <div class="col-12">
                            <label for="description" class="form-label fw-bold">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"
                                placeholder="Enter description">{{ $content->description }}</textarea>
                            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Main Image -->
                        <div class="col-12">
                            <label for="mainImage" class="form-label fw-bold">Main Image</label>
                            <input type="file" class="form-control" id="mainImage" name="main_image">
                            @error('main_image') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Side Image -->
                        <div class="col-12">
                            <label for="sideImage" class="form-label fw-bold">Side Image</label>
                            <input type="file" class="form-control" id="sideImage" name="side_image">
                            @error('side_image') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-success px-4">Edit Section</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection