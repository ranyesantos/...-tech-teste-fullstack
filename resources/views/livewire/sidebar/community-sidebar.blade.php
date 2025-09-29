<?php

declare(strict_types=1);

?>

<aside class="bg-elevation-01dp fixed top-0 left-0 h-screen w-[352px] overflow-y-auto p-8">
    <div class="flex flex-col gap-8">
        <div class="flex flex-row justify-between">
            <img src="assets/logo-black.svg " class="h-[35px] w-[110px]" alt="logo 3 pontos" />
            <img src="assets/panels-top-left.svg" class="h-[32px] w-[32px]" alt="icone para diminuir a sidebar" />
        </div>

        <div class="flex flex-col gap-11 p-4">
            <button class="flex flex-row items-center gap-2">
                <img src="assets/home.svg" class="h-[13px] w-[13px]" sizes="24px" alt="home" />
                <span class="text-medium font-bold">Home</span>
            </button>

            <div class="flex flex-col gap-4">
                <span class="text-medium font-semibold">Minhas comunidades</span>

                @foreach ($communities as $community)
                    <button wire:click="selectCommunity({{ $community['id'] }})" class="w-full text-left">
                        <x-community-card
                            :emoji="$community['emoji']"
                            :title="$community['title']"
                            :users-count="$community['usersCount']"
                            :selected="$community['id'] == $selectedCommunityId"
                        />
                    </button>
                @endforeach
            </div>
        </div>
    </div>
</aside>

<?php
