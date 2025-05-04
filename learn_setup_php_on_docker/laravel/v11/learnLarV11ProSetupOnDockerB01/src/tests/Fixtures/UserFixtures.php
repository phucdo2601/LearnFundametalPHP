<?php

namespace Tests\Fixtures;

use App\Models\User;

trait UserFixtures
{
    protected function createUserStatsFixture(): void
    {
        // Fixture setup: create users
        User::factory()->create(['created_at' => now()->subDays(10)]);
        User::factory()->create(['created_at' => now()->subDays(4)]);
        User::factory()->create(['created_at' => now()->subDays(2)]);
    }
}
