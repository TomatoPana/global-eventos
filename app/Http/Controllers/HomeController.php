<?php

namespace App\Http\Controllers;

use App\Models\Hashtag;
use App\Models\Post;
use App\Models\PostHasHashtag;
use App\Models\PostHasHastag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function search(string $search)
    {
        /** @var Collection<Hashtag> */
        $hashtags = Hashtag::where('hashtag', 'ilike', "%$search%")->get();
        /** @var Collection<Post> */
        $posts = Post::where('title', 'ilike', "%$search%")
            ->orWhere('description', 'ilike', "%$search%")
            ->orWhere('body', 'ilike', "%$search%")
            ->get();

        return view('search', [
            'hashtags' => $hashtags,
            'posts' => $posts,
        ]);
    }

    public function index()
    {
        $items = collect(DB::select('select distinct hashtag_id from post_has_hashtags'))
            ->map(fn($item) => $item->hashtag_id);
        $hashtags = Hashtag::whereIn('id', $items->toArray())->limit(6)->get();
        return view('home', [
            'hashtags' => $hashtags,
            'posts' => Post::orderBy('id', 'desc')->get(),
        ]);
    }
}
