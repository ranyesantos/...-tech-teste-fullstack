<?php

declare(strict_types=1);

?>

<span
    {{
        $attributes->merge([
            'class' => 'inline-flex items-center px-4 py-1 rounded-full font-semibold font-secondary leading-default min-w-[70px] justify-center',
        ])
    }}
>
    {{ $slot }}
</span>

<?php
