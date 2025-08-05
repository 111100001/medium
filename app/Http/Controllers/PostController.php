<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\PostCreateRequest;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $query = Post::with(['user', 'media'])->withCount('claps')->latest();

        // Check if we should show only followed users' posts
        $showFollowing = request()->get('following') === 'true';

        if ($user && $showFollowing) {
            $ids = $user->following()->pluck('users.id');
            $query->whereIn('user_id', $ids);
        }

        $posts = $query->paginate(10);
        return view('post.index', compact('posts'));
    }

    public function following()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('dashboard');
        }

        $ids = $user->following()->pluck('users.id');
        $posts = Post::with(['user', 'media'])
            ->withCount('claps')
            ->whereIn('user_id', $ids)
            ->latest()
            ->paginate(10);

        return view('post.index', compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('post.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request)
    {
        $data = $request->validated();
        /**@var \Illuminate\Http\UploadedFile $image */

        // $image = $data['image'];
        // unset($data['image']);
        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($data['title']) . '-' . Str::random(6);

        // $imagePath = $image->store('posts', 'public');
        // $data['image'] = $imagePath;

        $post = Post::create($data);

        $post->addMediaFromRequest('image')
            ->toMediaCollection();

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $username, Post $post) //the username is needed to resolve the route but in the ide it shows as unused
    {
        return view('post.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    public function category(Category $category)
    {

        $posts = $category->posts()->with(['user', 'media'])->withCount('claps')->latest()->simplePaginate(5);
        return view('post.index', compact('posts'));
    }
}
