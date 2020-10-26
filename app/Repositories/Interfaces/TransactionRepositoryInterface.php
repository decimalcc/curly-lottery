<?php

namespace App\Repositories\Interfaces;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Collection;


interface TransactionRepositoryInterface
{
    /**
     * Get transaction by ID.
     *
     * @param int $id Transaction ID.
     * @return Transaction Eloquent
     */
    public function getTransaction(int $id): Transaction;

    /**
     * Get transactions by status.
     *
     * @param int $status
     * @param int $limit
     * @return Collection
     */
    public function getTransactionsByStatus(int $status, int $limit): Collection;
}
