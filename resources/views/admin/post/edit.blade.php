{{-- extends  layouts from dashboard --}}
@extends('layouts.master')
@section('title', 'Edit Post')



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
                        <h4>Edit Post
                            <a href="{{ url('admin/posts') }}" class="btn btn-primary btn-sm float-right">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">{{ session('status') }}</div>
                        @endif

                        <form action="{{ url('admin/update-post/' . $post->id) }}" method="POST">
                            @csrf
                            @method('PUT')


                            <label for="">Category</label>
                            <select name="category_id" required class="form-control">
                                <option value="">--Select Category--</option>
                                @foreach ($category as $categoryitem)
                                    <option value="{{ $categoryitem->id }}"
                                        {{ $post->category_id == $categoryitem->id ? 'selected' : '' }}>
                                        {{ $categoryitem->title }}</option>
                                @endforeach
                            </select>
                            <div class="mb-3">
                                <label for="">Post Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $post->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="">Slug</label>
                                <input type="text" name="slug" class="form-control" value="{{ $post->slug }}">
                            </div>
                            <div class="mb-3">
                                <label for="">Description</label>
                                {{-- <textarea name="description" id="" cols="30" rows="3" class="form-control"></textarea> --}}
                                <textarea name="description" class="form-control ckeditor">{!! $post->description !!}</textarea>

                            </div>
                            <div class="mb-3">
                                <label for="">Youtube Iframe Link</label>
                                <input type="text" name="yt_iframe" class="form-control" value="{{ $post->yt_iframe }}">
                            </div>
                            <h4>SEO Tags</h4>
                            <div class="mb-3">
                                <label for="">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control"
                                    value="{{ $post->meta_title }}">
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Description</label>
                                <textarea name="meta_description" id="" cols="30" rows="3" class="form-control ckeditor"> {!! $post->meta_description !!}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Keyword</label>
                                <textarea name="meta_keyword" id="" cols="30" rows="3" class="form-control ckeditor">{!! $post->meta_keyword !!}</textarea>
                            </div>
                            <h4>Status</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Status</label>
                                        <input type="checkbox" name="status"{{ $post->status == '1' ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary float-end">Update Post</button>
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
