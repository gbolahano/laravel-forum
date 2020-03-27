@extends('layouts.app')

@section('content')

    @foreach($discussions as $d)
    <div class="card mb-2">
        <div class="card-header">
            <img src=" {{ asset($d->user->avatar) }} " alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;    
            <span> {{ $d->user->name }}, {{ $d->created_at->diffForHumans() }} </span>
            <a href=" {{ route('discussion', ['slug' => $d->slug]) }} " class="btn btn-secondary btn-sm float-right text-white">view</a>
        </div>
    
        <div class="card-body">
            <h3 class="text-center display-5">
                {{ $d->title }}
            </h3>
            <p class="text-center">
                {{ str_limit($d->content, 50) }}
            </p>
        </div>
        <div class="card-footer">
            <p>
                {{ $d->replies->count() }} Replies
                <a href=" {{ route('channel', ['slug' => $d->channel->slug]) }} " class="btn btn-secondary float-right btn-sm"> {{ $d->channel->title }} </a>
            </p>
        </div>
    </div>
    @endforeach

    
@endsection
