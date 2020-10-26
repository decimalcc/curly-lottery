<?php

namespace App\Components\Lottery;

use App\Components\Lottery\Prizes\PrizeFactory;
use App\Components\Lottery\Prizes\Types\Base\AbstractPrize;
use App\Repositories\Interfaces\SettingsRepositoryInterface;
use App\Repositories\ThingRepository;

class Lottery
{
    private $userId;

    private $bonusChance;
    private $moneyChance;
    private $thingChance;
    private $moneyAmount;

    /**
     * Lottery constructor.
     *
     * @param int $userId
     * @param SettingsRepositoryInterface $settingsRepository
     */
    public function __construct(int $userId, SettingsRepositoryInterface $settingsRepository)
    {
        $this->userId = $userId;

        $this->bonusChance = $settingsRepository->getItem('bonus_chance');
        $this->moneyChance = $settingsRepository->getItem('money_chance');
        $this->thingChance = $settingsRepository->getItem('thing_chance');
        $this->moneyAmount = $settingsRepository->getItem('money_amount');
    }

    /**
     * Get random prise.
     *
     * @return AbstractPrize
     */
    public function getPrise(): AbstractPrize
    {
        $prizeRepository = new ThingRepository();
        $prizesAmount = $prizeRepository->getAvailableThingsAmount();

        $prizeFactory = new PrizeFactory($this->userId);
        $randomNumber = $this->getRandomNumber();

        if (($randomNumber -= $this->bonusChance) < 0) {
            return $prizeFactory->getBonusPrize();
        } elseif (($randomNumber -= $this->moneyChance) < 0 && $this->moneyAmount > 0) {
            return $prizeFactory->getMoneyPrize();
        } elseif (($randomNumber -= $this->thingChance) < 0 && $prizesAmount > 0) {
            return $prizeFactory->getThingPrize();
        }

        return $prizeFactory->getBonusPrize();
    }

    /**
     * Get random prise type.
     *
     * @return string
     */
    private function getRandomNumber(): string
    {
        return rand(1, 10) * 10;
    }
}
