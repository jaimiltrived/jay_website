@extends('adm_masterview')
@section('sidebar')


    <div class="container-fluid">
        <div class="d-flex justify-content-between pt-5">
            <button type="button" class="btn btn-primary">Banner List </button>
            <a class="btn btn-success fs-6 text-center" href="{{ route('adm_show_add_banner') }}">+ Add Banner</a>
        </div>
        <div class="table-responsive mt-3">
            <table class="table table-striped  table-bordered table-centered mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banners as $banner)
                        <tr>
                            <td>{{ $banner->id }}</td>
                            <td>
                                <img src="{{ asset("storage/banners/{$banner->slider_image}") }}"
                                    style="width:250px;height:100px">
                            </td>
                            <td>
                                <div class="d-flex ">
                                    <a href="{{ route('adm_edit_baner_show_form' , $banner->id) }}"><button class="btn btn-success me-1" type="submit">EDIT</button></a>
                                    <form action="{{ route('delete_banner', $banner->id) }}">
                                        <button class="btn btn-danger ms-1" type="submit">DELETE</button>
                                    </form>
                                </div>


                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


@endsection