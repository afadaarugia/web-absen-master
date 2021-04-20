<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Unit
 * @package App\Models
 * @version February 2, 2020, 9:05 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection karyawans
 * @property string nama
 * @property integer units_id
 */
class Unit extends Model
{
    use SoftDeletes;

    public $table = 'units';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama',
        'units_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'units_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'units_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function karyawans()
    {
        return $this->hasMany(\App\Models\Karyawan::class, 'units_id');
    }

    public function units()
    {
        return $this->belongsTo(\App\Models\Unit::class, 'units_id');
    }
}
