<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class bot_users_pair_devices
 * @package App\Models
 * @version May 7, 2020, 10:51 pm UTC
 *
 * @property string $public_key
 * @property integer $bot_user_id
 * @property boolean $is_verified
 * @property boolean $is_blocked
 */
class bot_users_pair_devices extends Model
{
    use SoftDeletes;

    public $table = 'bot_users_pair_devices';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'public_key',
        'bot_user_id',
        'is_verified',
        'is_blocked'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'public_key' => 'string',
        'bot_user_id' => 'integer',
        'is_verified' => 'boolean',
        'is_blocked' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'public_key' => 'required',
        'bot_user_id' => 'required'
    ];

    
}
