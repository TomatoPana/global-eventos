<?php

namespace App\Http\Controllers;

use App\Models\Hashtag;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

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
        return view('home');
    }
}
