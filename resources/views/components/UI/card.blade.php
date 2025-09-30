<?php

declare(strict_types=1);

?>
<div {{ $attributes->merge(['class' => 'shadow p-8 flex w-[320px] h-[108px] rounded-2xl items-center gap-2']) }}>
    <!-- Image -->
    <div class="{{ $imageClass }} flex h-11 w-11 items-center justify-center rounded-sm">
        <img src="{{ $image }}" alt="icon" class="h-4 w-4 object-cover" />
    </div>

    <!-- Content -->
    <div>
        <!-- Description -->
        <div class="text-medium text-3xs">{{ $description }}</div>
        <!-- Number -->
        <div class="text-high text-xl font-semibold">{{ $slot }}</div>
    </div>
</div>
<?php 
