<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

final class UsersCountNumber extends Component
{
    public $count;

    public function mount(): void
    {
        // @TODO: trocar para a contagem real de numero de usuarios
        /** @var User $user */
        $user = Auth::user();
        $this->count = $user
            ->subreddits()
            ->withCount('users')
            ->count();
    }

    public function render(): View
    {
        return view('livewire.users-count-number');
    }
}
