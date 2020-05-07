<?php

namespace App\Repositories;

use App\Models\bot_users;
use App\Repositories\BaseRepository;

/**
 * Class bot_usersRepository
 * @package App\Repositories
 * @version May 7, 2020, 10:48 pm UTC
*/

class bot_usersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'account_type_id',
        'account_id',
        'phone_number',
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
        return bot_users::class;
    }
}
