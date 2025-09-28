<?php

declare(strict_types=1);

namespace Database\Seeders;

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
    }
}
