<?php

namespace App\Repositories;

use App\Models\FotoRecognition;
use App\Repositories\BaseRepository;

/**
 * Class FotoRecognitionRepository
 * @package App\Repositories
 * @version September 1, 2020, 2:07 pm WITA
*/

class FotoRecognitionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'foto',
        'users_id'
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
        return FotoRecognition::class;
    }
}
