<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Models\User;
use Livewire\Component;

final class UsersCountNumber extends Component
{
    public $count;

    public function mount(): void
    {
        // @TODO: trocar para a contagem real de numero de usuarios
        $this->count = User::query()->count();
    }

    public function render(): Factory|View
    {
        return view('livewire.users-count-number');
    }
}
