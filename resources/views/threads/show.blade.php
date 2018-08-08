@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row m-b-30">
            <div class="col-md-8 offset-md-2">
                <div class="card card bg-light ">
                    <div class="card-header">
                        <a href="#">{{$thread->creator->name}}</a> posted:
                        {{$thread->title}}
                    </div>

                    <div class="card-body">
                        {{ $thread->body }}
                    </div>
                </div>
            </div>
        </div>


        <div class="row m-b-30">
            <div class="col-md-8 offset-md-2">
                @foreach($thread->replies as $reply)
                    @include('threads.reply')
                @endforeach
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                @if(auth()->check())
                    <form method="post" action="/threads/{{$thread->id}}/replies">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <textarea id="body" name="body" class="form-control" placeholder="請輸入留言..." rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">送出</button>
                    </form>
                @else
                    <p class="text-center">請先<a href="{{route('login')}}">登入</a>後才可留言</p>
                @endif
            </div>
        </div>
    </div>
@endsection
