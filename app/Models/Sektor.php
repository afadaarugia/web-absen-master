<?php

namespace App\Models;


use Malhal\Geographical\Geographical;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Sektor
 * @package App\Models
 * @version February 2, 2020, 9:03 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection karyawans
 * @property string nama
 * @property integer sektors_id
 */
class Sektor extends Model
{
    use SoftDeletes;
   // use Geographical;

    public $table = 'sektors';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    // const LATITUDE  = 'latitude';
    // const LONGITUDE = 'longtitude';


    protected $dates = ['deleted_at'];

    // protected static $kilometers = true;




    public $fillable = [
        'nama',
        'latitude',
        'longtitude',
        'sektors_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'sektors_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'sektors_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function karyawans()
    {
        return $this->hasMany(\App\Models\Karyawan::class, 'sektors_id');
    }

    public function parent()
    {
        return $this->hasMany(\App\Models\Sektor::class, 'sektors_id');
    }

    public function sektors()
    {
        return $this->belongsTo(\App\Models\Sektor::class, 'sektors_id');
    }
}
