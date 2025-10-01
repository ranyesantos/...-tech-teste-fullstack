<?php

declare(strict_types=1);

?>
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

    <!-- card quantidade de posts -->
    <x-ui.card
        class="from-lime-primary/10 to-lime-primary/0 border-lime-primary/32 rounded-xl border bg-gradient-to-r"
        image="assets/building-dark.svg"
        image-class="bg-lime-primary"
        description="Quantidade de posts"
    >
        <livewire:posts-count-number />
    </x-ui.card>

    <!-- card quantidade de replies -->
    <x-ui.card
        class="from-brand-primary/10 to-brand-primary/0 border-indigo-primary/32 rounded-xl border bg-gradient-to-r"
        image="assets/building.svg"
        image-class="bg-indigo-primary"
        description="Quantidade de replies"
    >
        <livewire:replies-count-number />
    </x-ui.card>
</span>
<?php 
