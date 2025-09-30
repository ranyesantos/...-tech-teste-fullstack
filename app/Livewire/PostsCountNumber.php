<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Livewire\Component;

final class PostsCountNumber extends Component
{
    public $count;

    public string $imageClass = '';

    public function mount(): void
    {
        // @TODO: trocar para a contagem real de numero de posts
        $this->count = 80;
    }

    public function render(): View|Factory
    {
        return view('livewire.posts-count-number');
    }
}
