<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Status
 * @package App\Models
 * @version February 2, 2020, 9:04 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection karyawans
 * @property string nama
 */
class Status extends Model
{
    use SoftDeletes;

    public $table = 'statuses';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function karyawans()
    {
        return $this->hasMany(\App\Models\Karyawan::class, 'statuses_id');
    }
}
