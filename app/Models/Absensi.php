<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Absensi
 * @package App\Models
 * @version February 5, 2020, 4:21 pm UTC
 *
 * @property \App\Models\Karyawan karyawans
 * @property string|\Carbon\Carbon time_in
 * @property string|\Carbon\Carbon time_out
 * @property number latitude
 * @property number longtitude
 * @property integer karyawans_id
 */
class Absensi extends Model
{
    use SoftDeletes;

    public $table = 'absensis';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const TIME_IN = 'time_in';


    protected $dates = ['deleted_at','time_out','time_in'];



    public $fillable = [
        'time_in',
        'time_out',
        'latitude',
        'longtitude',
        'karyawans_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'time_in' => 'datetime',
        'time_out' => 'datetime',
        'latitude' => 'double',
        'longtitude' => 'double',
        'karyawans_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
       // 'karyawans_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function karyawans()
    {
        return $this->belongsTo(\App\Models\Karyawan::class,'karyawans_id');
    }

    public function getCreatetAtAttribute(){

        return \Carbon\Carbon::parse($this->attributes['created_at']->format('d, M Y H:i'));
    }
}
