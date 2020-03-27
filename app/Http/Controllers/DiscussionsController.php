<?php

namespace App\Http\Controllers;

use Auth;
use App\Reply;
use App\Discussion;
use Session;
use Illuminate\Http\Request;

class DiscussionsController extends Controller
{
    public function create()
    {
        return view('discuss');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'channel_id' => 'required',
            'content' => 'required',
            'title' => 'required',
        ]);

        $discussion = Discussion::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'channel_id' => $request->input('channel_id'),
            'user_id' => Auth::id(),
            'slug' => str_slug($request->input('title'))
        ]);

        Session::flash('success', 'Discussion sucessfully created.');

        return redirect()->route('discussion', ['slug' => $discussion->slug]);
    }

    public function show($slug) 
    {
        $discussion = Discussion::where('slug', $slug)->first();

        $best_answer = $discussion->replies()->where('best_answer', 1)->first();

        return view('discussions.show')->with('d', $discussion)
                                    ->with('best_answer', $best_answer);
    }

    public function reply($id)
    {
        $d = Discussion::find($id);
        $reply = request()->input('reply');
        $reply = Reply::create([
            'user_id' => Auth::id(),
            'discussion_id' => $d->id,
            'content' => $reply
        ]);

        $reply->user->points += 25;

        $reply->user->save();

        Session::flash('success', 'Replied to discussion');

        return redirect()->back();
    }

    public function edit($slug)
    {
        return view('discussions.edit', ['discussion' => Discussion::where('slug', $slug)->first()]);
    }

    public function update($id)
    {
        $this->validate(request(), [
            'content' => 'required'
        ]);

        $d = Discussion::find($id);

        $d->content = request()->input('content');
        $d->save();

        Session::flash('success', 'Discussion updated');

        return redirect()->route('discussion', ['slug' => $d->slug]);
    }

}
