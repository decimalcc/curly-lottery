<?php

namespace App\Components\Lottery\Prizes\Types;

use App\Components\Lottery\Prizes\Types\Base\AbstractPrize;
use App\Models\Thing;
use App\Repositories\ThingRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;

class ThingPrize extends AbstractPrize
{
    private $value;

    /**
     * @inheritDoc
     */
    public function initialize(): void
    {
        $userRepository = new UserRepository();
        $thingRepository = new ThingRepository();

        $user = $userRepository->getUser($this->userId);
        $thingId = $thingRepository->getRandomThingId();

        $this->value = $thingRepository->getThing($thingId)->name;

        DB::transaction(function () use ($thingId, $user) {
            $thing = Thing::find($thingId);
            $thing->amount -= 1;
            $thing->save();

            $user->things()->attach($thingId);
            $user->save();
        });

        DB::commit();
    }

    /**
     * @inheritDoc
     */
    public function getTypeName(): string
    {
        return 'Thing';
    }

    /**
     * @inheritDoc
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
