<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ThingUserRepositoryInterface
{
    /**
     * Get users prises by status.
     *
     * @param int $status
     * @param int $limit
     * @return Collection
     */
    public function getThingsByStatus(int $status, int $limit): Collection;
}
