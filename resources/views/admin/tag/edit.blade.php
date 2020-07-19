@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Tag </h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('tag.index')}}">Tag</a></li>
                    <li class="breadcrumb-item active">Edit Tag</li>
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
                            <h3 class="card-title">Edit tag- {{ $tag->name }}</h3>
                            <a href="{{route('tag.index')}}" class="btn btn-primary btn-sm">Back</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('tag.update',[$tag->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="card-body">
                            @include('include.error')
                            <div class="form-group">
                                <label for="name">Categor Name:</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $tag->name}}" placeholder="Enter tag Name">
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control" id="description" rows="4" placeholder="Enter Description">{{ $tag->description }}</textarea>
                            </div>
                       
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update tag</button>
                        </div>
                    </form>
                </div>
            </div>
        </secton>
</div>
@endsection