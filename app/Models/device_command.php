<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class device_command
 * @package App\Models
 * @version May 7, 2020, 10:47 pm UTC
 *
 * @property integer $device_id
 * @property string $command
 * @property boolean $is_received
 */
class device_command extends Model
{
    use SoftDeletes;

    public $table = 'device_commands';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'device_id',
        'command',
        'is_received'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'device_id' => 'integer',
        'command' => 'string',
        'is_received' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'device_id' => 'required',
        'command' => 'required'
    ];

    
}
