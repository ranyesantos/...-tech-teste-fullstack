<?php

declare(strict_types=1);

?>

<header
    class="bg-elevation-01dp outline-light dark:outline-dark fixed top-0 z-98 hidden h-16 w-full flex-row justify-between p-1 outline md:flex md:flex-1"
>
    <h1 class="text-blue-400">navbar</h1>
    <div class="flex items-center justify-center pe-3">
        <button id="toggle-dark" class="px-4 py-2">
            <img src="/assets/theme-mode.svg" class="h-5 w-5 dark:invert" alt="" />
        </button>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">
                <span class="text-high">Logout</span>
            </button>
        </form>
    </div>
</header>

<?php
