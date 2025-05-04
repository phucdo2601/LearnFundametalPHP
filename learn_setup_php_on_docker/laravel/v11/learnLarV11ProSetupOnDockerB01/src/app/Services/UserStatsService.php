<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserStatsService
{
    public function countUsersSince(string $date): int
    {
        $query = DB::table('users')
            ->where('created_at', '>=', $date)->count();
        return $query;
    }
}
