<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

final class PostsCountNumber extends Component
{
    public $count;

    public string $imageClass = '';

    public function mount(): void
    {
        /** @var User $user */
        $user = Auth::user();
        $this->count = $user
            ->subreddits()
            ->withCount('posts')
            ->count();
    }

    public function render(): View
    {
        return view('livewire.posts-count-number');
    }
}
