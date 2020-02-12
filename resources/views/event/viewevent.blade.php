@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('View Event') }}</div>

                <div class="card-body">
                    <p>
                    {{ $event }}
                    </p>
                    <form method="POST" action="{{ route('ticketTokens.store') }}">
                        @csrf
                        <input type="number" hidden name="user_id" id="user_id" value=12>
                        <input type="number" hidden name="event_id" id="post_id" value={{ $event->id }}>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Join Event') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div>
                    @foreach($tickets as $ticket)

                        {{ $ticket }}

                    @endforeach
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection