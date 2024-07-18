<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;
use Illuminate\Support\Facades\Log;

class PostObserver implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        // Log the event
        Log::info('Post created', ['post' => $post, 'auth_id' => auth()->id()]);
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        // Log the event
        Log::info('Post updated', ['post' => $post, 'auth_id' => auth()->id()]);
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        // Log the event
        Log::info('Post deleted', ['post' => $post, 'auth_id' => auth()->id()]);
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        // Log the event
        Log::info('Post restored', ['post' => $post, 'auth_id' => auth()->id()]);
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        // Log the event
        Log::info('Post forceDeleted', ['post' => $post, 'auth_id' => auth()->id()]);
    }
}
