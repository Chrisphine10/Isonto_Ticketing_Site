@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <div class="card-header">{{ __('Events List') }}
                
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
                                <th>Name</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Image_id</th>
                                <th>City</th>
                                <th>Location_id</th>
                                <th>Action</th>
                            </tr>
                            <thead>
                            <tbody>
                                @foreach($events as $event)
                                <tr>
                                    <td>{{$event->name}}</td>
                                    <td>{{$event->description}}</td>
                                    <td>{{$event->date}}</td>
                                    <td>{{$event->image_id}}</td>
                                    <td>{{$event->city}}</td>
                                    <td>{{$event->location_id}}</td>
                                    <td>
                                        <div class="btn-toolbar" role="toolbar">

                                            <form action="{{ route('events.show', $event->id) }}" method="get">
                                                @csrf
                                                <button type="submit" class="btn btn-primary" style="margin-right: 1em;">view</button>
                                            </form>

                                            <form action="{{ route('events.edit', $event->id) }}" method="get">
                                                @csrf
                                                <button type="submit" class="btn btn-secondary" style="margin-right: 1em;">edit</button>
                                            </form>

                                            <form action="{{ route('events.destroy', $event->id) }}" method="post">
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