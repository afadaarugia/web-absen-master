<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FotoRecognition
 * @package App\Models
 * @version September 1, 2020, 2:07 pm WITA
 *
 * @property \App\Models\User $users
 * @property string $foto
 * @property integer $users_id
 */
class FotoRecognition extends Model
{
    use SoftDeletes;

    public $table = 'foto_recognition';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'foto',
        'users_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'foto' => 'string',
        'users_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
//        'foto' => 'nullable|string|max:255',
//        'created_at' => 'nullable',
//        'updated_at' => 'nullable',
//        'deleted_at' => 'nullable',
//        'users_id' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function users()
    {
        return $this->belongsTo(\App\Models\User::class, 'users_id');
    }
}
