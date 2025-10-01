<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

final class RepliesCountNumber extends Component
{
    public $count;

    public function mount(): void
    {
        // @TODO: trocar para a contagem real de numero de replies
        $this->count = 30;
    }

    public function render(): View
    {
        return view('livewire.replies-count-number');
    }
}
