@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Churches List') }}</div>

                <div class="card-body">
                
                <table class="table table-condenced">
                <thead>
<tr>
<th>Name</th>
<th>Description</th>
<th>Image</th>
<th>Address</th>
<th>Location</th>
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
<td>{{$church->location}}</td>
<td>
<div class="btn-toolbar" role="toolbar">
<form action="church-view" method="get">
<input type="text" name="id" hidden value="{{$church->id}}">
<button type="submit" class="btn btn-primary">view</button>
</form>
<form action="/" method="get">
<input type="text" name="id" hidden value="{{$church->id}}">
<button type="submit" class="btn btn-secondary">edit</button>
</form>
<form action="delete-church" method="get">
<input type="text" name="id" hidden value="{{$church->id}}">
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