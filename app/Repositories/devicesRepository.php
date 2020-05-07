<?php

namespace App\Repositories;

use App\Models\devices;
use App\Repositories\BaseRepository;

/**
 * Class devicesRepository
 * @package App\Repositories
 * @version May 7, 2020, 6:18 pm UTC
*/

class devicesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'public_key',
        'secret_key',
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
        return devices::class;
    }
}
