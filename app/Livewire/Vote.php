<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Enums\VoteType;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

final class Vote extends Component
{
    public $votable;

    public $hasVoted;

    public $voteType;

    public $userId;

    public $first;

    public function mount($votable, $first = false): void
    {
        $this->votable = $votable;
        $this->userId = Auth::user()->id;
        $this->first = $first;
        $vote = $this->votable->votes()->where('user_id', $this->userId)->first();
        $this->hasVoted = (bool) $vote;
        $this->voteType = $vote?->type;
    }

    public function upvote(): void
    {
        $this->vote(VoteType::Upvote->value);
    }

    public function downvote(): void
    {
        $this->vote(VoteType::Downvote->value);
    }

    public function undo(): void
    {
        $this->votable->votes()->where('user_id', $this->userId())->delete();
        $this->hasVoted = false;
        $this->voteType = null;
    }

    public function render(): View
    {
        return view('livewire.vote');
    }

    private function vote(string $type): void
    {
        $existingVote = $this->votable->votes()
            ->where('user_id', $this->userId)
            ->first();

        if ($existingVote) {
            if ($existingVote->type === $type) {
                $existingVote->delete();
                $this->hasVoted = false;
                $this->voteType = null;

                return;
            }

            $existingVote->update(['type' => $type]);

        } else {
            $this->votable->votes()->create([
                'user_id' => $this->userId,
                'type' => $type,
            ]);
        }

        $this->hasVoted = true;
        $this->voteType = $type;
    }
}
