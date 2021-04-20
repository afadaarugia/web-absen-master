<?php

namespace App\Repositories;

use App\Models\Unit;
use App\Repositories\BaseRepository;

/**
 * Class UnitRepository
 * @package App\Repositories
 * @version February 2, 2020, 9:05 am UTC
*/

class UnitRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'units_id'
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
        return Unit::class;
    }
}
