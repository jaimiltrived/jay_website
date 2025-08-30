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
                <h4 class="mb-0">Add New Room</h4>
            </div>
            <div class="card-body bg-light">
                <form action="{{ route('rooms_store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <!-- Room Title -->
                        <div class="col-md-6">
                            <label for="roomTitle" class="form-label fw-bold">Room Title</label>
                            <input type="text" class="form-control" id="roomTitle" name="name" value="{{ old('name') }}"
                                placeholder="Enter room title">
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Person Capacity -->
                        <div class="col-md-6">
                            <label for="personCapacity" class="form-label fw-bold">Person Capacity</label>
                            <input type="number" class="form-control" id="personCapacity" name="capacity"
                                value="{{ old('capacity') }}" placeholder="Enter person capacity">
                            @error('capacity') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Room Type -->
                        <div class="col-md-6">
                            <label for="roomType" class="form-label fw-bold">Room Type</label>
                            <select class="form-select" id="roomType" name="type">
                                <option selected disabled>Select type</option>
                                <option value="single" {{ old('type') == 'Single' ? 'selected' : '' }}>Single</option>
                                <option value="double" {{ old('type') == 'Double' ? 'selected' : '' }}>Double</option>
                            </select>
                            @error('type') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Room Price -->
                        <div class="col-md-6">
                            <label for="roomPrice" class="form-label fw-bold">Price (₹)</label>
                            <input type="number" class="form-control" id="roomPrice" name="price" value="{{ old('price') }}"
                                placeholder="Enter price per night">
                            @error('price') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Room Status -->
                        <div class="col-md-12">
                            <label for="roomStatus" class="form-label fw-bold">Status</label>
                            <select class="form-select" id="roomStatus" name="status">
                                <option value="Available" {{ old('status') == 'Available' ? 'selected' : '' }}>Available
                                </option>
                                <option value="Occupied" {{ old('status') == 'Occupied' ? 'selected' : '' }}>Occupied</option>
                                <option value="Maintenance" {{ old('status') == 'Maintenance' ? 'selected' : '' }}>Maintenance
                                </option>
                            </select>
                            @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Description -->
                        <div class="col-12">
                            <label for="roomDescription" class="form-label fw-bold">Description</label>
                            <textarea class="form-control" id="roomDescription" name="description" rows="3"
                                placeholder="Enter room description">{{ old('description') }}</textarea>
                            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Room Image -->
                        <div class="col-12">
                            <label for="roomImage" class="form-label fw-bold">Room Image</label>
                            <input type="file" class="form-control" id="roomImage" name="image">
                            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-success px-4">Add Room</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
   
   
@endsection