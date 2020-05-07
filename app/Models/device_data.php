<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class device_data
 * @package App\Models
 * @version May 7, 2020, 10:44 pm UTC
 *
 * @property integer $device_id
 * @property integer $device_data_category_id
 * @property string $key
 * @property string $value
 */
class device_data extends Model
{
    use SoftDeletes;

    public $table = 'device_data';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'device_id',
        'device_data_category_id',
        'key',
        'value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'device_id' => 'integer',
        'device_data_category_id' => 'integer',
        'key' => 'string',
        'value' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'device_id' => 'required',
        'device_data_category_id' => 'required',
        'key' => 'required',
        'value' => 'required'
    ];

    
}
