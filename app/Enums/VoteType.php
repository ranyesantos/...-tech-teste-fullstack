<?php

declare(strict_types=1);

namespace App\Enums;

enum VoteType: string
{
    case Upvote = 'upvote';
    case Downvote = 'downvote';
}
