<?php

declare(strict_types=1);

?>
<div>
    <button
        wire:click="toggleMembership"
        class="text-dark dark:text-high outline-light bg-elevation-surface h-[100%] w-[100%] rounded-lg px-4 py-2 font-semibold outline transition"
    >
        {{ $isMember ? 'Entrou' : 'Entrar' }}
    </button>
</div>
<?php 
