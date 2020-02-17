@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14 col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('Events') }} </div>
                    <div class="card-body">

                <div class="row">
                
                @foreach($events as $event)
                    <div class="col-lg-4 col-md-10">
                    <div class="card">
                <div class="card-body">
                    <div><a href="">
                <img src="{{ $event->image_url}}" alt="event_profile_image" height="300px" width="300px">
                </a>
                </div>
                    </div>
               <div class="card-header">{{ $event->name }}<br>
               <form action="{{ route('events.show', $event->id) }}" method="get">
                                                @csrf
                                                <button type="submit" class="btn btn-primary" style="margin-right: 1em;">View Event</button>
                                            </form>
               </div>
                </div>
                    </div> 
                @endforeach
                </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection