<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\UserStatsService;
use Tests\Fixtures\UserFixtures;

class UserStatsServiceTest extends TestCase
{
    use RefreshDatabase; // Rollback DB after each test
    use UserFixtures; // Fixture for user

    // allows ?: null to be assigned.
    private ?UserStatsService $userStatsService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userStatsService = new UserStatsService();

        // Fixture setup: create users
        // User::factory()->create(['created_at' => now()->subDays(10)]);
        // User::factory()->create(['created_at' => now()->subDays(4)]);
        // User::factory()->create(['created_at' => now()->subDays(2)]);

        // Use Fixture from trait
        $this->createUserStatsFixture();
    }

    protected function tearDown(): void
    {
        $this->userStatsService = null;
        parent::tearDown();
    }

    public function test_count_users_since_seven_days_ago()
    {
        $count = $this->userStatsService->countUsersSince(now()->subDays(7)->toDateTimeString());
        // var_dump($count);
        // die;
        $this->assertEquals(2, $count); // Only 1 user created within last 7 days
    }
}
