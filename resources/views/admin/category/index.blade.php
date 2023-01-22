{{-- extends  layouts from dashboard --}}
@extends('layouts.master')
@section('title', 'Category')



@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4>View  Category
                    <a href="{{url('admin/add-category')}}" class="btn btn-primary btn-sm float-right">Add Category</a>
                </h4>
            </div>
            <div class="card-body">
                @if(session('status'))
                <div class="alert alert-success">{{session('status')}}</div>
                @endif

                <table class="table table-bordered">
                    <thead>

                        <tr>{{$value1}}</tr>
                        <br>
                        <tr>{{$value2}}</tr>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Description</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $category as $item)

                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->title}}</td>
                            <td>
                                {{-- {{$item->image}} --}}
                                <img src="{{asset('uploads/category/' .$item->image)}}" width="50px" height="50px" alt="img">

                            </td>
                            <td>{{$item->status == '1' ? 'Hidden':'Shown' }}</td>
                            <td>{{$item->description}}</td>

                            <td>
                                <a href="{{url('admin/edit-category/'.$item->id)}}" class="btn btn-success">Edit</a>
                                <a href="{{url('admin/delete-category/'.$item->id)}}" class="btn btn-danger">Delete</a>
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
