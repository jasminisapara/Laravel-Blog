@extends('layouts.master')
@section('title','Edit Users')

@section('content')
<style>
    .margin-left{
        margin-left:-477px;

    }
</style>
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Edit Users
                <a href="{{ url('admin/users') }}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="">Full Name</label>
                    <p class="form-control">{{ $user->name }}</p>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="">Email</label>
                    <p class="form-control">{{ $user->email }}</p>
                </div>
            </div>
<div class="row">
                <div class="mb-3 col-md-6">
                    <label for="">Created At</label>
                    <p class="form-control">{{ $user->created_at->format('d/m/Y') }}</p>
                </div>

                <div class="mb-3 col-md-6">
            
                <form action="{{ url('admin/update-user/'.$user->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3 ">
                        <label for="">Role As</label>
                        <select name="role_as" id="" class="form-control">
                            <option value="1" {{ $user->role_as == '1' ? 'selected':'' }} >Admin</option>
                            <option value="0" {{ $user->role_as == '0' ? 'selected':'' }}>User</option>
                            <option value="2" {{ $user->role_as == '2' ? 'selected':'' }}>Blogger</option>
                        </select>   
                    </div>
                    <button class="btn btn-primary margin-left"  type="submit">User Role Update</button>
    
            </form>
            </div>

        </div>
    </div>
</div>

@endsection