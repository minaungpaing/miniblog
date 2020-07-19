@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Post </h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('post.index')}}">Post</a></li>
                    <li class="breadcrumb-item active">Create Post</li>
                </ol>
                </div>
            </div>
            </div>
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div class=" d-flex justify-content-between">
                            <h3 class="card-title">Create post</h3>
                            <a href="{{route('post.index')}}" class="btn btn-primary btn-sm">Back</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="card-body">
                            @include('include.error')
                            <div class="form-group">
                                <label for="name">Post Title:</label>
                                <input type="text" class="form-control" name="title" id="name" placeholder="Enter post title">
                            </div>
                            <div class="form-group">
                                <label for="select">Post Category:</label>
                                
                                <select name="category" id="select" class="form-control">
                                    <option value="" selected style="display:none;">Select Category</option>
                                    @foreach( $categories as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="img">Image:</label>
                                <!-- <input type="file" name="image" id="img"> -->
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="img">
                                    <label for="img" class="custom-file-label">Choose File</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control" id="description" rows="4" placeholder="Enter Description"></textarea>
                            </div>
                       
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create post</button>
                        </div>
                    </form>
                </div>
            </div>
        </secton>
</div>
@endsection