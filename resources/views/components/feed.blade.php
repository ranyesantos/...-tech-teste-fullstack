<?php

declare(strict_types=1);

?>

<section id="feed" class="flex w-[100%] flex-col gap-9">
    <header class="flex flex-col gap-8">
        <div class="flex flex-col gap-4">
            <h1 class="font-secondary text-md text-high leading-[100%] font-semibold">
                Olá,
                <span class="text-indigo-primary leading-[100%] font-semibold">{{ Auth::user()->name }}</span>
            </h1>
            <span class="text-medium text-xs">Confira as estatísticas das comunidades que você segue</span>
        </div>

        <!-- status cards -->
        <span class="flex flex-col justify-between gap-8 md:flex-row">
            <!-- card quantidade de usuarios -->
            <x-ui.card
                class="from-brand-primary/10 to-brand-primary/0 border-indigo-primary/32 rounded-xl border bg-gradient-to-r"
                image="assets/building.svg"
                image-class="bg-brand-primary"
                description="Quantidade de usuários"
            >
                <livewire:users-count-number />
            </x-ui.card>

            <x-ui.card
                class="from-lime-primary/10 to-lime-primary/0 border-lime-primary/32 rounded-xl border bg-gradient-to-r"
                image="assets/building-dark.svg"
                image-class="bg-lime-primary"
                description="Quantidade de posts"
            >
                <livewire:posts-count-number />
            </x-ui.card>

            <x-ui.card
                class="from-brand-primary/10 to-brand-primary/0 border-indigo-primary/32 rounded-xl border bg-gradient-to-r"
                image="assets/building.svg"
                image-class="bg-indigo-primary"
                description="Quantidade de replies"
            >
                <livewire:replies-count-number />
            </x-ui.card>
        </span>
    </header>

    <div class="outline-light bg-elevation-01dp min-h-screen w-[100%] rounded-[20px] p-8 outline">
        <h1 class="text-high text-md font-semibold">Veja os últimos posts das comunidades que você segue</h1>
        {{ $slot }}
    </div>
</section>

<?php
