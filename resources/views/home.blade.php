@extends('layouts.app')
@section('content')
<div>

	<div class="row">
		<div class="col-lg-7 col-3" style="margin-left: 65px;margin-right: 0px; margin-top: 15px; min-height: 926px;">
            <!-- small box -->
		   <section class="content mb-4" >
               <div class="container-fluid">
                  <div class="row">
                      <div class="col-5">
                          <div class="rounded bg-blue text-center"><i class="fas fa-clock"></i> ABSEN PAGI : {{ \Carbon\Carbon::parse($jamkerjapagi->jam_awal)->format('H:m A') }} - {{ \Carbon\Carbon::parse($jamkerjapagi->jam_akhir)->format('H:m A') }}</div>
                      </div>
                      <div class="col-5" style="margin-left: 80px;">
                          <div class="rounded bg-green text-center"><i class="fas fa-clock"></i> ABSEN SORE : {{ \Carbon\Carbon::parse($jamkerjasore->jam_awal)->format('H:m A') }} - {{ \Carbon\Carbon::parse($jamkerjasore->jam_akhir)->format('H:m A') }}</div>
                      </div>
                  </div>
              </div>
           </section>
           </section>
		      <div class="container-fluid">
		        <div class="row">
		          <div class="col-md-6">
		            <!-- small box -->
		            <div class="small-box bg-blue">
		              <div class="inner">
		                <h3>{{ $users }}</h3>

		                <p>Data User</p>
		              </div>
		              <div class="icon">
		                <i class="ion ion-person-add"></i>
		              </div>
		              <a href="{{ route('users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
		            </div>
		         </div>

		         <div class="col-md-6" >
		            <!-- small box -->
		            <div class="small-box bg-success">
		              <div class="inner">
		                <h3>{{ $absensis }}</h3>

		                <p>Data Absensi</p>
		              </div>
		              <div class="icon">
		                <i class="ion ion-stats-bars"></i>
		              </div>
		              <a href="{{ route('absensis.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                 </div>

		        </div>
		       </div>
		   </section>

		   <section class="content" >
		      <div class="container-fluid">
		        <div class="row">
{{--		          <div class="col-md-6">--}}
{{--		            <!-- small box -->--}}
{{--		            <div class="small-box bg-info">--}}
{{--		              <div class="inner">--}}
<!-- {{--		                <h3>{{ $penggajians }}</h3>--}} -->

{{--		                <p>Data Penggajian</p>--}}
{{--		              </div>--}}
{{--		              <div class="icon">--}}
{{--		                <i class="ion ion-bag"></i>--}}
{{--		              </div>--}}
<!-- {{--		              <a href="{{ route('penggajians.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}} -->
{{--		            </div>--}}
{{--		         </div>--}}

		         <div class="col-md-6">
		            <!-- small box -->
		            <div class="small-box bg-danger">
		              <div class="inner">
		                <h3>{{ $sektors }}</h3>

		                <p>Data Sektor</p>
		              </div>
		              <div class="icon">
		                <i class="ion ion-pie-graph"></i>
		              </div>
		              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
		            </div>

		        </div>
                    <div class="col-md-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $NamePosition }}</h3>

                                <p>Data Jabatan</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ route('namePositions.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
              </div>
		   </section>

{{--		   <section class="content" >--}}
{{--		      <div class="container-fluid">--}}
{{--		        <div class="row">--}}
{{--		          <div class="col-md-6">--}}
{{--		            <!-- small box -->--}}
{{--		            <div class="small-box bg-warning">--}}
{{--		              <div class="inner">--}}
{{--		                <h3>{{ $users }}</h3>--}}

{{--		                <p>Data User</p>--}}
{{--		              </div>--}}
{{--		              <div class="icon">--}}
{{--		                <i class="ion ion-person-add"></i>--}}
{{--		              </div>--}}
{{--		              <a href="{{ route('sektors.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--		            </div>--}}
{{--		         </div>--}}
{{--		        </div>--}}
{{--		       </div>--}}
{{--		   </section>--}}
	  </div>

	  <div class="col-lg-3 col-6" style=" margin-top: 13px; margin-left: 140px;margin-right: auto;">
		        
				<!-- small box -->
			 <section class="row">
		      <div class="container-fluid" >
		        <div class="row mb-2">
		          <div class="col-sm-12" >
		            <h4 style="padding-left: 5px" class="rounder bg-succes">Profile User</h4>
                  </div>
		        </div>
		      </div>
				
				<!-- /.container-fluid -->
		    </section>
		     <section class="content" >
		      <div class="container-fluid">
		        <div class="row">
		          <div class="col-md-12">

		            <!-- Profile Image -->
		            <div class="card card-primary card-outline">
		              <div class="card-body box-profile">
		                <div class="text-center">
		                  <img class="profile-user-img img-fluid img-circle"
		                       src="{{ $person->foto }}"
		                       alt="User profile picture">
		                </div>

		                <h3 class="profile-username text-center">{{ $person->nama_lengkap }}</h3>

		                <p class="text-muted text-center">{{ $person->namePosisions->nama }}</p>

		                <ul class="list-group list-group-unbordered mb-3">
		                  <li class="list-group-item">
		                    <b>NIK</b> <a class="float-right">{{ $person->nik }}</a>
						</li>
		                  <li class="list-group-item">
		                    <b>No. HP</b> <a class="float-right">{{ $person->no_telp }}</a>
		                  </li>
		                  <li class="list-group-item">
		                    <b>Sektor</b> <a class="float-right">{{ $person->sektor->nama }}</a>
		                  </li>
		                  <li class="list-group-item">
		                    <b>Unit</b> <a class="float-right">{{ $person->units->nama }}</a>
		                  </li>
		                </ul>

		                <a href="{{ route('karyawans.person') }}" class="btn btn-primary btn-block"><b>Detail</b></a>
		              </div>
		              <!-- /.card-body -->
		            </div>
		         </div>
		        </div>
		       </div>
		   </section>

		</div>

	</div>
</div>


<script >
	$(document).ready(function () {

        $('body').Layout('fixLayoutHeight');
        $('.sidebar-toggle-btn').PushMenu();

    });


</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

@endsection
