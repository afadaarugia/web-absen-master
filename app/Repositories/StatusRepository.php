<?php

namespace App\Repositories;

use App\Models\Status;
use App\Repositories\BaseRepository;

/**
 * Class StatusRepository
 * @package App\Repositories
 * @version February 2, 2020, 9:04 am UTC
*/

class StatusRepository extends BaseRepository
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
        return Status::class;
    }
}
