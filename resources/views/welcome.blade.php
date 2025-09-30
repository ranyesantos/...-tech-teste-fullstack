<?php

declare(strict_types=1);

?>

<x-layouts.guest>
    <main class="pt-[64px]">
        <div class="flex justify-between p-10">
            @if (isset($subreddit))
                <h1>oiiiiiiiiiiii</h1>
            @else
                <x-feed>
                    <h1>feed</h1>
                    <h1>feed</h1>
                </x-feed>
            @endif
        </div>
    </main>
</x-layouts.guest>

<?php
