@extends('adm_masterview')
@section('sidebar')

<div class="container" style="padding-top: 7%;">
    <div class="card shadow" style="border-radius: 12px;">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Add New Service</h4>
        </div>
        <div class="card-body bg-light">
            <form action="{{ route('add_new_about_service') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold">Service Title</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Image</label>
                    <input type="file" class="form-control" name="image">
                    @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-success px-4">Add Service</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
