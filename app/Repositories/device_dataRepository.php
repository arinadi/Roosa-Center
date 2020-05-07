<?php

namespace App\Repositories;

use App\Models\device_data;
use App\Repositories\BaseRepository;

/**
 * Class device_dataRepository
 * @package App\Repositories
 * @version May 7, 2020, 10:44 pm UTC
*/

class device_dataRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'device_id',
        'device_data_category_id',
        'key',
        'value'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return device_data::class;
    }
}
