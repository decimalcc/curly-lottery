<?php

namespace App\Console\Commands;

use App\Models\Transaction;
use App\Repositories\TransactionRepository;
use Illuminate\Console\Command;

class DeliverMoney extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deliver:money';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deliver money prizes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param TransactionRepository $transactionRepository
     * @return int
     */
    public function handle(TransactionRepository $transactionRepository)
    {
        // Delivery money stub
        $transactions = $transactionRepository->getTransactionsByStatus(Transaction::STATUS_CREATED, 20);

        foreach ($transactions as $transaction) {
            $transaction->status = Transaction::STATUS_SUCCESS;
            $transaction->save();
        }

        print_r(count($transactions) . ' delivered' . PHP_EOL);

        return 0;
    }
}
