{{-- extends  layouts from dashboard --}}
@extends('layouts.master')
@section('title', 'Add Post')



@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid px-4">
                <div class="card mt-4">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <div class="card-header">
                        <h4>Add Post
                            <a href="{{ url('admin/add-post') }}" class="btn btn-primary btn-sm float-right">Add Post</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">{{ session('status') }}</div>
                        @endif

                        <form action="{{ url('admin/add-post') }}" method="POST">
                            @csrf


                            <label for="">Category</label>
                            <select name="category_id" class="form-control">
                                @foreach ($category as $categoryitem)
                                    <option value="{{ $categoryitem->id }}">{{ $categoryitem->title }}</option>
                                @endforeach
                            </select>
                            <div class="mb-3">
                                <label for="">Post Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Slug</label>
                                <input type="text" name="slug" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control ckeditor"></textarea>

                            </div>
                            <div class="mb-3">
                                <label for="">Youtube Iframe Link</label>
                                <input type="text" name="yt_iframe" class="form-control">
                            </div>
                            <h4>SEO Tags</h4>
                            <div class="mb-3">
                                <label for="">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control ckeditor">
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Description</label>
                                <textarea name="meta_description" id="" class="form-control ckeditor"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Keyword</label>
                                <textarea name="meta_keyword" id="" class="form-control ckeditor"></textarea>
                            </div>
                            <h4>Status</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Status</label>
                                        <input type="checkbox" name="status">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary float-end">Save Post</button>
                                    </div>
                                </div>
                            </div>

                        </form>


                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


    </div>
    <!-- /.content-wrapper -->

@endsection
