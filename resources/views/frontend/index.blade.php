@extends('layouts.app')

@section('content')

<div class="bg-dark py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <div class="owl-carousel category-carousel owl-theme">
                    @foreach ($all_categories as $all_cat_item)
                    <div class="item">
                        <a href="{{ url('tutorial/'.$all_cat_item->slug) }}" class="text-decoration-none">
                            <div class="card">
                                <img src="{{ asset('uploads/category/'.$all_cat_item->image) }}" alt="">
                                <div class="card-body text-center">
                                    <h5 class="text-dark">{{ $all_cat_item->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="py-1 bg-light bg-gray">
    <div class="container">
        <div class="border  text-center p-3">
            <h3>Advertise Here</h3>
        </div>
</div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Show Some Description</h4>
                <div class="underline"></div>
                    <p>
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled
                    </p>
                
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>All Categories List</h4>
                <div class="underline"></div>
            </div>
            @foreach ($all_categories as $all_cat_item)
            <div class="col-md-3">
                        <div class="card card-body mb-3">
                            <a href="{{ url('tutorial/'.$all_cat_item->slug) }}" class="text-decoration-none">
                                <h5 class="text-dark mb-0">{{ $all_cat_item->name }}</h5>
                            </a>
                        </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Latest Posts</h4>
                <div class="underline"></div>
            </div>
            <div class="col-md-8">
            @foreach ($latest_posts as $latest_post_item)
                <div class="card card-body bg-gray shadow mb-3">
                    <a href="{{ url('tutorial/'. $latest_post_item->category->slug.'/'.$latest_post_item->slug) }}" class="text-decoration-none">
                        <h5 class="text-dark mb-0">{{ $latest_post_item->name }}</h5>
                    </a>
                    <h5>Posted On: {{ $latest_post_item->created_at->format('d-m-Y') }}</h5>

                </div> 
            @endforeach
            </div>
            <div class="col-md-4">
                <div class="border  text-center p-3">
                    <h3>Advertise Here</h3>
                </div>
            </div>
            
        </div>
    </div>
</div>


@endsection