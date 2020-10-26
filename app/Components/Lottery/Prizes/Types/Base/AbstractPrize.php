<?php

namespace App\Components\Lottery\Prizes\Types\Base;

abstract class AbstractPrize
{
    /** @var int $userId User ID. */
    protected $userId;

    /**
     * AbstractPrize constructor.
     *
     * @param int $userId
     */
    public function __construct(int $userId)
    {
        $this->userId = $userId;

        $this->initialize();
    }

    /**
     * Initialize prise.
     */
    abstract public function initialize(): void;

    /**
     * Get prize type name.
     *
     * @return string
     */
    abstract public function getTypeName(): string;

    /**
     * Get value of prize
     */
    abstract public function getValue(): string;
}
