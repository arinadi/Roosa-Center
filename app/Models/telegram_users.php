<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class telegram_users
 * @package App\Models
 * @version May 3, 2020, 4:05 pm UTC
 *
 * @property integer $telegram_id
 * @property string $phone_number
 * @property string $name
 * @property boolean $is_verified
 * @property boolean $is_admin
 */
class telegram_users extends Model
{
    use SoftDeletes;

    public $table = 'telegram_users';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'telegram_id',
        'phone_number',
        'name',
        'is_verified',
        'is_admin'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'telegram_id' => 'integer',
        'phone_number' => 'string',
        'name' => 'string',
        'is_verified' => 'boolean',
        'is_admin' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'telegram_id' => 'required'
    ];

    
}
