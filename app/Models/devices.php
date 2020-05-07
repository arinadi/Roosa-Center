<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class devices
 * @package App\Models
 * @version May 7, 2020, 6:18 pm UTC
 *
 * @property string $public_key
 * @property string $secret_key
 * @property string $name
 * @property boolean $is_verified
 * @property boolean $is_blocked
 */
class devices extends Model
{
    use SoftDeletes;

    public $table = 'devices';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'public_key',
        'secret_key',
        'name',
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
        'secret_key' => 'string',
        'name' => 'string',
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
        'secret_key' => 'required',
        'name' => 'required'
    ];

    
}
