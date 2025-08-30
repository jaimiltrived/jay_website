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
                <h4 class="mb-0">Add New Blog</h4>
            </div>
            <div class="card-body bg-light">
                <form action="{{ route('add_new_blog') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">

                        <div class="col-md-12">
                            <label for="Blogslug" class="form-label fw-bold">Blog Slug</label>
                            <input type="text" class="form-control" id="Blogslug" name="slug"
                                placeholder="Enter blog slug">
                            @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>


                        <div class="col-md-12">
                            <label for="personCapacity" class="form-label fw-bold">Blog Name</label>
                            <input type="text" class="form-control" id="personCapacity" name="name"
                                placeholder="Enter blog name">
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>




                        <div class="col-md-12">
                            <label for="roomPrice" class="form-label fw-bold">Published At</label>
                            <input type="date" class="form-control" id="roomPrice" name="published"
                              
                                placeholder="Enter published date">
                            @error('published') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>


                        <div class="col-12">
                            <label for="roomImage" class="form-label fw-bold">Blog Image</label>
                            <input type="file" class="form-control" id="roomImage" name="image">
                            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>


                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-success px-4">Add Blog</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>


@endsection