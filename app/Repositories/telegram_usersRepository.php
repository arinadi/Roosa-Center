<?php

namespace App\Repositories;

use App\Models\telegram_users;
use App\Repositories\BaseRepository;

/**
 * Class telegram_usersRepository
 * @package App\Repositories
 * @version May 3, 2020, 4:05 pm UTC
*/

class telegram_usersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'telegram_id',
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
        return telegram_users::class;
    }
}
