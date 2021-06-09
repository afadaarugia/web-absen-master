        <li class="nav-item">
            <a href="{{ route('absensis.index') }}" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Data Absensi
                <span class="right badge badge-danger"></span>
              </p>
            </a>
        </li>
        
@if(Auth::user()->akses == 'admin')
        <li class="nav-item">
            <a href="{{ route('fotoRecognitions.index') }}" class="nav-link">
                <i class="nav-icon fas fa-id-card	"></i>
                <p>
                    Foto Recognition Karyawan
                    <span class="right badge badge-danger"></span>
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('jamKerjas.index') }}" class="nav-link">
                <i class="nav-icon fas fa-stopwatch	"></i>
                <p>
                    Pengaturan Jam Absen
                    <span class="right badge badge-danger"></span>
                </p>
            </a>
        </li>


        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Data User
                <span class="right badge badge-danger"></span>
              </p>
            </a>
        </li>

{{--        <li class="nav-item">--}}
{{--            <a href="{{ route('karyawans.person') }}" class="nav-link">--}}
{{--                <i class="nav-icon fas fa-th"></i>--}}
{{--                <p>--}}
{{--                    My Profil--}}
{{--                    <span class="right badge badge-danger"></span>--}}
{{--                </p>--}}
{{--            </a>--}}
{{--        </li>--}}


        <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Lainnya
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">9</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('namePositions.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jabatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('levels.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('units.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sektors.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sektor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('agamas.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agama</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('statuses.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Status</p>
                </a>
              </li>
            </ul>
        </li>
@endif