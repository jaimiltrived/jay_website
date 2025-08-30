@extends('adm_masterview')
@section('sidebar')

<div class="container" style="padding-top: 7%;">
    <div class="card shadow" style="border-radius: 12px;">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Edit Banner</h4>
        </div>
        <div class="card-body bg-light">
            <form action="{{ route('edit_banner' , $banner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">


                    <!-- Profile Picture -->
                    <div class="col-md-12">
                        <label for="banner_image" class="form-label fw-bold">Banner Image</label>
                        <input type="file" name="banner_image" class="form-control" value="{{ $banner->slider_image }}">
                        @if ($errors->has('banner_image'))
                            <span class="text-danger">{{ $errors->first('banner_image') }}</span>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <div class="col-12 text-end mt-3">
                        <button type="submit" class="btn btn-success px-4">Edit Banner</button>
                    </div>

                </div>
            </form>

        </div>


    </div>
</div>

@endsection