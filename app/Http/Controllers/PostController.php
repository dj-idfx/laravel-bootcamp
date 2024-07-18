<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @throws AuthorizationException
     */
    public function index(Request $request): View
    {
        Gate::authorize('viewAny', Post::class);

        $posts = Post::with('user')
            ->when($request->has('trash'), function ($query) {
                $query->onlyTrashed();
            })
            ->latest()
            ->get();

        // Todo: paginate? https://laravel.com/docs/pagination

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     */
    public function create(): View
    {
        Gate::authorize('create', Post::class);

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @throws AuthorizationException
     */
    public function store(StorePostRequest $request): RedirectResponse
    {
        Gate::authorize('create', Post::class);

        $post = $request->user()->posts()->create($request->validated());

        return redirect(route('posts.show', $post));
    }

    /**
     * Display the specified resource.
     *
     * @throws AuthorizationException
     */
    public function show(Post $post): View
    {
        Gate::authorize('view', $post);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @throws AuthorizationException
     */
    public function edit(Post $post): View
    {
        Gate::authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @throws AuthorizationException
     */
    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        Gate::authorize('update', $post);

        $post->update($request->validated());

        return redirect(route('posts.show', $post));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws AuthorizationException
     */
    public function destroy(Post $post): RedirectResponse
    {
        Gate::authorize('delete', $post);

        $post->delete();

        return redirect(route('posts.index'));
    }

    /**
     * Restore the specified resource to storage.
     *
     * @throws AuthorizationException
     */
    public function restore(Post $post): RedirectResponse
    {
        Gate::authorize('restore', $post);

        $post->restore();

        return redirect(route('posts.show', $post));
    }

    /**
     * Permanently delete the specified resource from storage.
     *
     * @throws AuthorizationException
     */
    public function delete(Post $post): RedirectResponse
    {
        Gate::authorize('forceDelete', $post);

        $post->forceDelete();

        return redirect(route('posts.index'));
    }
}
