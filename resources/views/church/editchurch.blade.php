@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Church Details') }}</div>

                <div class="card-body">

                <form method="POST" action="{{ route('churches.update', $church->id) }}">
                @method('PATCH')
                        @csrf

                        <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
        <div class="col-md-6">
        <input type="text" required class="form-control" id="name" name='name' placeholder="Enter Your Church Name" value={{ $church->name }}>
        </div>
        </div>
        <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
        <div class="col-md-6">
        <input type="text" required class="form-control" name='email' id="email" placeholder="Enter Your Church Email Address" value={{ $church->email }}>
        </div>
        </div>
        <div class="form-group row">
        <label for="phone" class="col-md-4 col-form-label text-md-right">Phone Number</label>
        <div class="col-md-6">
        <input type="number_format" required class="form-control" name='phone' id="phone" placeholder="Enter Your Church Phone Number" value={{ $church->phone_number }}>
        </div>
        </div>
        <div class="form-group row">
        <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
        <div class="col-md-6">
        <input type="text" required class="form-control" name="address" id="address" placeholder="Enter Your Church Address" value={{ $church->address }}>
        </div>
        </div>
        <div class="form-group row">
        <label for="city" class="col-md-4 col-form-label text-md-right">City</label>
        <div class="col-md-6">
        <input type="text" required class="form-control" name="city" id="city" placeholder="Write a short description of your Church" value={{ $church->city }}>
        </div>
        </div>
        <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label text-md-right">Bio</label>
        <div class="col-md-6">
        <textarea type="text" required class="form-control" style="height: 200px;" name="description" id="description">{{ $church->description }}</textarea>
        </div>
        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>





                </div>
            </div>
        </div>
    </div>
</div>
@endsection