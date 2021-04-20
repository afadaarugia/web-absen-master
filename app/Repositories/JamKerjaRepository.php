<?php

namespace App\Repositories;

use App\Models\JamKerja;
use App\Repositories\BaseRepository;

/**
 * Class JamKerjaRepository
 * @package App\Repositories
 * @version September 3, 2020, 10:19 am WITA
*/

class JamKerjaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ket',
        'jam_awal',
        'jam_akhir'
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
        return JamKerja::class;
    }
}
