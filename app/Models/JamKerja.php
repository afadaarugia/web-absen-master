<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class JamKerja
 * @package App\Models
 * @version September 3, 2020, 10:19 am WITA
 *
 * @property string $ket
 * @property string|\Carbon\Carbon $jam_awal
 * @property string|\Carbon\Carbon $jam_akhir
 */
class JamKerja extends Model
{
    use SoftDeletes;

    public $table = 'jamkerja';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $primaryKey="id";

    protected $dates = ['deleted_at'];



    public $fillable = [
        'ket',
        'jam_awal',
        'jam_akhir'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ket' => 'string',
        'jam_awal' => 'datetime',
        'jam_akhir' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
//        'ket' => 'nullable|string|max:45',
//        'jam_awal' => 'nullable',
//        'jam_akhir' => 'nullable',
//        'created_at' => 'nullable',
//        'updated_at' => 'nullable',
//        'deleted_at' => 'nullable'
    ];


}
