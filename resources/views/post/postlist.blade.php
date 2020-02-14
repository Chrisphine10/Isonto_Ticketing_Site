@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14 col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('Blog Posts') }} </div>
                    <div class="card-body">

                <div class="row">
                
                @foreach($posts as $post)
                    <div class="col-lg-3">
                    <div class="card">
                <div class="card-body">
                    <div><a href="">
                <img src="" alt="church_profile_image" height="300px" width="300px">
                </a>
                </div>
                    </div>
                <div class="card-header">{{ $post->title }} </div>
                </div>
                    </div> 
                @endforeach
                </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection