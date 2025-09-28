<?php

declare(strict_types=1);

?>

@props([
    'emoji',
    'title',
    'usersCount',
    'selected' => false,
])

<div
    class="{{ $selected ? 'from-indigo-primary/10 text-high to-indigo-primary/0 border-indigo-primary/32 rounded-xl border bg-gradient-to-r font-bold' : 'text-medium' }} mb-2 flex h-[56px] w-[288px] cursor-pointer items-center justify-between rounded p-3"
>
    <!-- Emoji + Título -->
    <div class="flex items-center gap-2">
        <img src="assets/Ellipse 3.png" class="h-[16px] w-[16px] rounded-full" sizes="24px" alt="home" />
        <span class="text-base font-bold">{{ $title }}</span>
    </div>

    <!-- Número de posts -->
    <x-ui.badge class="bg-indigo-primary/16 text-high border-indigo-primary/32 border text-xs">
        {{ $usersCount }}
    </x-ui.badge>
</div>

<?php
