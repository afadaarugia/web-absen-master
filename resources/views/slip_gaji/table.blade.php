<style type="text/css">
     .line{
        border-bottom: 2px solid black;
     }
     th{
        text-align: left;
     }
     .pencarian{
        min-width: 200px;
        min-height : 20px;
        padding-bottom: 1px;
     }
     .cari{
        color: gray;
        min-width: 250px;
        max-width: 300px;
        padding-top: 10px;
     }
     #space{
        margin-bottom: 5px;
     }
 </style>
 @foreach($penggajian as $penggajian)
<div class="table-responsive">
    <h1 class="pull-left">
        <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('slipgaji.export', [$penggajian->id]) }}">PDF</a>

    </h1>
    <h4 align="center">SLIP GAJI PEGAWAI</h4>
    <h5 align="center" class="line">{{ strftime("%B/%Y",strtotime($penggajian->bulan_penggajian)) }}</h5>

    <table class="table">
         <tr>
                <td>Nama Karyawans : {{ $penggajian->karyawans->nama_lengkap }} </td>
            </tr>

            <tr>
                <td>Nik : {{ $penggajian->karyawans->nik_bistel }}</td>
            </tr>

            <tr>
                <td>Jabatan : {{ $penggajian->karyawans->namePosisions->nama }} </td>
            </tr>
            <tr>
                <td>Lokasi Kerja : {{ $penggajian->karyawans->sektor->nama}} </td>
            </tr>
    </table >
<p class="line"></p>
<table>
    <tr>
    <td>No. NPWP : {{ $penggajian->karyawans->nomor_npwp }} </td>
    </tr>
