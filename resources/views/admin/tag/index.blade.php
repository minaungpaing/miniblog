@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tag Lists</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Tag</li>
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
                            <h3 class="card-title">Tag Lists</h3>
                            <a href="{{route('tag.create')}}" class="btn btn-primary btn-sm">Add Tag</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Post Count</th>
                            <th style="width: 40px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($tags->count() > 0)
                            @foreach($tags as $tag)
                            <tr>
                                <td>{{ $tag->id }}</td>
                                <td>{{ $tag->name }}</td>
                                <td>{{ $tag->slug }}</td>
                                <td>{{ $tag->id }}</td>
                                <td class="d-flex">
                                    <a href="{{route('tag.edit',[$tag->id])}}" class="btn btn-info btn-sm mr-1"><i class="fa fa-edit"></i></a>
                                    <form action="{{route('tag.destroy',[$tag->id])}}" method="POST" class="mr-1">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </form>
                                    <!-- <a href="{{route('tag.show',[$tag->id])}}" class="btn btn-success btn-sm mr-1"><i class="fa fa-eye"></i></a> -->
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">
                                    <h6 class="text-center">No Tag Found.!</h6>
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