<?php

declare(strict_types=1);

?>

<div
    {{ $attributes->merge(['class' => 'outline-light flex flex-col gap-4 rounded-lg px-8 py-4 shadow-sm outline transition-shadow hover:shadow-md']) }}
>
    <div class="flex flex-col items-start justify-between gap-4">
        @if (isset($source))
            <span class="text-high text-xs">/r/{{ $source }}</span>
        @elseif (isset($user))
            <div class="flex flex-row items-center justify-center gap-2">
                <p class="text-high leading-xs hidden text-xs font-bold md:inline">{{ $user->name }}</p>

                <span class="flex flex-row items-center justify-center">
                    <p class="text-medium text-xs">@</p>
                    <p class="text-medium text-xs">{{ $user->at_sign }}</p>
                </span>

                <p class="text-2xs text-medium mb-[0.6px]">{{ $post->created_at->format('M, Y') }}</p>
            </div>
        @endif

        <div class="flex flex-col gap-2">
            <h3 class="font-secondary text-high text-sm font-medium">{{ $titulo }}</h3>
            <p class="text-medium leading-xs text-base">{{ $descricao }}</p>
        </div>
    </div>
    <div class="flex flex-col items-center gap-[19px] md:flex-row">
        <div class="flex flex-row justify-between gap-[19px]">
            <img src="/assets/comment.svg" />

            <livewire:vote :votable="$post" :first="$first" />
        </div>
        <span class="text-high text-2xs text-center font-semibold">Responder</span>
    </div>
</div>

<?php
