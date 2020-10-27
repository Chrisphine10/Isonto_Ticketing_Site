@extends('layouts.app')

@section('content')
<script src="https://cdn.tiny.cloud/1/tmypxrzwbm1lcbf2zxcfh2pz4pqe2zq6bqo2pday5lcyh8qc/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Event') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input type="text" required class="form-control" id="name" name='name' placeholder="Enter your event name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="image">Profile Picture</label>
                            <div class="col-md-6">
                                <input class="form-control" required type="file" name="image" id="image">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">City</label>
                            <div class="col-md-6">
                                <input type="text" required class="form-control" id="city" name='city' placeholder="Enter the city of the event">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="venue" class="col-md-4 col-form-label text-md-right">Venue</label>
                            <div class="col-md-6">
                                <input type="text" required class="form-control" id="venue" name='venue' placeholder="Enter the venue of the event">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">Date of Event</label>
                            <div class="col-md-6">
                                <input type="date" required class="form-control" id="date" name='date'>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="time" class="col-md-4 col-form-label text-md-right">Time of Event</label>
                            <div class="col-md-6">
                                <input type="time" required class="form-control" id="time" name='time'>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="description" name='description' placeholder="Write a short description about your event"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
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