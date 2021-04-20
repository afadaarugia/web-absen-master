<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Karyawan
 * @package App\Models
 * @version February 2, 2020, 8:43 am UTC
 *
 * @property \App\Models\Agama agamas
 * @property \App\Models\Bank banks
 * @property \App\Models\GolDarah golDarahs
 * @property \App\Models\NamePosision namePosisions
 * @property \App\Models\Pendidikan pendidikans
 * @property \App\Models\Sektor sektors
 * @property \App\Models\Status statuses
 * @property \App\Models\Unit units
 * @property \App\Models\User users
 * @property \Illuminate\Database\Eloquent\Collection absensis
 * @property string cost_center
 * @property integer nik_ta
 * @property integer nik_bistel
 * @property string nama_lengkap
 * @property string email
 * @property string jen_kel
 * @property string alamat
 * @property string kota_lahir
 * @property string tgl_lahir
 * @property string foto
 * @property string status_pernikahan
 * @property integer no_ktp
 * @property integer nomor_kartu_keluarga
 * @property integer nomor_npwp
 * @property string no_bpjs_kesehatan
 * @property string no_bpjs_ketenagakerjaan
 * @property integer no_rek
 * @property string jurusan
 * @property string nama_lembaga
 * @property string golongan_darah
 * @property string ukuran_seragam
 * @property string nama_ayah
 * @property string nama_ibu_kandung
 * @property integer kontrak_ke
 * @property string awal_kontrak
 * @property string akhir_kontrak
 * @property string jumlah_anak
 * @property integer name_posisions_id
 * @property integer units_id
 * @property integer sektors_id
 * @property integer pendidikans_id
 * @property integer agamas_id
 * @property integer statuses_id
 * @property integer banks_id
 * @property integer gol_darahs_id
 * @property integer users_id
 */
class Karyawan extends Model
{
    use SoftDeletes;

    public $table = 'karyawans';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nik',
        'nama_lengkap',
        'email',
        'jen_kel',
        'no_telp',
        'alamat',
        'kota_lahir',
        'tgl_lahir',
        'foto',
        'name_posisions_id',
        'units_id',
        'sektors_id',
        'agamas_id',
        'statuses_id',
        'users_id',
        'no_telp',
        'no_telp_kel',
        'keterangan_aktif',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nik' => 'integer',
        'nama_lengkap' => 'string',
        'email' => 'string',
        'jen_kel' => 'string',
        'no_telp' => 'string',
        'alamat' => 'string',
        'tgl_lahir' => 'date',
        'foto' => 'string',
        'name_posisions_id' => 'integer',
        'units_id' => 'integer',
        'sektors_id' => 'integer',
        'agamas_id' => 'integer',
        'statuses_id' => 'integer',
        'banks_id' => 'integer',
        'users_id' => 'integer',
        'keterangan_aktif' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
//        'name_posisions_id' => 'required',
//        'units_id' => 'required',
//        'sektors_id' => 'required',
//        'pendidikans_id' => 'required',
//        'agamas_id' => 'required',
//        'statuses_id' => 'required',
//        'banks_id' => 'required',
//        'gol_darahs_id' => 'required',
        'users_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function agamas()
    {
        return $this->belongsTo(\App\Models\Agama::class, 'agamas_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function banks()
    {
        return $this->belongsTo(\App\Models\Bank::class, 'banks_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function golDarahs()
    {
        return $this->belongsTo(\App\Models\GolDarah::class, 'gol_darahs_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function namePosisions()
    {
        return $this->belongsTo(\App\Models\NamePosition::class, 'name_posisions_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function pendidikans()
    {
        return $this->belongsTo(\App\Models\Pendidikan::class, 'pendidikans_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sektor()
    {
        return $this->belongsTo(\App\Models\Sektor::class, 'sektors_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function statuses()
    {
        return $this->belongsTo(\App\Models\Status::class, 'statuses_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function units()
    {
        return $this->belongsTo(\App\Models\Unit::class, 'units_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function users()
    {
        return $this->belongsTo(\App\Models\User::class, 'users_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function absensis()
    {
        return $this->hasMany(\App\Models\Absensi::class, 'karyawans_id');
    }
}
