@extends('adm_masterview')
@section('sidebar')


    <div class="container-fluid">
        <div class="d-flex justify-content-between pt-5">
            <button type="button" class="btn btn-primary">About Section List </button>
            <a class="btn btn-success fs-6 text-center" href="{{ route('adm_show_add_about_section') }}">+ Add About
                Section</a>
        </div>
        <div class="table-responsive mt-3">
            <table class="table table-striped  table-bordered table-centered mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Services</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aboutsections as $section)
                        <tr>
                            <td>{{ $section->id }}</td>
                            <td>{{ $section->title }}</td>
                            <td>{{ $section->description }}</td>
                            <td>
                                <ul>
                                    @foreach($section->service_list as $service)
                                        <li style="list-style:none;">{{ $service }}</li>
                                    @endforeach
                                </ul>
                            </td>


                            <td>
                                <div class="d-flex ">
                                    <a href="{{ route('adm_edit_about_section_show_form', $section->id) }}"><button
                                            class="btn btn-success me-1" type="submit">EDIT</button></a>
                                    <form action="{{ route('delete_about_section', $section->id) }}">
                                        <button class="btn btn-danger ms-1" type="submit">DELETE</button>
                                    </form>
                                </div>


                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>


        <div class="d-flex justify-content-between pt-5">
            <button type="button" class="btn btn-primary ">About Services List </button>
            <a class="btn btn-success fs-6 text-center" href="{{ route('adm_show_add_about_service') }}">+ Add About
                Services</a>
        </div>
        <div class="table-responsive mt-3">
            <table class="table table-striped  table-bordered table-centered mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aboutservices as $service)
                        <tr>
                            <td>{{ $service->id }}</td>
                            <td>
                                <img src="{{ asset("storage/services/$service->image") }}" style="height:100px;width:100px;" />
                            </td>
                            <td>{{ $service->title }}</td>
                            <td>
                                <div class="d-flex ">
                                    <a href="{{ route('adm_edit_about_service_show_form', $service->id) }}"><button
                                            class="btn btn-success me-1" type="submit">EDIT</button></a>
                                    <form action="{{ route('delete_about_service', $service->id) }}">
                                        <button class="btn btn-danger ms-1" type="submit">DELETE</button>
                                    </form>
                                </div>


                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>


        <div class="d-flex justify-content-between pt-5">
            <button type="button" class="btn btn-primary">Background Image List </button>
            <a class="btn btn-success fs-6 text-center" href="{{ route('adm_show_add_background_image') }}">+ Add Background Image</a>
        </div>
        <div class="table-responsive mt-3">
            <table class="table table-striped  table-bordered table-centered mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bgimage as $image)
                        <tr>
                            <td>{{ $service->id }}</td>
                            <td>
                                <img src="{{ asset("storage/backgrounds/$image->background_image") }}" style="height:100px;width:100px;" />
                            </td>
                            <td>{{ $image->title }}</td>
                            <td>
                                <div class="d-flex ">
                                    <a href="{{ route('adm_edit_background_image_show_form', $image->id) }}"><button
                                            class="btn btn-success me-1" type="submit">EDIT</button></a>
                                    <form action="{{ route('delete_background_image', $image->id) }}">
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