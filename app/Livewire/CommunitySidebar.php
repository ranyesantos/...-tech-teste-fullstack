<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

final class CommunitySidebar extends Component
{
    public $communities = [];

    public $selectedCommunityId;

    protected $listeners = ['communitySelected' => 'selectCommunity'];

    public function mount($communities = null, $selectedCommunityId = null): void
    {
        $this->communities = $communities ?? [
            ['id' => 1, 'emoji' => '😀', 'title' => 'UI/UX', 'usersCount' => '+999'],
            ['id' => 2, 'emoji' => '😂', 'title' => 'Oi', 'usersCount' => 231],
        ];
        $this->selectedCommunityId = $selectedCommunityId;
    }

    public function selectCommunity($id): void
    {
        $this->selectedCommunityId = $id;
    }

    public function render(): View|Factory
    {
        return view('livewire.sidebar.community-sidebar');
    }
}
