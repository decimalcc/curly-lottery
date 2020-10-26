<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Settings
 * @package App\Models
 *
 * @property string $name
 * @property string $type
 * @property string $value
 */
class Settings extends Model
{
    use HasFactory;
}
