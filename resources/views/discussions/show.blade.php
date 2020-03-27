@extends('layouts.app')

@section('content')

    <div class="card mb-2">
        <div class="card-header">
            <img src=" {{ asset($d->user->avatar) }} " alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;    
            <span> {{ $d->user->name }}, <b>({{ $d->user->points  }})</b> </span>
            @if($d->hasBestAnswer())
                <span class="btn btn-success btn-sm float-right">CLOSED</span>
            @else
                <span class="btn btn-danger btn-sm float-right">OPEN</span>
            @endif

            @if(Auth::id() == $d->user->id)
                @if(!$d->hasBestAnswer())
                    <a href=" {{ route('discussion.edit', ['slug' => $d->slug]) }} " class="btn btn-info btn-sm float-right text-white" style="margin-right: 8px;">Edit</a>           
                @endif
            @endif

            @if($d->is_being_watched_by_auth_user())
                <a href=" {{ route('discussion.unwatch', ['id' => $d->id]) }} " class="btn btn-secondary btn-sm float-right text-white" style="margin-right: 8px;">unwatch</a>
            @else
                <a href=" {{ route('discussion.watch', ['id' => $d->id]) }} " class="btn btn-secondary btn-sm float-right text-white" style="margin-right: 8px;">watch</a>
            @endif
        </div>
    
        <div class="card-body">
            <h3 class="text-center display-5">
                {{ $d->title }}
            </h3>
            <hr>
            <p class="text-center">
                {{ $d->content }}
            </p>

            <hr>
            @if($best_answer)
                <div class="text-center">
                    <h3 class="text-center">BEST ANSWER</h3>
                    <div class="card mb-2">
                        <div class="card-header">
                            <img src=" {{ asset($best_answer->user->avatar) }} " alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                            <span> {{ $best_answer->user->name }} </span>
                        </div>
                        <div class="card-body">
                            {{ $best_answer->content }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="card-footer">
            <p>
                {{ $d->replies->count() }} Replies
            </p>
        </div>
    </div>
    

    @foreach($d->replies as $r)
        <div class="card mb-2">
            <div class="card-header">
                <img src=" {{ asset($r->user->avatar) }} " alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;    
                <span> {{ $r->user->name }}, <b>({{ $r->user->points  }})</b> </span>
                @if(!$best_answer)
                    @if(Auth::id() == $d->user->id)
                        <a href=" {{ route('discussion.best.answer', ['id' => $r->id]) }} " class="btn btn-info btn-sm float-right text-white">mark as best answer</a>
                    @endif
                @endif
                @if(Auth::id() == $d->user->id)
                @if(!$r->best_answer)
                    <a href=" {{ route('reply.edit', ['id' => $r->id]) }} " class="btn btn-info btn-sm float-right text-white">Edit reply</a>
                @endif
            @endif
            </div>
            
            <div class="card-body">
                <p class="text-center">
                    {{ $r->content }}
                </p>
            </div>
            <div class="card-footer">
                @if($r->is_liked_by_auth_user())
                    <a href=" {{ route('reply.unlike', ['id' => $r->id]) }}  " class="btn btn-danger">Unlike <span class="badge badge-light"> {{ $r->likes->count() }} </a>
                @else
                    <a href=" {{ route('reply.like', ['id' => $r->id]) }} " class="btn btn-success">Like <span class="badge badge-light"> {{ $r->likes->count() }} </span> </a>
                @endif
            </div>
        </div>
    @endforeach

    <div class="card">
        <div class="card-body">
            @if(Auth::check())
                <form action=" {{ route('discussion.reply', ['id' => $d->id]) }} " method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="reply">Leave a reply...</label>
                        <textarea name="reply" id="reply" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn float-right" type="submit">Leave a reply</button>
                    </div>
                </form>
            @else
                <div class="text-center">
                    <p>Sing in to leave a reply</p>
                </div>
            @endif
        </div>
    </div>

@endsection
