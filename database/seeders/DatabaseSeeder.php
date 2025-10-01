<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Subreddit;
use App\Models\User;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (app()->isLocal()) {
            User::factory()->admin()->create();
        }

        $subreddits = Subreddit::factory(5)->create();

        $users = User::factory(20)->create();

        foreach ($users as $user) {
            $randomSubreddits = $subreddits->random(random_int(1, 3));
            $user->subreddits()->attach($randomSubreddits);
        }

        foreach ($subreddits as $subreddit) {
            $members = $subreddit->users;
            $posterCount = min(5, $members->count());

            $members->random($posterCount)->each(function ($user) use ($subreddit): void {
                Post::factory(random_int(1, 3))->create([
                    'subreddit_id' => $subreddit->id,
                    'user_id' => $user->id,
                ]);
            });
        }

        $posts = Post::all();
        foreach ($posts as $post) {
            $voters = $users->random(random_int(1, 5));
            foreach ($voters as $user) {
                $post->votes()->create([
                    'user_id' => $user->id,
                    'type' => ['upvote', 'downvote'][random_int(0, 1)],
                ]);
            }
        }
    }
}
