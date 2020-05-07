<?php

namespace App\Repositories;

use App\Models\device_data_categories;
use App\Repositories\BaseRepository;

/**
 * Class device_data_categoriesRepository
 * @package App\Repositories
 * @version May 7, 2020, 10:45 pm UTC
*/

class device_data_categoriesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return device_data_categories::class;
    }
}
