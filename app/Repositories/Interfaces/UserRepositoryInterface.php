<?php

namespace App\Repositories\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    /**
     * Get user by ID.
     *
     * @param int $userId
     * @return User
     */
    public function getUser(int $userId): User;

    /**
     * Get user things.
     *
     * @param int $userId
     * @return Collection
     */
    public function getUserThings(int $userId): Collection;

    /**
     * Get user transactions.
     *
     * @param int $userId
     * @return Collection
     */
    public function getUserTransactions(int $userId): Collection;
}
