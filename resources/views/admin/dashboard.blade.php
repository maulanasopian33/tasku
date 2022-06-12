@extends('Parsial.admin-dashboardbase')

@section('contentdashboard')
<div class="container-fluid p-4">
  <div class="row">
    <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6 my-1">
      <div class="widget-stat card bg-danger">
        <div class="card-body p-4">
          <div class="media">
            <span class="me-3">
            <i class="flaticon-381-calendar-1"></i>
            </span>
            <div class="media-body text-white text-end">
            <p class="mb-1">Jumlah Guru</p>
            <h3 class="text-white">{{ $guru }}</h3>
          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6 my-1">
      <div class="widget-stat card bg-success">
        <div class="card-body  p-4">
          <div class="media">
            <span class="me-3">
            <i class="flaticon-381-calendar-1"></i>
            </span>
            <div class="media-body text-white text-end">
            <p class="mb-1">Jumlah Siswa</p>
            <h3 class="text-white">{{ $siswa }}</h3>
          </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6 my-1">
      <div class="widget-stat card bg-warning">
        <div class="card-body  p-4">
          <div class="media">
            <span class="me-3">
            <i class="flaticon-381-calendar-1"></i>
            </span>
            <div class="media-body text-white text-end">
            <p class="mb-1">Tahun Akademik</p>
            <h3 class="text-white">{{ $tahun_akademik }}</h3>
          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6 my-1">
      <div class="widget-stat card bg-primary">
        <div class="card-body  p-4">
          <div class="media">
            <span class="me-3">
            <i class="flaticon-381-calendar-1"></i>
            </span>
            <div class="media-body text-white text-end">
            <p class="mb-1">Jumlah Rombel</p>
            <h3 class="text-white">{{ $rombel }}</h3>
          </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

@endsection
