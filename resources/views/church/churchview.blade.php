@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14 col-lg-10">
            <div class="card">
                <div class="card-header">{{ $church->name }}</div>

                <div class="card-body">
                <div class="container">

                <div class="row">
                <div class="col-lg-6 col-md-8">
                <div>
                <img src="{{ $church->image_url }}" alt="church_profile_image" height="300px" width="380px">
                </div>
                <hr>
                </div>
<div class="col-lg-5 col-md-5">
<div><p><strong>Location:</strong>
{{ $church->city }}
</p>
<p><strong>Email:</strong>
{{ $church->email }}
</p>
<p><strong>Phone Number:</strong>
{{ $church->phone_number }}
</p>
@if($church->user_id == \Auth::id())

<form action="{{ route('churches.edit', $church->id) }}" method="get">
    @csrf
    <button type="submit" class="btn btn-secondary" style="margin-right: 1em;">edit</button>
</form>

<form action="{{ route('churches.destroy', $church->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">delete</button>
</form>
@else
<form method="POST" action="{{ route('churchMembers.store') }}">
    @csrf
    <input type="number" hidden name="user_id" id="user_id" value=12>
    <input type="number" hidden name="church_id" id="church_id" value={{ $church->id }}>
    
            <button type="submit" class="btn btn-primary">
                {{ __('Join Church') }}
            </button>
</form>
@endif
</div>
</div>

</div>

<div class="row">

<div class="col-lg-12">
                <div class="card">
                <div class="card-header">About Us</div>
<p>{{ $church->description }}</p> 

</div>
</div>

</div>


</div>
</div>




            </div>
        </div>
    </div>
</div>
@endsection