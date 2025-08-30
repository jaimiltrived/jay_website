@extends('adm_masterview')
@section('sidebar')

<div class="container" style="padding-top: 7%;">
    <div class="card shadow" style="border-radius: 12px;">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Add New Image </h4>
        </div>
        <div class="card-body bg-light">
            <form action="{{ route('add_new_background_image') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Description</label>
                    <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Background Image</label>
                    <input type="file" class="form-control" name="background_image">
                    @error('background_image') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-success px-4">Add Service</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
