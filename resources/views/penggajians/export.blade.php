<div class="table-responsive">
    <table class="table" id="penggajians-table" border="2">
        <thead>
            <tr>
                <th>No</th>
                <th>Cost Center</th>
                <th>Jabatan</th>
                <th>NIK Bistel</th>
                <th>Nama Karyawan</th>
                <th>Sektor</th>
                <th>Sub Sektor</th>
                <th>Level</th>
                <th>Unit</th>
                <th>Sub Unit</th>
                <th>Nomor NPWP</th>
                <th>Nomor BPJS Kesehatan</th>
                <th>Nomor Rekening</th>
                <th>Nama Bank</th>
                <th>Atas Nama</th>
                <th>Gaji Pokok</th>
                <th>Insentif Jabatan</th>
                <th>Insentif Transportasi</th>
                <th>Insentif Ps</th>
                <th>Insentif Prestasi</th>
                <th>Intensif Telekomunikasi</th>
                <th>Intensif Lembur</th>
                <th>Rapel Lembur</th>
                <th>Rapel Gaji</th>
                <th>Rapel PS</th>
                <th>Tunjangan Bpjs</th>
                <th>Tunjangan JKK</th>
                <th>Tunjangan JKM</th>
                <th>Tunjangan JHT</th>
                <th>Tunjangan PPH 21</th>
                <th>Total Penghasilan</th>
                <th>Potongan BPJS</th>
                <th>Potongan JKK</th>
                <th>Potongan JKM</th>
                <th>Potongan JHT</th>
                <th>Potongan PPH 21</th>
                <th>Potongan Pinaman Kopegtel</th>
                <th>Potongan Pinjaman Lain</th>
                <th>Total Potongan</th>
                <th>Gaji Bersih</th>
                <th>Keterangan Angsuran</th>
                <th>Bulan Penggajian</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0?>
        @foreach($penggajians as $penggajian)
        <?php $no++?>
            <tr>
                <td>{{ $no }}</td>
                <td>{{ $penggajian->karyawans->cost_center }}</td>
                <td>{{ $penggajian->karyawans->namePosisions->nama }}</td>
                <td>{{ $penggajian->karyawans->nik_bistel }}</td>
                <td>{{ $penggajian->karyawans->nama_lengkap }}</td>
                <td>{{ $penggajian->karyawans->sektor->sektors->nama }}</td>
                <td>{{ $penggajian->karyawans->sektor->nama }}</td>
                <td>{{ $penggajian->karyawans->namePosisions->levels->nama }}</td>
                <td>{{ $penggajian->karyawans->units->units->nama }}</td>
                <td>{{ $penggajian->karyawans->units->nama }}</td>
                <td>'{{ $penggajian->karyawans->nomor_npwp }}</td>
                <td>'{{ $penggajian->karyawans->no_bpjs_kesehatan }}</td>
                <td>'{{ $penggajian->karyawans->no_rek }}</td>
                <td>{{ $penggajian->karyawans->banks->nama }}</td>
                <td>{{ $penggajian->karyawans->atas_nama }}</td>
                <td>{{ number_format($penggajian->gaji_pokok) }}</td>
                <td>{{ number_format($penggajian->insentif_jab) }}</td>
                <td>{{ number_format($penggajian->insentif_transportasi) }}</td>
                <td>{{ number_format($penggajian->insentif_ps) }}</td>
                <td>{{ number_format($penggajian->insentif_prestasi) }}</td>
                <td>{{ number_format($penggajian->intensif_telekomunikasi) }}</td>
                <td>{{ number_format($penggajian->intensif_lembur) }}</td>
                <td>{{ number_format($penggajian->tunj_bpjs)  }}</td>
                <td>{{ number_format($penggajian->tunj_jkk) }}</td>
                <td>{{ number_format($penggajian->tunj_jkm) }}</td>
                <td>{{ number_format($penggajian->tunj_jht ) }}</td>
                <td>{{ number_format($penggajian->tunj_pph) }}</td>
                <td>{{ number_format($penggajian->rapel_lembur) }}</td>
                <td>{{ number_format($penggajian->rapel_gaji) }}</td>
                <td>{{ number_format($penggajian->rapel_ps) }}</td>
                 <td>
                    {{ number_format(($penggajian->gaji_pokok) +
                                 ($penggajian->tunj_pph) +
                                 ($penggajian->tunj_bpjs) + 
                                 ($penggajian->tunj_jkk ) +
                                 ($penggajian->tunj_jht )+
                                 ($penggajian->tunj_jkm )+
                                 ($penggajian->insentif_jab) +
                                 ($penggajian->insentif_transportasi) +
                                 ($penggajian->insentif_ps) +
                                 ($penggajian->insentif_prestasi) +
                                 ($penggajian->intensif_telekomunikasi) +
                                 ($penggajian->intensif_lembur) +
                                 ($penggajian->rapel_gaji)) }}       
                </td>
                <td>{{ number_format($penggajian->tunj_bpjs)  }}</td>
                <td>{{ number_format($penggajian->tunj_jkk) }}</td>
                <td>{{ number_format($penggajian->tunj_jkm) }}</td>
                <td>{{ number_format($penggajian->tunj_jht ) }}</td>
                <td>{{ number_format($penggajian->tunj_pph) }}</td>
                <td>{{ number_format($penggajian->pot_pinaman_kopegtel) }}</td>
                <td>{{ number_format($penggajian->pot_pinjaman_lain) }}</td>
                <td>
                      {{ number_format(($penggajian->tunj_pph) +
                                 ($penggajian->tunj_bpjs) + 
                                 ($penggajian->tunj_jkk ) +
                                 ($penggajian->tunj_jht )+
                                 ($penggajian->tunj_jkm )+
                                ($penggajian->pot_pinaman_kopegtel) +
                                ($penggajian->pot_pinjaman_lain) ) }}
                </td>

                <td>
                    {{ number_format((($penggajian->gaji_pokok) +
                                 ($penggajian->tunj_pph) +
                                 ($penggajian->tunj_bpjs) + 
                                 ($penggajian->tunj_jkk ) +
                                 ($penggajian->tunj_jht )+
                                 ($penggajian->tunj_jkm )+
                                 ($penggajian->insentif_jab) +
                                 ($penggajian->insentif_transportasi) +
                                 ($penggajian->insentif_ps) +
                                 ($penggajian->insentif_prestasi) +
                                 ($penggajian->intensif_telekomunikasi) +
                                 ($penggajian->intensif_lembur) +
                                 ($penggajian->rapel_gaji)) -
                                 (($penggajian->tunj_pph) +
                                 ($penggajian->tunj_bpjs) + 
                                 ($penggajian->tunj_jkk ) +
                                 ($penggajian->tunj_jht )+
                                 ($penggajian->tunj_jkm )+
                                 ($penggajian->pot_pinaman_kopegtel) +
                                 ($penggajian->pot_pinjaman_lain))) }}
                </td>
                <td>{{ $penggajian->angsuran_ke }}</td>
                <td>{{ strftime("%B",strtotime($penggajian->bulan_penggajian)) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
