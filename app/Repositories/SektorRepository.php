<?php

namespace App\Repositories;

use App\Models\Sektor;
use App\Repositories\BaseRepository;

/**
 * Class SektorRepository
 * @package App\Repositories
 * @version February 2, 2020, 9:03 am UTC
*/

class SektorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'sektors_id'
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
        return Sektor::class;
    }
}
