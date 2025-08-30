@extends('adm_masterview')
@section('sidebar')


    <div class="container-fluid">
        <div class="d-flex justify-content-between pt-5">
            <button type="button" class="btn btn-primary">Home Section List </button>
            <a class="btn btn-success fs-6 text-center" href="{{ route('adm_show_add_home_content') }}">+ Add Home Section</a>
        </div>
        <div class="table-responsive mt-3">
            <table class="table table-striped  table-bordered table-centered mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Main Image</th>
                        <th>Side Image</th>
                        <th>Section Title</th>
                        <th>Hotel Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($home_content as $content)
                        <tr>
                            <td>{{ $content->id }}</td>
                            <td>
                                <img src="{{ asset("storage/hotel_images/{$content->main_image}")  }}" style="width:auto;height:100px">
                            </td>   
                            <td>
                                <img src="{{ asset("storage/hotel_images/{$content->side_image}")  }}" style="width:auto;height:100px">
                            </td>
                            <td>{{ $content->section_title }}</td>
                            <td>{{ $content->hotel_name }}</td>
                            <td>{{ $content->description }}</td>
                            <td>
                                <div class="d-flex ">
                                    <a href="{{ route('adm_edit_home_content_show_form', $content->id) }}"><button
                                            class="btn btn-success me-1" type="submit">EDIT</button></a>
                                    <form action="{{ route('delete_home_content', $content->id) }}">
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