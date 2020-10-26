<?php


namespace App\Repositories;


use App\Models\Thing;
use App\Repositories\Interfaces\ThingRepositoryInterface;
use Ramsey\Collection\Collection;

class ThingRepository implements ThingRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function getThing(int $id): Thing
    {
        return Thing::find($id);
    }

    /**
     * @inheritDoc
     */
    public function getAvailableThingsAmount(): int
    {
        return Thing::all()
            ->sum('amount');
    }

    /**
     * @inheritDoc
     */
    public function getRandomThingId(): int
    {
        return Thing::inRandomOrder()
            ->where('amount', '>', '0')
            ->first()
            ->id;
    }

    public function getThingsByStatus(int $status, int $limit): Collection
    {

    }
}
