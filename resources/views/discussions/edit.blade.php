@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header text-center">Update a discussion</div>

        <div class="card-body">
            <form action=" {{ route('discussion.update', ['id' => $discussion->id]) }} " method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="content">Ask a question </label>
                    <textarea name="content" id="" cols="30" rows="10" class="form-control">{{ $discussion->content }}</textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-success pull-right" type="submit">Save discussion changes</button>
                </div>
            </form>
        </div>
    </div>
@endsection
