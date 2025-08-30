@extends('adm_masterview')
@section('sidebar')


    <div class="container-fluid">
        <div class="d-flex justify-content-between pt-5">
            <button type="button" class="btn btn-primary">Blog List </button>
            <a class="btn btn-success fs-6 text-center" href="{{ route('adm_show_add_blog') }}">+ Add Blog</a>
    </div>
    <div class="table-responsive mt-3">
        <table class="table table-striped  table-bordered table-centered mb-0">
            <thead class="table-dark">

                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Slug</th>
                    <th>Name</th>
                    <th>Published At</th>
                    <th>Action</th>
                </tr>

            </thead>
            <tbody>
                @foreach($blogs as $blog)
                    <tr>
                        <td>{{ $blog->id }}</td>
                        <td>
                            <img src="{{ asset("storage/blogs/{$blog->image}") }}" alt="Blog Image"
                                style="width:150px; height:150px;">
                        </td>

                        <td>{{ $blog->slug }}</td>
                        <td>{{ $blog->name }}</td>
                        <td>{{ $blog->published_at }}</td>
                        <td>
                            <div class="d-flex  mt-2">
                                <form action="{{ route('delete_blog', $blog->id) }}"><button
                                        class="btn btn-danger me-1">DELETE</button></form>
                                <a href="{{ route('adm_edit_blog_show_form', $blog->id) }}"><button
                                        class="btn btn-success ms-1">EDIT</i></button></a>
                            </div>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
    </div>


@endsection