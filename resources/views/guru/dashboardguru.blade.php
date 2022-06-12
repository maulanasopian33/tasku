@extends('Parsial.admin-dashboardbase')

@section('contentdashboard')
<div class="container-fluid p-4 bg-primary  text-white">
	<div class="d-flex flex-column flex-md-row align-items-sm-end align-items-start mb-5" style="height:200px">
		<h3 class="m-2" style="font-size: 3em !important;">Dashboard Guru</h3>
		<button class="btn btn-outline-light m-2 rounded">Mata Pelajaran</button>
		<button class="btn btn-outline-light m-2 rounded">Kelas</button>
	</div>
</div>
<div class="container text-dark content">
	<div class="row">
		<div class="col">
			<div class="card card-hover rounded mx-1 my-2">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<h6 class="flex-grow-1 mr-2">KEHADIRAN</h6>
						<div style="width: 40px; height: 40px;" class="bg-primary d-flex text-white justify-content-center align-items-center rounded flex-grow-0">
							<i class="fa fa-bars"></i>
						</div>
					</div>
					<h1 class="text-center my-4 text-dark font-weight-bold" style="font-size: 4em !important;">20%</h1>
					<h6 class="text-center mt-4">2 Alfa hari ini</h6>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card card-hover rounded mx-1 my-2">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<h6 class="flex-grow-1 mr-2">JUMLAH TUGAS</h6>
						<div style="width: 40px; height: 40px;" class="bg-primary d-flex text-white justify-content-center align-items-center rounded flex-grow-0">
							<i class="fa fa-bars"></i>
						</div>
					</div>
					<h1 class="text-center my-4 text-dark font-weight-bold" style="font-size: 4em !important;">5</h1>
					<h6 class="text-center mt-4">2 Selesai</h6>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card card-hover rounded mx-1 my-2">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<h6 class="flex-grow-1 mr-2">Rata-Rata Nilai</h6>
						<div style="width: 40px; height: 40px;" class="bg-primary d-flex text-white justify-content-center align-items-center rounded flex-grow-0">
							<i class="fa fa-bars"></i>
						</div>
					</div>
					<h1 class="text-center my-4 text-dark font-weight-bold" style="font-size: 4em !important;">70</h1>
					<h6 class="text-center mt-4">Dari Tugas terbaru</h6>
				</div>
			</div>
		</div>
	</div>
	{{-- content bawah --}}
	<div class="row">
		<div class="col">
			<div class="card card-hover p-4 m-2">
				<div class="d-flex">
					<div style="width: 40px; height: 40px;" class="bg-primary d-flex text-white justify-content-center align-items-center rounded flex-grow-0">
						<i class="fa fa-bars"></i>
					</div>
					<h6 class=" mx-4 align-items-center">KEHADIRAN</h6>
				</div>
				<div class=" m-4 bg-primary" style="height: 200px !important;">
					Ini chart
				</div>
				<div class="text-center card-info">
					<div class="row ">
						<div class="col flex-grow-1 d-flex flex-column ">
							<i>L</i>
							<h5>2 siswa</h5>
							<h5 class="px-3 align-self-center badge badge-success">Sakit</h5>
						</div>
						<div class="col flex-grow-1 d-flex flex-column">
							<i>L</i>
							<h5>2 siswa</h5>
							<h5 class="px-3 align-self-center badge badge-warning">Izin</h5>
						</div>
						<div class="col flex-grow-1 d-flex flex-column">
							<i>L</i>
							<h5>2 siswa</h5>
							<h5 class="px-3 align-self-center badge badge-danger">Alfa</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card card-hover p-4 m-2">
				<div class="d-flex">
					<div style="width: 40px; height: 40px;" class="bg-primary d-flex text-white justify-content-center align-items-center rounded flex-grow-0">
						<i class="fa fa-bars"></i>
					</div>
					<h6 class=" mx-4 align-items-center">KEHADIRAN</h6>
				</div>
				<div class=" m-4 bg-primary" style="height: 200px !important;">
					Ini chart
				</div>
				<div class="text-center card-info">
					<div class="row ">
						<div class="col flex-grow-1 d-flex flex-column ">
							<i>L</i>
							<h5>2 siswa</h5>
							<h5 class="px-3 align-self-center badge badge-success">Sakit</h5>
						</div>
						<div class="col flex-grow-1 d-flex flex-column">
							<i>L</i>
							<h5>2 siswa</h5>
							<h5 class="px-3 align-self-center badge badge-warning">Izin</h5>
						</div>
						<div class="col flex-grow-1 d-flex flex-column">
							<i>L</i>
							<h5>2 siswa</h5>
							<h5 class="px-3 align-self-center badge badge-danger">Alfa</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- content bawah end --}}
</div>
@endsection