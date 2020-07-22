@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0 text-dark">Post Lists</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Post</li>
                </ol>
                </div>
            </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div class=" d-flex justify-content-between">
                            <h3 class="card-title">Post Lists</h3>
                            <a href="{{route('post.create')}}" class="btn btn-primary btn-sm">Add Post</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                            <th style="width: 10px">#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>User</th>
                            <th>Tags</th>
                            <th style="width: 40px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($posts->count() > 0)
                            @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>
                                    <div style="max-width:70px; max-height:70px; overflow:hidden">
                                        <img src="{{asset('storage/postimg/'. $post->image) }}" class="img-fluid" alt="post_img">
                                    </div>
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category->name}}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>
                                    @foreach ($post->tags as $tag)
                                        <span class="badge badge-info">{{$tag->name}}</span>
                                    @endforeach
                                </td>
                                <td class="d-flex">
                                    <a href="{{route('post.show',[$post->id])}}" class="btn btn-success btn-sm mr-1"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('post.edit',[$post->id])}}" class="btn btn-info btn-sm mr-1"><i class="fa fa-edit"></i></a>
                                    <form action="{{route('post.destroy',[$post->id])}}" method="POST" class="mr-1">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </form>                                   
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">
                                    <h6 class="text-center">No post Found.!</h6>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection