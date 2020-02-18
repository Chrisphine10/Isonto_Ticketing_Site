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