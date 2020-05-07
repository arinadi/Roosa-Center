<?php

namespace App\Repositories;

use App\Models\device_command;
use App\Repositories\BaseRepository;

/**
 * Class device_commandRepository
 * @package App\Repositories
 * @version May 7, 2020, 10:47 pm UTC
*/

class device_commandRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'device_id',
        'command'
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
        return device_command::class;
    }
}
