<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

final class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        /** @var User $user */
        $user = Auth::user();

        $posts = $user->subreddits()
            ->whereHas('latestPost')
            ->with('latestPost')
            ->limit(10)
            ->get();

        return view('home', [
            'posts' => $posts,
        ]);
    }
}
