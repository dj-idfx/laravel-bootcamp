<?php

namespace App\Models;

use App\Observers\ChirpObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy([ChirpObserver::class])]
class Chirp extends Model
{
    use HasFactory;

    /**
     * Todo: Factory aanmaken => HasFactory is default install
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'message',
    ];

    //
    // Events are now managed by the ChirpObserver
    //
    //    /**
    //     * The events that are dispatched.
    //     *
    //     * @var array<string, mixed>
    //     */
    //    protected $dispatchesEvents = [
    //        'created' => ChirpCreated::class,
    //    ];

    /**
     * User eloquent relation
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
