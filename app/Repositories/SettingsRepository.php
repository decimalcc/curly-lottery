<?php

namespace App\Repositories;

use App\Models\Settings;
use App\Repositories\Interfaces\SettingsRepositoryInterface;

class SettingsRepository implements SettingsRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function getItem(string $name): string
    {
        return Settings::where('name', $name)->first()->value;
    }
}
