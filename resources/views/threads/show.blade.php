@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card card bg-light">
                    <div class="card-header">{{$thread->title}}</div>

                    <div class="card-body">
                        {{ $thread->body }}
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-8 offset-md-2">
                @foreach($thread->replies as $reply)
                    <div class="card card bg-light">
                        <div class="card-header">
                            <a href="#">{{$reply->owner->name}}</a>
                            said {{$reply->created_at->diffForHumans()}}
                        </div>

                        <div class="card-body">
                            {{ $reply->body }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
