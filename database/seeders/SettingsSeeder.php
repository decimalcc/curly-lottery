<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->bonusSeed();
        $this->moneySeed();
        $this->thingSeed();
    }

    /**
     * Bonus seed.
     */
    private function bonusSeed()
    {
        $bonusChance = new Settings();
        $bonusChance->name = 'bonus_chance';
        $bonusChance->type = 'integer';
        $bonusChance->value = 60;
        $bonusChance->save();
    }

    /**
     * Money seed.
     */
    private function moneySeed()
    {
        $moneyChance = new Settings();
        $moneyChance->name = 'money_chance';
        $moneyChance->type = 'integer';
        $moneyChance->value = 30;
        $moneyChance->save();

        $moneyChance = new Settings();
        $moneyChance->name = 'money_amount';
        $moneyChance->type = 'integer';
        $moneyChance->value = 3000;
        $moneyChance->save();
    }

    /**
     * Thing seed.
     */
    private function thingSeed()
    {
        $thingChance = new Settings();
        $thingChance->name = 'thing_chance';
        $thingChance->type = 'integer';
        $thingChance->value = 10;
        $thingChance->save();
    }
}
