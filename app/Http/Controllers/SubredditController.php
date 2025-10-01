<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Subreddit;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final class SubredditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): void
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): void
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): void
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $name): View
    {
        $subreddit = Subreddit::query()->where('name', $name)
            ->with('posts')
            ->firstOrFail();

        return view('subreddits.show', [
            'subreddit' => $subreddit,
            'users_count' => $subreddit->withCount('users')->count(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): void
    {
        //
    }
}
