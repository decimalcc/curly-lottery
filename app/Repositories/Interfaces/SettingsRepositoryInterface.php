<?php

namespace App\Repositories\Interfaces;

use App\Models\Settings;

interface SettingsRepositoryInterface
{
    /**
     * @param string $name
     * @return Settings
     */
    public function getItem(string $name): string;
}
