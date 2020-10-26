<?php

namespace App\Components\Lottery\Prizes\Types;

use App\Components\Lottery\Prizes\Types\Base\AbstractPrize;
use App\Repositories\UserRepository;

class BonusPrize extends AbstractPrize
{
    /** @var string $value Prize value */
    private $value;

    public function initialize(): void
    {
        $userRepository = new UserRepository();
        $user = $userRepository->getUser($this->userId);

        $this->value = rand(1, 20) * 10;

        $user->bonuses += $this->value;
        $user->save();
    }

    /**
     * @inheritDoc
     */
    public function getTypeName(): string
    {
        return 'Bonus points';
    }

    /**
     * @inheritDoc
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
