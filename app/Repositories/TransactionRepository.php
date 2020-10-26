<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Repositories\Interfaces\TransactionRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class TransactionRepository implements TransactionRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function getTransaction(int $id): Transaction
    {
        return Transaction::where('id', $id);
    }

    /**
     * @param int $status
     * @param int $limit
     * @return Collection
     */
    public function getTransactionsByStatus(int $status, int $limit): Collection
    {
        return Transaction::where('status', $status)->take($limit)->get();
    }
}
