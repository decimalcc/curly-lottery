<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getUser(int $userId): User
    {
        return User::where('id', $userId)->first();
    }

    /**
     * @inheritDoc
     */
    public function getUserThings(int $userId): Collection
    {
        return User::where('id', $userId)->first()->things;
    }

    /**
     * @inheritDoc
     */
    public function getUserTransactions(int $userId): Collection
    {
        return User::where('id', $userId)->first()->transactions;
    }
}
