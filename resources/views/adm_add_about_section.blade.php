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
            <h4 class="mb-0">Add About Section</h4>
        </div>
        <div class="card-body bg-light">
            <form action="{{ route('add_new_about_section') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <!-- Title -->
                    <div class="col-md-12">
                        <label for="title" class="form-label fw-bold">Title</label>
                        <input type="text" class="form-control" id="title" name="title" 
                               value="{{ old('title') }}" placeholder="Enter title">
                        @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Description -->
                    <div class="col-md-12">
                        <label for="description" class="form-label fw-bold">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"
                                  placeholder="Enter description">{{ old('description') }}</textarea>
                        @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Service List -->
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Services</label>
                        <div id="service-list-wrapper">
                            <input type="text" class="form-control mb-2" name="service_list[]" placeholder="Enter service">
                        </div>
                        <button type="button" id="add-service" class="btn btn-sm btn-secondary">+ Add More</button>
                        @error('service_list') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Submit -->
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-success px-4">Add Section</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('add-service').addEventListener('click', function() {
    let wrapper = document.getElementById('service-list-wrapper');
    let input = document.createElement('input');
    input.type = 'text';
    input.name = 'service_list[]';
    input.classList.add('form-control', 'mb-2');
    input.placeholder = 'Enter service';
    wrapper.appendChild(input);
});
</script>
@endsection
