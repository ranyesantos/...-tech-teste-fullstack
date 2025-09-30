<?php

declare(strict_types=1);

?>

<aside
    class="bg-elevation-01dp outline-light fixed top-0 left-0 z-99 h-fit w-[100%] overflow-y-auto p-8 outline md:h-screen md:w-[352px]"
>
    <div class="flex flex-col gap-8">
        <a href="/" class="flex flex-row items-center justify-between">
            <img src="/assets/logo-black.svg" class="h-[35px] w-[110px] dark:invert" alt="logo 3 pontos" />
            <img src="/assets/close.svg" class="h-3 w-3 dark:invert" alt="icone para diminuir a sidebar" />
        </a>

        <div class="hidden flex-col gap-11 p-4 md:flex">
            <a href="/" class="flex flex-row items-center gap-2">
                <img src="/assets/home.svg" class="h-[13px] w-[13px]" sizes="24px" alt="home" />
                <span class="text-medium font-bold">Home</span>
            </a>

            <div class="flex flex-col gap-4">
                <span class="text-medium font-semibold">Minhas comunidades</span>

                @foreach ($subreddits as $subreddit)
                    <button wire:click="selectSubreddit('{{ $subreddit['name'] }}')" class="w-full text-left">
                        <x-community-card
                            :title="$subreddit['display_name']"
                            :users-count="$subreddit['subscriber_count']"
                            :selected="$subreddit['name'] == $selectedSubreddit"
                        />
                    </button>
                @endforeach
            </div>
        </div>
    </div>
</aside>

<?php
