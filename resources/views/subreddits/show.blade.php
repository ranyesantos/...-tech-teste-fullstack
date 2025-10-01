<?php

declare(strict_types=1);

?>

<x-layouts.app>
    <div class="flex w-[100%] flex-col gap-11">
        <!-- post image -->
        <div></div>

        <!-- community details -->
        <div class="flex w-[100%] flex-col items-center justify-between gap-3 md:flex-row md:gap-0">
            <div class="flex flex-col items-start md:flex-row md:items-center">
                <!-- emoji -->
                <div class="flex h-fit w-fit items-start justify-start rounded-full">
                    <span class="text-[64px]">😀</span>
                </div>

                <!-- infos -->
                <div class="flex flex-col gap-3">
                    <h3 class="text-high font-secondary text-md leading-xs font-semibold">
                        /r/ {{ $subreddit->name }}
                    </h3>
                    <p class="text-medium leading-xs text-base font-medium">{{ $subreddit->description }}</p>

                    <div class="flex flex-col gap-8 md:flex-row">
                        <span class="flex flex-row items-center gap-3">
                            <img src="/assets/users.svg" class="h-5 w-5 dark:invert" />
                            <p class="text-medium leading-xs font-medium">{{ $users_count }} membros</p>
                        </span>

                        <span class="flex flex-row items-center gap-3">
                            <img src="/assets/users.svg" class="h-5 w-5 dark:invert" />
                            <p class="text-medium leading-xs font-medium">
                                Criado em {{ $subreddit->created_at->format('M, Y') }}
                            </p>
                        </span>
                    </div>
                </div>
            </div>

            <!-- actions -->
            <div class="w-[100%] md:w-20">
                <livewire:join-subreddit :subreddit="$subreddit" />
            </div>
        </div>

        <!-- community posts -->
        <div>
            <x-feed title="Veja todos os posts da comunidade">
                <x-slot name="content">
                    @if ($subreddit->posts->isNotEmpty())
                        @foreach ($subreddit->posts as $post)
                            <x-ui.post-card
                                :id="$post->id"
                                :titulo="$post->title"
                                :descricao="$post->content"
                                :user="$post->user"
                                :post="$post"
                                :first="$loop->first"
                                class="{{ $loop->first ? 'bg-elevation-02dp' : 'bg-elevation-01dp' }}"
                            />
                        @endforeach
                    @else
                        <img src="https://http.cat/204" alt="http cat no-content" class="rounded-lg shadow-md" />
                    @endif
                </x-slot>
            </x-feed>
        </div>
    </div>
</x-layouts.app>
