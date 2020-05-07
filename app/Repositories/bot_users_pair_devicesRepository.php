<?php

namespace App\Repositories;

use App\Models\bot_users_pair_devices;
use App\Repositories\BaseRepository;

/**
 * Class bot_users_pair_devicesRepository
 * @package App\Repositories
 * @version May 7, 2020, 10:51 pm UTC
*/

class bot_users_pair_devicesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'public_key',
        'bot_user_id'
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
        return bot_users_pair_devices::class;
    }
}
