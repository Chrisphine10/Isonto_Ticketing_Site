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
                    <div class="col-lg-4 col-md-10">
                    <div class="card">
                <div class="card-body">
                    <div><a href="">
                <img src="{{ $post->image_url}}" alt="church_profile_image" height="300px" width="300px">
                </a>
                </div>
                    </div>
               <div class="card-header">{{ $post->title }}<br>
               <form action="{{ route('posts.show', $post->id) }}" method="get">
                                                @csrf
                                                <button type="submit" class="btn btn-primary" style="margin-right: 1em;">Read More</button>
                                            </form>
               </div>
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