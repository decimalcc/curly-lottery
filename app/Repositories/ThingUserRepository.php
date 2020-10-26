<?php

namespace App\Repositories;

use App\Models\ThingUser;
use App\Repositories\Interfaces\ThingUserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;


class ThingUserRepository implements ThingUserRepositoryInterface
{
    public function getThingsByStatus(int $status, int $limit): Collection
    {
        return ThingUser::where('status', $status)->take($limit)->get();
    }
}
