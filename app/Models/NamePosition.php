<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class NamePosition
 * @package App\Models
 * @version February 2, 2020, 9:01 am UTC
 *
 * @property \App\Models\Level levels
 * @property \Illuminate\Database\Eloquent\Collection karyawans
 * @property string nama
 * @property integer levels_id
 */
class NamePosition extends Model
{
    use SoftDeletes;

    public $table = 'name_posisions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama',
        'levels_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'levels_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'levels_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function levels()
    {
        return $this->belongsTo(\App\Models\Level::class, 'levels_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function karyawans()
    {
        return $this->hasMany(\App\Models\Karyawan::class, 'name_posisions_id');
    }
}
