<?php

declare(strict_types=1);

?>

<section id="feed" class="flex w-[100%] flex-col gap-9">
    <header class="flex flex-col gap-8">
        {{ $header ?? '' }}
    </header>

    <div
        class="outline-light bg-elevation-01dp flex h-fit min-h-fit w-[100%] flex-col gap-8 rounded-[20px] p-8 outline"
    >
        <h1 class="text-high text-md font-semibold">{{ $title }}</h1>
        {{ $content }}
    </div>
</section>

<?php
