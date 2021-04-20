<?php

namespace App\Repositories;

use App\Models\Agama;
use App\Repositories\BaseRepository;

/**
 * Class AgamaRepository
 * @package App\Repositories
 * @version February 2, 2020, 8:55 am UTC
*/

class AgamaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama'
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
        return Agama::class;
    }
}
