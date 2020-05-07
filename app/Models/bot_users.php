<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class bot_users
 * @package App\Models
 * @version May 7, 2020, 10:48 pm UTC
 *
 * @property integer $account_type_id
 * @property string $account_id
 * @property string $phone_number
 * @property string $name
 * @property boolean $is_verified
 * @property boolean $is_admin
 */
class bot_users extends Model
{
    use SoftDeletes;

    public $table = 'bot_users';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'account_type_id',
        'account_id',
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
        'account_type_id' => 'integer',
        'account_id' => 'string',
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
        'account_type_id' => 'required',
        'account_id' => 'required'
    ];

    
}
