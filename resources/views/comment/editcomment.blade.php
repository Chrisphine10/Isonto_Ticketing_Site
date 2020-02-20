@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Comment') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('comments.update', $comment->id) }}">
                    @method('PATCH')
                        @csrf
                        <div class="form-group row">
                            <label for="comment" class="col-md-4 col-form-label text-md-right">Comment</label>
                            <div class="col-md-6">
                                <textarea type="text" style="height: 200px;" required class="form-control" id="comment" name='comment'>{{ $comment->comment }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div><br>
                    </form>
<div class="col-md-6 offset-md-4">
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">delete</button>
                                            </form></div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection