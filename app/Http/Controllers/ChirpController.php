<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateChirpRequest;
use App\Http\Requests\UpdateChirpRequest;
use App\Models\Chirp;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @throws AuthorizationException
     */
    public function index(): View
    {
        Gate::authorize('viewAny', Chirp::class);

        return view('chirps.index', [
            'chirps' => Chirp::with('user')->latest()->get(),
        ]);

        /* todo: paginate? https://laravel.com/docs/pagination */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     */
    public function create(): RedirectResponse
    {
        Gate::authorize('create', Chirp::class);

        // no view -> redirect to index
        return redirect(route('chirps.index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @throws AuthorizationException
     */
    public function store(CreateChirpRequest $request): RedirectResponse
    {
        Gate::authorize('create', Chirp::class);

        $request->user()->chirps()->create($request->validated());

        return redirect(route('chirps.index'));
    }

    /**
     * Display the specified resource.
     *
     * @throws AuthorizationException
     */
    public function show(Chirp $chirp): RedirectResponse
    {
        Gate::authorize('view', $chirp);

        // no view -> redirect to index
        return redirect(route('chirps.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @throws AuthorizationException
     */
    public function edit(Chirp $chirp): View
    {
        Gate::authorize('update', $chirp);

        return view('chirps.edit', [
            'chirp' => $chirp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @throws AuthorizationException
     */
    public function update(UpdateChirpRequest $request, Chirp $chirp): RedirectResponse
    {
        Gate::authorize('update', $chirp);

        $chirp->update($request->validated());

        return redirect(route('chirps.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws AuthorizationException
     */
    public function destroy(Chirp $chirp): RedirectResponse
    {
        Gate::authorize('delete', $chirp);

        $chirp->delete();

        return redirect(route('chirps.index'));
    }
}
