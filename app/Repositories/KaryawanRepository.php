<?php

namespace App\Repositories;

use App\Models\Karyawan;
use App\Repositories\BaseRepository;

/**
 * Class KaryawanRepository
 * @package App\Repositories
 * @version February 2, 2020, 8:43 am UTC
*/

class KaryawanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cost_center',
        'nik_ta',
        'nik_bistel',
        'nama_lengkap',
        'email',
        'jen_kel',
        'alamat',
        'kota_lahir',
        'tgl_lahir',
        'foto',
        'foto_ktp',
        'foto_kk',
        'status_pernikahan',
        'no_ktp',
        'nomor_kartu_keluarga',
        'nomor_npwp',
        'no_bpjs_kesehatan',
        'no_bpjs_ketenagakerjaan',
        'no_rek',
        'jurusan',
        'nama_lembaga',
        'golongan_darah',
        'ukuran_seragam',
        'nama_ayah',
        'nama_ibu_kandung',
        'kontrak_ke',
        'awal_kontrak',
        'akhir_kontrak',
        'jumlah_anak',
        'name_posisions_id',
        'units_id',
        'sektors_id',
        'pendidikans_id',
        'agamas_id',
        'statuses_id',
        'banks_id',
        'gol_darahs_id',
        'users_id',
        'suku',
        'no_telp',
        'no_telp_kel',
        'tgl_mulai_kerja',
        'nama_keluarga',
        'atas_nama',
        'keterangan_aktif',
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
        return Karyawan::class;
    }
}
