@extends('Parsial.admin-dashboardbase')

@section('contentdashboard')
<div class="container-fluid p-4">
	<div class="row page-titles">
  	<ol class="breadcrumb">
  		<li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
  		<li class="breadcrumb-item active"><a href="javascript:void(0)">Admin</a></li>
  		<li class="breadcrumb-item"><a href="javascript:void(0)">Rombel</a></li>
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
  <div class="card">
    <div class="card-header d-block">
      <h4 class="card-title">Rombongan Belajar</h4>
      <p class="m-0 subtitle"><code>Manajemen</code> Rombongan belajar Sekolah</p>
    </div>
    <div class="card-body">
        <div class="basic-form input-danger-o">
            <form action="/admin/prosesrombel" method="POST">
            @csrf
                <div class="mb-3">
                    <span class="p-2" for="nama">Nama Rombel</span>
                    <input id="nama" name="nama" type="text" class="form-control input-rounded" placeholder="masukan nama rombel">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-danger " >Tambah</button>
                </div>
            </form>
        </div>
        <table data-toggle="table" data-search="true" data-pagination="true" class="mt-4">
            <thead class="bg-primary text-center align-center text-white">
                <tr>
                    <th>ROMBEL</th>
                    <th>KET</th>
                </tr>
            </thead>
            <tbody class="align-items-end">
                @forelse($data as $datas)
                <tr>
                <th>{{ $datas->nama }}</th>
                <th>
                    <a href='../admin/rombel/hapus?data={{ $datas->nama }}' class="badge bg-danger m-1 p-2 text-white">Hapus</a>
                </th>
                </tr>
                @empty
                <tr>
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

@endsection
