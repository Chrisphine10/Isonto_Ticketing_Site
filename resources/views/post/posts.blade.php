@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <div class="card-header">{{ __('Posts') }}
                <div class="col-sm-2">
    <a href="{{ route('posts.create')}}" class="btn btn-primary">New Post</a>
    </div> 
                </div>
                <div class="card-body">
                    <div class="col-sm-12">

                        @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                        @endif
                    </div>

                    <table class="table table-condenced">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Church_id</th>
                                <th>Image_id</th>
                            </tr>
                            <thead>
                            <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->body}}</td>
                                    <td>{{$post->church_id}}</td>
                                    <td>{{$post->image_id}}</td>
                                    <td>
                                        <div class="btn-toolbar" role="toolbar">

                                            <form action="{{ route('posts.show', $post->id) }}" method="get">
                                                @csrf
                                                <button type="submit" class="btn btn-primary" style="margin-right: 1em;">view</button>
                                            </form>

                                            <form action="{{ route('posts.edit', $post->id) }}" method="get">
                                                @csrf
                                                <button type="submit" class="btn btn-secondary" style="margin-right: 1em;">edit</button>
                                            </form>

                                            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">delete</button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection