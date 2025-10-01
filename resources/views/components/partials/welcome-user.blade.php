<?php

declare(strict_types=1);

?>
<div class="flex flex-col gap-4">
    <h1 class="font-secondary text-md text-high leading-[100%] font-semibold">
        Olá,
        <span class="text-indigo-primary leading-[100%] font-semibold">{{ Auth::user()->name }}</span>
    </h1>
    <span class="text-medium text-xs">Confira as estatísticas das comunidades que você segue</span>
</div>
<?php 
