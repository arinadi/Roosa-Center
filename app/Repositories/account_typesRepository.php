<?php

namespace App\Repositories;

use App\Models\account_types;
use App\Repositories\BaseRepository;

/**
 * Class account_typesRepository
 * @package App\Repositories
 * @version May 7, 2020, 10:53 pm UTC
*/

class account_typesRepository extends BaseRepository
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
        return account_types::class;
    }
}
