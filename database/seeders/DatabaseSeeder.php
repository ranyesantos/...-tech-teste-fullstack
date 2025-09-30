<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Subreddit;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        User::query()->create([
            'name' => 'Normal User',
            'email' => 'user@example.com',
            'at_sign' => 'dead',
            'password' => Hash::make('password'),
        ]);

        User::factory(10)->create();
        Subreddit::factory(10)->create();
        Post::factory(10)->create();

        $users = User::all();
        $subreddits = Subreddit::all();
        foreach ($users as $user) {
            $randomSubreddits = $subreddits->random(random_int(1, 3));

            $user->subreddits()->attach($randomSubreddits);
        }

    }
}
