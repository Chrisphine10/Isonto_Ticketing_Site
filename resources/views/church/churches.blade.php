@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <div class="card-header">{{ __('Churches List') }}
                <div class="col-sm-2">
    <a href="{{ route('churches.create')}}" class="btn btn-primary">New Church</a>
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
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image_id</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Location_id</th>
                                <th>Action</th>
                            </tr>
                            <thead>
                            <tbody>
                                @foreach($churches as $church)
                                <tr>
                                    <td>{{$church->name}}</td>
                                    <td>{{$church->description}}</td>
                                    <td>{{$church->image_id}}</td>
                                    <td>{{$church->address}}</td>
                                    <td>{{$church->city}}</td>
                                    <td>{{$church->location_id}}</td>
                                    <td>
                                        <div class="btn-toolbar" role="toolbar">

                                            <form action="{{ route('churches.show', $church->id) }}" method="get">
                                                @csrf
                                                <button type="submit" class="btn btn-primary" style="margin-right: 1em;">view</button>
                                            </form>

                                            <form action="{{ route('churches.edit', $church->id) }}" method="get">
                                                @csrf
                                                <button type="submit" class="btn btn-secondary" style="margin-right: 1em;">edit</button>
                                            </form>

                                            <form action="{{ route('churches.destroy', $church->id) }}" method="post">
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