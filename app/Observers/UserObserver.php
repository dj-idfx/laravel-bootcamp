<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;
use Illuminate\Support\Facades\Log;

class UserObserver implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        // Log the event
        Log::info('User created', ['user' => $user, 'auth_id' => auth()->id()]);
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        // Log the event
        Log::info('User updated', ['user' => $user, 'auth_id' => auth()->id()]);
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        // Log the event
        Log::info('User deleted', ['user' => $user, 'auth_id' => auth()->id()]);
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        // Log the event
        Log::info('User restored', ['user' => $user, 'auth_id' => auth()->id()]);
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        // Log the event
        Log::info('User forceDeleted', ['user' => $user, 'auth_id' => auth()->id()]);
    }
}
