@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('View Post') }}</div>

                <div class="card-body">
                    <p>
                    {{ $post }}

                    {{ $post->id }}
                    </p>

                    <p>comment</p>
    <div class="card-body">
                    <form method="POST" action="{{ route('comments.store') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <textarea type="text" style="height: 100px;" required class="form-control" id="comment" name='comment' placeholder="Enter your comment"></textarea>
                            </div>
                        </div>
                        <input type="number" hidden name="user_id" id="user_id" value=12>
                        <input type="number" hidden name="post_id" id="post_id" value={{ $post->id }}>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('comment') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                    <p>
                    
                    @foreach($comments as $comment)
                    
                     <p>{{ $comment->comment }}</p><br>

                    @endforeach
                    
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection