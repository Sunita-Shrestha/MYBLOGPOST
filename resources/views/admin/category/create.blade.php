{{-- extends  layouts from dashboard --}}
@extends('layouts.master')
@section('title', 'Category')


@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Add Category</h4>


        </div>
        <div class="card-body">

            @if($errors->any())
            <div class="alert alert-danger">
            @foreach ($errors->all() as $error )
            <div>{{$error}}</div>

            @endforeach
            </div>
            @endif

            <form action="{{url('admin/add-category')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="">Category Name</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-3">
                <label for="">Slug</label>
                <input type="text" class="form-control" name="slug">
            </div>
            <div class="mb-3">
                <label for="">Description</label>
                <textarea name="description" id="" rows="3" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="">Image</label>
                <input type="file" class="form-control" name="image">
            </div>

            <h6>SEO Tags</h6>
            <div class="mb-3">
                <label for="">Meta title</label>
                <input type="text" class="form-control" name="meta_title">
            </div>
            <div class="mb-3">
                <label for="">Meta Description</label>
                <textarea name="meta_description" id="" rows="3" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="">Meta Keywords</label>
                <textarea name="meta_keyword" id=""  rows="3" class="form-control"></textarea>
            </div>

            <h6>Status Mode</h6>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="">Navbar Status</label>
                    <input type="checkbox" name="navbar_status">
                </div>
                <div class="col-md-3 mb-3">
                    <label for=""> Status</label>
                    <input type="checkbox" name="status">
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary" type="submit">Save Category</button>
                </div>

            </div>


            </form>

        </div>
    </div>


  </div>
  <!-- /.content-wrapper -->


@endsection

