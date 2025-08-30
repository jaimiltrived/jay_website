@extends('adm_masterview')
@section('sidebar')
    <style>
        body {
            background-color: #e8ecfa;
        }

        .card {
            border: none;
        }

        .form-label {
            color: #000;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0069d9;
        }

        .service-item {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .remove-service {
            background: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .remove-service:hover {
            background: #b02a37;
        }
    </style>

    <div class="container" style="padding-top: 7%;">
        <div class="card shadow" style="border-radius: 12px;">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">Edit About Section</h4>
            </div>
            <div class="card-body bg-light">
                <form action="{{ route('edit_about_section', $section->id) }}" method="POST">
                    @csrf
                  
                    <div class="row g-3">
                        <!-- Title -->
                        <div class="col-md-12">
                            <label for="title" class="form-label fw-bold">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ old('title', $section->title) }}" placeholder="Enter title">
                            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Description -->
                        <div class="col-md-12">
                            <label for="description" class="form-label fw-bold">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"
                                placeholder="Enter description">{{ old('description', $section->description) }}</textarea>
                            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Service List -->
                        <div class="col-md-12">
                            <label class="form-label fw-bold">Services</label>
                            <div id="service-list-wrapper">
                                @foreach(old('service_list', $section->service_list ?? []) as $service)
                                    <div class="service-item">
                                        <input type="text" class="form-control mb-2" name="service_list[]"
                                            value="{{ $service }}">
                                      
                                    </div>
                                @endforeach
                            </div>
                          
                            @error('service_list') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Submit -->
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary px-4">Update Section</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
@endsection