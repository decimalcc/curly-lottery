<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThingUser extends Model
{
    use HasFactory;

    public const STATUS_UNDELIVERED = 0;
    public const STATUS_DELIVERED = 1;

    protected $table = 'thing_user';
}
