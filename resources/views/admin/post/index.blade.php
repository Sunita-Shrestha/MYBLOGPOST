{{-- extends  layouts from dashboard --}}
@extends('layouts.master')
@section('title', 'View Post')



@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid px-4">
                <div class="card">
                    <div class="card-header">
                        <h4>View Posts
                            <a href="{{ url('admin/add-post') }}" class="btn btn-primary btn-sm float-right">Add Post</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">{{ session('status') }}</div>
                        @endif

                        <table class="table table-bordered" id="myDataTable">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Post Name</th>
                                    <th>Category Name</th>
                                    {{-- <th>Slug</th> --}}
                                    <th>Description</th>
                                    {{-- <th>You Tube</th> --}}
                                    {{-- <th>Meta Title</th> --}}
                                    {{-- <th>Meta Description</th> --}}
                                    {{-- <th>Meta Keyword</th> --}}
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $index => $postitem)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $postitem->name }}</td>
                                        <td>{{ $postitem->category->title }}</td>
                                        {{-- <td>{{ $postitem->slug }}</td> --}}
                                        <td>{{ $postitem->description }}</td>
                                        {{-- <td>{{ $postitem->yt_iframe }}</td> --}}
                                        {{-- <td>{{ $postitem->meta_title }}</td> --}}
                                        {{-- <td>{{ $postitem->meta_description }}</td> --}}
                                        {{-- <td>{{ $postitem->meta_keyword }}</td> --}}
                                        <td>{{ $postitem->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                        <td><a href="{{ url('admin/post/' . $postitem->id) }}"
                                                class="btn btn-success">Edit</a>
                                            <a href="{{ url('admin/delete-post/' . $postitem->id) }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


    </div>
    <!-- /.content-wrapper -->

@endsection
