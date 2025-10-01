<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Renderless;
use Livewire\Component;

final class CommunitySidebar extends Component
{
    public $subreddits = [];

    public $usersCount = 0;

    public $selectedSubreddit;

    #[On('membership-event')]
    public function mount($selectedSubreddit = null, $usersCount = 0): void
    {
        /** @var User $user */
        $user = Auth::user();
        $userSubreddits = $user->subreddits();
        $this->subreddits = $userSubreddits->get();
        $this->usersCount = $userSubreddits->withCount('users')->count();

        $this->selectedSubreddit = $selectedSubreddit;
    }

    #[Renderless]
    public function selectSubreddit($name): Redirector|RedirectResponse
    {
        $this->selectedSubreddit = $name;

        return redirect()->route('subreddit.show', ['name' => $name]);
    }

    public function render(): View
    {
        return view('livewire.sidebar.community-sidebar');
    }
}
