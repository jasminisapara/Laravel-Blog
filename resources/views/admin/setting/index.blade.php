@extends('layouts.master')
@section('title','Blog Dashboard')

@section('content')

<div class="container-fluid px-4">
    
    <div class="row mt-3">
        <div class="col-md-12">

            @if(session('message'))
                <h4 class="alert alert-warning">{{ session('message') }}</h4>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Website Setting</h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('admin/settings') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Website Name</label>
                            <input type="text" name="website_name" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label for="">Website Logo</label>
                            <input type="file" name="website_logo" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label for="">Website Favicon</label>
                            <input type="file" name="website_name" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label for="">Description</label>
                            <input type="text" name="description" rows="3" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
