<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tweets = auth()->user()->timeline();

        return view('tweets.index', [
            "tweets" => $tweets
        ]);
    }

    public function store()
    {
        $valid = request()->validate([
            "body" => "required|max:255",
        ]);

        Tweet::create([
            "body" => $valid["body"],
            "user_id" => auth()->id()
        ]);

        return redirect("/");
    }

    public function delete(Tweet $tweet)
    {
        $this->authorize("delete", $tweet);
        dd("echo tem permicao");

        $tweet->delete();

        return back();
    }

    public function like(Tweet $tweet)
    {
        $tweet->like();

        return back();
    }

    public function dislike(Tweet $tweet)
    {
        $tweet->dislike();

        return back();
    }
}
