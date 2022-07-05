@extends('layouts.master')

@section('title','Add Post')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <div>{{$error}}</div>
                @endforeach
            </div>
        @endif

        <div class="card-header">
            <h4>Add Post
                <a href="{{ url('admin/add-post') }}" class="btn btn-primary float-end">Add Posts</a>
            </h4>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/add-post') }}" method="POST">
                @csrf
                {{-- <input type="hidden" name="csrf-token" value="{{csrf_token()}}"> --}}
                <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="">Category</label>
                    <select name="category_id" class="form-control">
                        @foreach ($category as $cateitem)
                            <option value="{{ $cateitem->id }}">{{ $cateitem->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-md-6" >
                    <label for="">Post Name</label>
                    <input type="text" name="name" class="form-control"/>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="">Description</label>
                    <textarea name="description" id="mySummernote" rows="3" class="form-control"></textarea>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control"/>
                </div>

                </div>
                    <div class="col-md-2 mb-3">
                            <input type="checkbox" name="status" />
                            <label for="">Status</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Post</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
