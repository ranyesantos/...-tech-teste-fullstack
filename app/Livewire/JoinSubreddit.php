<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use App\Models\Subreddit;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

final class JoinSubreddit extends Component
{
    public Subreddit $subreddit;

    public bool $isMember = false;

    public function mount(Subreddit $subreddit): void
    {
        $this->subreddit = $subreddit;
        $this->isMember = Auth::user()->subreddits->contains($subreddit->id);
    }

    public function toggleMembership(): void
    {
        /** @var User $user */
        $user = Auth::user();

        if ($this->isMember) {
            $user->subreddits()->detach($this->subreddit->id);
            $this->isMember = false;
        } else {
            $user->subreddits()->attach($this->subreddit->id);
            $this->isMember = true;
        }

        $this->dispatch('membership-event')->to(CommunitySidebar::class);
    }

    public function render(): View|Factory
    {
        return view('livewire.join-subreddit');
    }
}
