@extends('layouts.app')

@section('content')
<script src="https://cdn.tiny.cloud/1/tmypxrzwbm1lcbf2zxcfh2pz4pqe2zq6bqo2pday5lcyh8qc/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add a Post') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                            <div class="col-md-6">
                                <input type="text" required class="form-control" id="title" name='title' placeholder="Enter your post title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="body" class="col-md-4 col-form-label text-md-right">Body</label>
                            <div class="col-md-6">
                                <textarea style="height: 200px;" class="form-control" id="body" name='body' placeholder="Enter your post"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="image">Image</label>
                            <div class="col-md-6">
                                <input class="form-control" type="file" name="image" id="image">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Post') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    tinymce.init({
    selector: 'textarea',
    height: 300,
    menubar: false,
    plugins: [
        'fullscreen advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code',
        'insertdatetime media table paste code help wordcount'
    ],
    toolbar: 'fullscreen undo redo | formatselect | ' +
    'bold italic backcolor | alignleft aligncenter ' +
    'alignright alignjustify | bullist numlist outdent indent | ' +
    'removeformat | help',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
  </script>
@endsection