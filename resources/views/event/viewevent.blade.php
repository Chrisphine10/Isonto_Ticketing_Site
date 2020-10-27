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
@guest
@else
@if($event->user_id == \Auth::id())
                    <form method="POST" action="{{ route('ticketTokens.store') }}">
                        @csrf
                        <input type="number" hidden name="user_id" id="user_id" value=12>
                        <input type="number" hidden name="event_id" id="event_id" value={{ $event->id }}>
                        
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
@endguest
</div>

</div>
</div>
<div class="card">
    <div class="card-header"><strong>comment</strong></div>
<div class="card-body card-edit">
<div class="container">
    <form method="POST" action="{{ route('eventcomments.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <div class="col-md-6">
                
        <input type="number" hidden name="event_id" id="event_id" value={{ $event->id }}> 
                <textarea type="text" style="height: 100px;" required class="form-control" id="comment" name='comment' placeholder="Enter your comment"></textarea><br>
                <button type="submit" class="btn btn-primary">
                    {{ __('Comments') }}
                </button>
            </div>
        </div> 
    </form>
    <hr>
    <p>
    
    @foreach($eventcomments as $eventcomment)
    <form action="{{ route('eventcomments.edit', $eventcomment->id) }}" method="get">
    <?php
        $user = App\User::find($eventcomment->user_id);
    ?>
        <p><span>{{ $user->name }}: {{ $eventcomment->comment }}</span>
        @guest
        @else
        <input style="color: blue;" type="submit" class="btn" value="edit">
        @endguest
    </form>
    </p><hr>

    @endforeach
    
    </p>
</div>

</div>
    </div>
</div>
            </div>
        </div>
    </div>
</div>

@endsection