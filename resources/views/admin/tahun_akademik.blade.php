@extends('Parsial.admin-dashboardbase')

@section('contentdashboard')
<div class="container-fluid">
	<div class="row page-titles">
  	<ol class="breadcrumb">
  		<li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
  		<li class="breadcrumb-item active"><a href="javascript:void(0)">Admin</a></li>
  		<li class="breadcrumb-item"><a href="javascript:void(0)">Tahun Akademik</a></li>
  	</ol>
  </div>
<script>
$(function(){

    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif

    @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
    @endif

    @if(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
    @endif

    @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
    @endif
});
</script>
    <h4 class="mb-0">Tahun Akademik</h4>
    <p class="mt-0"><code>Manajemen</code> Tahun Akademik Sekolah</p>
    <div class="card">
        <div class="card-header d-block">
            <span class="accordion-header-text">Tambah Tahun Akademik</span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="basic-form input-danger-o">
                        <form action="/admin/prosestahunakademik" method="POST">
                        @csrf
                            <div class="mb-3">
                                <span class="p-2" for="nama">Tahun Akademik</span>
                                <input id="tahun_akademik" name="tahun_akademik" type="text" class="form-control input-rounded" placeholder="ex: 2021/2022">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-danger " >Tambahkan</button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="col-md-6">

                <table data-toggle="table" data-search="true" data-pagination="true" class="mt-4">
                    <thead class="bg-danger text-center align-center text-white">
                    <tr>
                        <th>UID</th>
                        <th>Tahun Akademik</th>
                        <th>KET</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($data as $datas)
                    <tr>
                    <th>{{ $datas->id_tahunakademik }}</th>
                    <th>{{ $datas->tahun_akademik }}</th>
                    <th>
                        <a href='../admin/tahun-akademik/hapus?data={{ $datas->id_tahunakademik }}' class="badge bg-danger p-2 text-white ">Hapus</a>
                    </th>
                    </tr>
                    @empty
                    <tr>
                    <th>Data Kosong</th>
                    <th>Data Kosong</th>
                    <th>Data Kosong</th>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
                        </div>
            </div>
        	<!-- END CARD -->
        </div>
  </div>
</div>

@endsection