</table>         
<p class="line"></p>
<br>
    <table class="table">
         <thead >
            <tr>
                <th width="200px">Jenis Pendapatan</th>
                <th width="150px">Jumlah (Rp.)</th>
                <th width="200px">Jenis Potongan</th>
                <th width="150px">Jumlah (Rp.)</th>
                
            </tr>

        </thead>
        <tbody>         
            <tr>

                <td>Gaji Pokok</td>
                <td>Rp. {{number_format( $penggajian->gaji_pokok) }}</td>
                <td>PPH 21</td>
                <td>Rp.{{number_format( $penggajian->tunj_pph) }}</td>
            </tr>

            <tr>

                <td>Tunjangan Pajak PPH 21</td>
                <td>Rp. {{number_format( $penggajian->tunj_pph ) }}</td>
                <td>Pot BPJS Kesehatan</td>
                <td>Rp. {{ number_format($penggajian->tunj_bpjs)  }}</td>
            </tr>

            <tr>

                <td>Insentif Jabatan</td>
                <td>Rp. {{number_format( $penggajian->insentif_jab) }}</td>
                <td>Potongan JKK Jamsostek</td>
                <td>Rp. {{ number_format($penggajian->tunj_jkk) }}</td>
            </tr>

            <tr>

                <td>Intesif Prestasi</td>
                <td>Rp. {{number_format( $penggajian->insentif_prestasi) }}</td>
                <td>Potongan JKM Jamsostek</td>
                <td>Rp. {{number_format( $penggajian->tunj_jkm) }}</td>
            </tr>

            <tr>

                <td>Insentif Telekomunukasi</td>
                <td>Rp. {{ number_format($penggajian->intensif_telekomunikasi) }} </td>
                <td>Potongan JHT Jamsostek</td>
                <td>Rp. {{number_format( $penggajian->tunj_jht ) }}</td>
            </tr>

            <tr>

                <td>Insentif Transportasi</td>
                <td>Rp. {{ number_format($penggajian->insentif_transportasi) }}</td>
                <td>Potongan Pinjaman Kopegtel</td>
                <td>Rp. {{ number_format($penggajian->pot_pinaman_kopegtel) }}</td>
            </tr>

            <tr>

                <td>Isentif PS</td>
                <td>Rp. {{number_format( $penggajian->insentif_ps) }}</td>
                <td>Potongan Pinjaman Lain-lain</td>
                <td>Rp. {{ number_format($penggajian->pot_pinjaman_lain) }}</td>
            </tr>

            <tr>

                <td>Insentif Lembur</td>
                <td>Rp. {{ number_format($penggajian->intensif_lembur) }}</td>
                <td>Angsuran Ke-</td>
                <td>{{ $penggajian->angsuran_ke}}</td>
            </tr>

            <tr>
                <td>Rapel PS</td>
                <td>Rp. {{ number_format($penggajian->rapel_ps) }}</td>
            </tr>

            <tr>
                <td>Rapel Lembur</td>
                <td>Rp. {{ number_format($penggajian->rapel_lembur) }}</td>
            </tr>

            <tr>
                <td>Rapel Gaji</td>
                <td>Rp. {{ number_format($penggajian->rapel_gaji) }}</td>
            </tr>

            <tr>

                <td>Tunjangan BPJS Kesehatan</td>
                <td>Rp. {{ number_format($penggajian->tunj_bpjs)  }}</td>
            </tr>

            <tr>

                <td>Tunjangan JKK Jamsostek</td>
                <td>Rp. {{number_format( $penggajian->tunj_jkk) }}</td>
            </tr>

            <tr>

                <td>Tunjangan JKM Jamsostek</td>
                <td>Rp. {{number_format( $penggajian->tunj_jkm) }}</td>
            </tr>

            <tr>

                <td>Tunjangan JHT Jamsostek</td>
                <td colspan="3">Rp. {{number_format( $penggajian->tunj_jht) }}</td>
            </tr>
        </tbody>
    </table>
    <p class="line"></p>
    <table class="table" >

            <tr>
                <th width="150px">Total Penghasilan</th>
                <th width="150px">Total Potongan</th>
                <th width="200px">Gaji Bersih</th>
                
            </tr>
            <tr>
                <td>
                {{ number_format(($penggajian->gaji_pokok) +
                                 ($penggajian->tunj_pph) +
                                 ($penggajian->tunj_bpjs)+
                                 ($penggajian->tunj_jkk ) +
                                 ($penggajian->tunj_jht)+
                                 ($penggajian->tunj_jkm)+
                                 ($penggajian->insentif_jab) +
                                 ($penggajian->insentif_transportasi) +
                                 ($penggajian->insentif_ps) +
                                 ($penggajian->insentif_prestasi) +
                                 ($penggajian->intensif_telekomunikasi) +
                                 ($penggajian->intensif_lembur) +
                                 ($penggajian->rapel_gaji)+
                                 ($penggajian->rapel_ps)+
                                 ($penggajian->rapel_lembur)) }}
                </td>
                <td>
                    {{ number_format (($penggajian->tunj_pph) +
                                 ($penggajian->tunj_bpjs)+
                                 ($penggajian->tunj_jkk ) +
                                 ($penggajian->tunj_jht)+
                                 ($penggajian->tunj_jkm)+
                                 ($penggajian->pot_pinaman_kopegtel) +
                                 ($penggajian->pot_pinjaman_lain)) }}
                </td>
                <td>
                     {{ number_format((($penggajian->gaji_pokok) +
                                 ($penggajian->tunj_pph) +
                                 ($penggajian->tunj_bpjs)+
                                 ($penggajian->tunj_jkk ) +
                                 ($penggajian->tunj_jht)+
                                 ($penggajian->tunj_jkm)+
                                 ($penggajian->insentif_jab) +
                                 ($penggajian->insentif_transportasi) +
                                 ($penggajian->insentif_ps) +
                                 ($penggajian->insentif_prestasi) +
                                 ($penggajian->intensif_telekomunikasi) +
                                 ($penggajian->intensif_lembur) +
                                 ($penggajian->rapel_gaji)+
                                 ($penggajian->rapel_ps)+
                                 ($penggajian->rapel_lembur)) -
                                 (($penggajian->tunj_pph) +
                                 ($penggajian->tunj_bpjs)+
                                 ($penggajian->tunj_jkk ) +
                                 ($penggajian->tunj_jht)+
                                 ($penggajian->tunj_jkm)+
                                 ($penggajian->pot_pinaman_kopegtel) +
                                 ($penggajian->pot_pinjaman_lain))) }}

                    
                </td>
            </tr>
        </tbody>
        
    </table>
    <p class="line"></p>
    
</div>
<i>Telah Dibukukan Ke Rekening Saudara<i>
    <br>
<b> Bank : {{ $penggajian->karyawans->banks->nama }} </b><br>
<b> Nomor Rekening : {{ $penggajian->karyawans->no_rek }}</b>
<br>
<br>
@endforeach

