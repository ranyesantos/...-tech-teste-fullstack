<?php

declare(strict_types=1);

?>

<div
    class="bg-elevation-02dp outline-light flex flex-col gap-4 rounded-lg px-8 py-4 shadow-sm outline transition-shadow hover:shadow-md"
>
    <div class="flex flex-col items-start justify-between gap-4">
        <span class="text-high text-xs">/r/{{ $fonte }}</span>

        <div class="flex flex-col gap-2">
            <h3 class="font-secondary text-high text-sm font-medium">{{ $titulo }}</h3>
            <p class="text-medium leading-xs text-base">{{ $descricao }}</p>
        </div>
    </div>
    <div class="flex flex-col items-center gap-[19px] md:flex-row">
        <div class="flex flex-row justify-between gap-[19px]">
            <span>c qt</span>
            <span>vote</span>
            <span>downvote</span>
        </div>
        <span class="text-high text-2xs text-center font-semibold">Responder</span>
    </div>
</div>

<?php
