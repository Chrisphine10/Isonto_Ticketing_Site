@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14 col-lg-10">
            <div class="card">
                <div class="card-header"><strong>{{ $post->title }}</strong></div>

                <div class="card-body">
                    <div class="text-center">
                <img src="{{ $post->image_url }}" alt="event_profile_image" style="max-width: 600px;">
                </div>
                <hr>
                <p> Posted on: 
{{ $post->created_at->diffForHumans() }}
</p>
<hr> <p>
{{ $post->body }}
</p><hr>
                    <div class="card">
                    <div class="card-header"><strong>comment</strong></div>
    <div class="card-body card-edit">
    <div class="container">
                    <form method="POST" action="{{ route('comments.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <textarea type="text" style="height: 100px;" required class="form-control" id="comment" name='comment' placeholder="Enter your comment"></textarea><br>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Comments') }}
                                </button>
                            </div>
                        </div>
                        <input type="number" hidden name="user_id" id="user_id" value=12>
                        <input type="number" hidden name="post_id" id="post_id" value={{ $post->id }}>
                        
                    </form> <hr>
                    <p>
                    
                    @foreach($comments as $comment)
                    <form action="{{ route('comments.edit', $comment->id) }}" method="get">
                        <p><span>{{ $comment->user_id }}: {{ $comment->comment }}</span>
                        <input type="submit" class="btn" value="edit">
                    </form>
                    </p>

                    @endforeach
                    
                    </p>
                </div>

        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection