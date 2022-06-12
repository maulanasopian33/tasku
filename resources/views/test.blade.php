@extends('Parsial.admin-dashboardbase')

@section('contentdashboard')
<div class="container-fluid p-4 bg-primary  text-white">
	<div class="d-flex flex-column flex-md-row align-items-sm-end align-items-start mb-5" style="height:200px">
		<h3 class="m-2" style="font-size: 3em !important;">Kelola Presensi</h3>
		<button class="btn btn-outline-light m-2 rounded p-2">Mata Pelajaran</button>
		<button class="btn btn-outline-light m-2 rounded p-2">Kelas</button>
	</div>
</div>
<div class="container text-dark content my-4">
	<div class="row">
		<div class="col">
			<div class="card rounded mx-1 my-2">
				<div class="card-body">
					<div class="d-flex text-center align-items-center">
						<h6 class="flex-grow-1 mr-2">Alfa</h6>
						<div style="width: 40px; height: 40px;" class="bg-primary d-flex text-white justify-content-center align-items-center rounded flex-grow-0">
							<i class="fa fa-bars"></i>
						</div>
					</div>
					<h1 class="text-center my-4 text-dark font-weight-bold" style="font-size: 4em !important;">20%</h1>
					<h6 class="text-center mt-4">Dari Keseluruhan</h6>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card rounded mx-1 my-2">
				<div class="card-body">
					<div class="d-flex text-center align-items-center">
						<h6 class="flex-grow-1 mr-2">Izin</h6>
						<div style="width: 40px; height: 40px;" class="bg-primary d-flex text-white justify-content-center align-items-center rounded flex-grow-0">
							<i class="fa fa-bars"></i>
						</div>
					</div>
					<h1 class="text-center my-4 text-dark font-weight-bold" style="font-size: 4em !important;">10%</h1>
					<h6 class="text-center mt-4">Dari keseluruhan</h6>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card rounded mx-1 my-2">
				<div class="card-body">
					<div class="d-flex text-center align-items-center">
						<h6 class="flex-grow-1 mr-2">Sakit</h6>
						<div style="width: 40px; height: 40px;" class="bg-primary d-flex text-white justify-content-center align-items-center rounded flex-grow-0">
							<i class="fa fa-bars"></i>
						</div>
					</div>
					<h1 class="text-center my-4 text-dark font-weight-bold" style="font-size: 4em !important;">5%</h1>
					<h6 class="text-center mt-4">Dari keseluruhan</h6>
				</div>
			</div>
		</div>
	</div>
	{{-- content bawah --}}
	<div class="card m-md-3 m-0">
		<div class="card-body ">
			<h4>Belum di input</h4>
			<div>
				<table data-toggle="table" data-search="true" data-pagination="true">
					<thead class="bg-primary text-white">
						<th>NO</th>
						<th>Nama Siswa</th>
						<th>Mata Pelajaran</th>
						<th>Kelas</th>
						<th>Aksi</th>
					</thead>
					<tbody>
						<tr>
							<td>Text</td>
							<td>Text1</td>
							<td>Text</td>
							<td>Text</td>
							<td><button class="btn btn-primary rounded text-white">Presensi</button></td>
						</tr>
						<tr>
							<td>Text</td>
							<td>Text</td>
							<td>Text</td>
							<td>Text</td>
							<td><button class="btn btn-primary rounded text-white">Presensi</button></td>
						</tr>
						<tr>
							<td>dsada</td>
							<td>Text</td>
							<td>Text</td>
							<td>Text</td>
							<td><button class="btn btn-primary rounded text-white">Presensi</button></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="card m-md-3 m-0">
		<div class="card-body ">
			<div class="d-flex">
				<h4>Daftar Presensi</h4>
				<button class="btn btn-outline-primary ml-4" onclick="loadDoc()"> Pilih Tanggal</button>	
			</div>
			
			<div class="">
				<table data-toggle="table" data-search="true" data-pagination="true">
					<thead class="bg-primary text-white">
						<th>NO</th>
						<th>Nama Siswa</th>
						<th>Mata Pelajaran</th>
						<th>Kelas</th>
						<th>Aksi</th>
					</thead>
					<tbody>
						<tr>
							<td>Text</td>
							<td>Text1</td>
							<td>Text</td>
							<td>Text</td>
							<td>Text</td>
						</tr>
						<tr>
							<td>Text</td>
							<td>Text</td>
							<td>Text</td>
							<td>Text</td>
							<td>Text</td>
						</tr>
						<tr>
							<td>Text</td>
							<td>Text</td>
							<td>Text</td>
							<td>Text</td>
							<td>Text</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	{{-- content bawah end --}}
	<div id="demo"></div>
</div>
@endsection
@section('contentscript')
<script>
	// Fungsi ini untuk mengambil data dari API sehingga
	// nantinya tabel presensi bisa WPA tanpa reaload
	function loadDoc() {
		fetch('{{ env("url") }}')
		// fetch('https://mocki.io/v1/b34ef43c-60dd-4200-83fc-cacaec4573cc')
			.then(res => res.json())
			.then(json => load(json))
	   
	}

	function load(h){
		console.log(h);
		alert('berhasil');
	    document.getElementById("demo").innerHTML = h.respon;
	}
	
</script>
@endsection