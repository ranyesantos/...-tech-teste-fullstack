<?php

declare(strict_types=1);

?>
<div class="flex items-center gap-[19px]">
    <button wire:click="upvote" wire:click="$refresh">
        @if ($voteType === 'upvote')
            <img src="/assets/upvoted.svg" alt="" />
        @else
            @if ($first)
                <img src="/assets/thumbs-up-dark.svg" class="dark:invert" alt="" />
            @else
                <img src="/assets/thumbs-up-gray.svg" class="dark:invert" alt="" />
            @endif
        @endif
    </button>

    <button wire:click="downvote">
        @if ($voteType === 'downvote')
            <img src="/assets/downvoted.svg" alt="" />
        @else
            @if ($first)
                <img src="/assets/thumbs-down-dark.svg" class="dark:invert" alt="" />
            @else
                <img src="/assets/thumbs-down-gray.svg" class="dark:invert" alt="" />
            @endif
        @endif
    </button>
</div>
<?php 
