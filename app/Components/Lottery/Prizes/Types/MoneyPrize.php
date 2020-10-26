<?php

namespace App\Components\Lottery\Prizes\Types;

use App\Components\Lottery\Prizes\Types\Base\AbstractPrize;
use App\Models\Settings;
use App\Models\Transaction;
use App\Repositories\SettingsRepository;
use Illuminate\Support\Facades\DB;

class MoneyPrize extends AbstractPrize
{
    private $value;

    public function initialize(): void
    {
        $settingsRepository = new SettingsRepository();
        $moneyAmount = $settingsRepository->getItem('money_amount');

        $this->value = rand(1, 5) * 10;

        if ($this->value > $moneyAmount) {
            $this->value = $moneyAmount;
        }

        DB::transaction(function () {
            $transaction = new Transaction();
            $transaction->user_id = $this->userId;
            $transaction->way = Transaction::WAY_DEPOSIT;
            $transaction->amount = $this->value;
            $transaction->status = Transaction::STATUS_CREATED;
            $transaction->save();

            $settings = Settings::where('name', 'money_amount')->first();
            $settings->value -= $this->value;
            $settings->save();
        });
    }

    /**
     * @inheritDoc
     */
    public function getTypeName(): string
    {
        return 'Money';
    }

    /**
     * @inheritDoc
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
