<?php

namespace App\Components\Lottery\Prizes;

use App\Components\Lottery\Prizes\Types\BonusPrize;
use App\Components\Lottery\Prizes\Types\MoneyPrize;
use App\Components\Lottery\Prizes\Types\ThingPrize;

class PrizeFactory
{
    /** @var int $userId User ID. */
    private $userId;

    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    /**
     * Get bonus prize.
     * @return BonusPrize
     */
    public function getBonusPrize(): BonusPrize
    {
        return new BonusPrize($this->userId);
    }

    /**
     * Get money prize.
     *
     * @return MoneyPrize
     */
    public function getMoneyPrize(): MoneyPrize
    {
        return new MoneyPrize($this->userId);
    }

    /**
     * Get thing prize.
     *
     * @return ThingPrize
     */
    public function getThingPrize(): ThingPrize
    {
        return new ThingPrize($this->userId);
    }
}
