<?php

namespace App\Repositories\Interfaces;

use App\Models\Thing;
use Ramsey\Collection\Collection;

interface ThingRepositoryInterface
{
    /**
     * Get thing by ID.
     *
     * @param int $id Thing ID.
     * @return Thing
     */
    public function getThing(int $id): Thing;

    /**
     * Get number of available things.
     *
     * @return int
     */
    public function getAvailableThingsAmount(): int;

    /**
     * Get random thing.
     *
     * @return int
     */
    public function getRandomThingId(): int;
}
