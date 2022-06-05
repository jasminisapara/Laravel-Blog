@extends('layouts.master')
@section('title','Category')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Edit Category
            <a href="{{ url('admin/posts') }}" class="btn btn-danger float-end">Back</a>
            </h4>

        </div>
        <div class="card-body">

            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <div>{{$error}}</div>
                @endforeach
            </div>
            @endif



            <form action="{{ url('admin/update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')  
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="">Category Name</label>
                    <input type="text" name="name" value="{{$category->name}}" class="form-control">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="">Slug</label>
                    <input type="text" name="slug" value="{{$category->slug}}" class="form-control">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="">Description</label>
                    <textarea  name="description"  id="mySummernote" rows="3" class="form-control">{{$category->description}}</textarea>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control">
                </div></div>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <input type="checkbox" name="navbar-status" {{$category->navbar_status == '1' ? 'checked':'' }} />
                        <label for="">Navbar Status</label>
                    </div>
                    <div class="col-md-2 mb-3">
                        <input type="checkbox" name="status" {{$category->status == '1' ? 'checked':'' }} />
                        <label for="">Status</label>
                </div>
                    </div>
                        <button type="submit" class="btn btn-primary">Update Category</button>
            </form>
        </div>
    </div>
</div>

@endsection