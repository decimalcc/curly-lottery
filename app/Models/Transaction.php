<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaction.
 *
 * @package App\Models
 *
 * @property integer $user_id User ID.
 * @property string $way Payment way.
 * @property integer $amount Payment amount.
 * @property integer $status Transaction status.
 */
class Transaction extends Model
{
    use HasFactory;

    public const WAY_DEPOSIT = 'deposit';
    public const WAY_WITHDRAW = 'withdraw';

    public const STATUS_CREATED = 0;
    public const STATUS_SUCCESS = 1;
}
