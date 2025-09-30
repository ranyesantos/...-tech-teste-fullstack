<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Subreddit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Livewire\Attributes\Renderless;
use Livewire\Component;

final class CommunitySidebar extends Component
{
    public $subreddits = [];

    public $selectedSubreddit;

    public function mount($selectedSubreddit = null): void
    {
        // @TODO alterar para subreddits que o usuario faz parte
        $this->subreddits = Subreddit::all();

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
