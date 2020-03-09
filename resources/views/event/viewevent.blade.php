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
                <img src="{{ $event->image_url }}" alt="event_profile_image" height="300px" width="300px">
                </div>
                <hr>
                <div class="card">
                <div class="card-header">About Event</div>
                <div class="col-lg-10 col-md-10">
<p>{{ $event->description }}</p>
</div>
</div>
</div>
<div class="col-lg-5 col-md-5">
<div><p><strong>Location:</strong>
{{ $event->city }}
</p>
<p><strong>Email:</strong>
{{ $church->email }}
</p>
<p><strong>Phone Number:</strong>
{{ $church->phone_number }}
</p>
@if($event->user_id == \Auth::id())
                    <form method="POST" action="{{ route('ticketTokens.store') }}">
                        @csrf
                        <input type="number" hidden name="user_id" id="user_id" value=12>
                        <input type="number" hidden name="event_id" id="post_id" value={{ $event->id }}>
                        
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Join Event') }}
                                </button>
                    </form>
@else

<form action="{{ route('events.edit', $event->id) }}" method="get">
    @csrf
    <button type="submit" class="btn btn-secondary" style="margin-right: 1em;">edit</button>
</form>

<form action="{{ route('events.destroy', $event->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">delete</button>
</form>

@endif
</div>

</div>
</div>
            </div>
        </div>
    </div>
</div>
@endsection