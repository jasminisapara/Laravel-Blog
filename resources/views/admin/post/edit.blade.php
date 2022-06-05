@extends('layouts.master')

@section('title','Edit Post')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">

        

        <div class="card-header">
            <h4>Edit Post
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
            <form action="{{ url('admin/update-post/' .$post->id) }}" method="POST">
                @csrf
                @method('PUT')
<div class="row">
                <div class="mb-3 col-md-6">
                    <label for="">Category</label>
                    <select name="category_id" required class="form-control">
                        <option value="">-- Select Category --</option>
                        @foreach($category as $cateitem)
                            <option value="{{ $cateitem->id }}" {{ $post->category_id == $cateitem->id ? 'selected':'' }}>
                                {{ $cateitem->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="">Post Name</label>
                    <input type="text" name="name" value="{{ $post->name }}" class="form-control"/>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="">Description</label>
                    <textarea name="description" id="mySummernote" rows="5" class="form-control">{!! $post->description !!}</textarea> 
                    <!-- use !! !! this because in future use to <p> tag</p> -->
                </div>
                <div class="mb-3 col-md-6">
                    <label for="">Slug</label>
                    <input type="text" name="slug" value="{{ $post->slug }}"class="form-control"/>
                </div>
                
                </div>
                    <div class="col-md-4 mb-3">
                            <input type="checkbox" name="status" {{ $post->status == '1' ? 'checked':'' }}/>
                            <label for="">Status</label>
                    </div>
                   
                            <button type="submit" class="btn btn-primary">Update Post</button>
                       
                </div>
            </form>
        </div>
    </div>
</div>

@endsection