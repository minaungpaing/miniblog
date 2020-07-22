@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0 text-dark">View Post</h1>
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
                            <h3 class="card-title">View Post</h3>
                            <a href="{{route('post.index')}}" class="btn btn-primary btn-sm">Back</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-bordered ">
                            <tr>
                                <th style="width:200px;">Title:</th>
                                <td>{{ $post->title }}</td>
                            </tr>
                            <tr>
                                <th style="width:200px;">Image:</th>
                                <td>
                                    <div style="max-width:300px; max-height:300px; overflow:hidden">
                                        <img src="{{asset('storage/postimg/'. $post->image) }}" class="img-fluid" alt="post_img">
                                    </div>
                                </td>
                            </tr> 
                            <tr>
                                <th style="width:200px;">Category:</th>
                                <td>{{ $post->category->name}}</td>
                            </tr>
                            <tr>
                                <th style="width:200px;">Author:</th>
                                <td>{{ $post->user->name}}</td>
                            </tr>
                            <tr>
                                <th style="width:200px;">Tags:</th>
                                <td>
                                    @foreach ($post->tags as $tag)
                                        <span class="badge badge-info">{{$tag->name}}</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th style="width:200px;">Description:</th>
                                <td>{{ $post->description }}</td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection