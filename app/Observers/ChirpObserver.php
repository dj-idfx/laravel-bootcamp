<?php

namespace App\Observers;

use App\Events\ChirpCreated;
use App\Models\Chirp;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;
use Illuminate\Support\Facades\Log;

class ChirpObserver implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the Chirp "created" event.
     */
    public function created(Chirp $chirp): void
    {
        // Log the event
        Log::info('Chirp created', ['chirp' => $chirp, 'auth_id' => auth()->id()]);

        // Dispatch the ChirpCreated event
        ChirpCreated::dispatch($chirp); // This code equals to: event(new ChirpCreated($chirp));

        /**
         * TODO: move the send mail From listener to here + don't dispatch the ChirpCreated
         * (+ listener SendChirpNotification not needed anymore)? (Use Jobs / Actions for queuing?
         */
    }

    /**
     * Handle the Chirp "updated" event.
     */
    public function updated(Chirp $chirp): void
    {
        // Log the event
        Log::info('Chirp updated', ['chirp' => $chirp, 'auth_id' => auth()->id()]);
    }

    /**
     * Handle the Chirp "deleted" event.
     */
    public function deleted(Chirp $chirp): void
    {
        // Log the event
        Log::info('Chirp deleted', ['chirp' => $chirp, 'auth_id' => auth()->id()]);
    }

    /**
     * Handle the Chirp "restored" event.
     */
    public function restored(Chirp $chirp): void
    {
        // Log the event
        Log::info('Chirp restored', ['chirp' => $chirp, 'auth_id' => auth()->id()]);
    }

    /**
     * Handle the Chirp "force deleted" event.
     */
    public function forceDeleted(Chirp $chirp): void
    {
        // Log the event
        Log::info('Chirp forceDeleted', ['chirp' => $chirp, 'auth_id' => auth()->id()]);
    }
}
