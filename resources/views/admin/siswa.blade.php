@extends('Parsial.admin-dashboardbase')

@section('contentdashboard')
<div class="container-fluid">
	<div class="row page-titles">
  	<ol class="breadcrumb">
  		<li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
  		<li class="breadcrumb-item active"><a href="javascript:void(0)">Admin</a></li>
  		<li class="breadcrumb-item"><a href="javascript:void(0)">manage guru</a></li>
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
<h4 class="mb-0">MANANGE SISWA</h4>
    <p class="mt-0 mb-4"><code>Manajemen</code> Data Siswa</p>
  <div class="card">
@if($data['status'] === '')
    <div class="card-header d-block">
      <h4 class="mb-0">TAMBAH SISWA</h4>
    </div>
    <div class="card-body">

        <div class="basic-form input-danger-o">
                <form action="/admin/prosessiswa" method="POST">
                  @csrf
                    <div class="mb-3">
                        <span class="p-2" for="nama">Nama Siswa</span>
                        <input id="nama" name="nama" type="text" class="form-control input-rounded" placeholder="masukan nama Siswa">
                    </div>
                    <div class="mb-3">
                        <span class="p-2" for='jk'>Jenis Kelamin</span>
                        <input id="jk" name="jk" type="text" class="form-control input-rounded" placeholder="masukan jenis kelamin (ex:L/P)">
                    </div>
                    <div class="mb-3">
                        <span class="p-2" for="nama">Kelas</span>
                        <input id="kelas" name="kelas" type="text" hidden>
                        <div class="dropdown hierarchy-select w-100" id="listkelas">
                            <button type="button" class="btn btn-secondary dropdown-toggle" id="example-two-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                            <div class="dropdown-menu" aria-labelledby="example-two-button">
                                  <div class="hs-searchbox">
                                      <input type="text" class="form-control" autocomplete="off">
                                  </div>
                                  <div class="hs-menu-inner">
                                      <a class="dropdown-item" data-value="" data-default-selected="" href="#">Pilih Kelas</a>
                                      
                                      {{-- looping data kelas --}}
                                      
                                      @foreach ($kelas as $hasil)
                                        <a class="dropdown-item" data-value="{{ $hasil->nama }}" href="#">{{ $hasil->nama }}</a>
                                      @endforeach

                                      {{-- endlooping --}}
                                </div>
                            </div>
                        </div>
                      <input class="d-none" name="example_two" readonly="readonly" aria-hidden="true" type="text"/>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-danger " >Tambah</button>
                    </div>
                </form>
            </div>
      @else
      <div class="card-header d-block">
      <h4 class="card-title">MANANGE SISWA</h4>
      <p class="m-0 subtitle"><code>Manajemen</code> Data Siswa</p>
    </div>
    <div class="card-body">
        <div class="accordion accordion-primary-solid" id="accordion-two">
  		  <div class="accordion-item">
  			<div class="accordion-header  rounded-lg" id="accord-2One" data-bs-toggle="collapse" data-bs-target="#collapse2One" aria-controls="collapse2One" aria-expanded="true" role="button">
  			  <span class="accordion-header-text">Edit Data Siswa</span>
  			  <span class="accordion-header-indicator"></span>
  			</div>
  			<div id="collapse2One" class="collapse accordion__body show" aria-labelledby="accord-2One" data-bs-parent="#accordion-two">
  			  <div class="accordion-body-text">
  				 <div class="basic-form input-primary-o">
                <form action="/admin/guru/update" method="POST">
                  @csrf
                    <div class="mb-3">
                        <span class="p-2" for="nama">Nama Siswa</span>
                        <input type="hidden" name='id' value="{{ $data['Nama_guru'] }}">
                        <input id="nama" value="{{ $data['Nama_guru'] }}" name="nama" type="text" class="form-control input-rounded" placeholder="masukan nama guru">
                    </div>
                    <div class="mb-3">
                        <span class="p-2" for="nama">Jenis Kelamin</span>
                        <input id="jk" value="{{ $data['Jk'] }}" name="jk" type="text" class="form-control input-rounded" placeholder="masukan jenis kelamin (ex:L/P)">
                    </div>
                    <div class="mb-3">
                        <span class="p-2" for="nama">Jabatan</span>
                        <input id="jabatan" value="{{ $data['Jabatan'] }}" name="jabatan" type="text" class="form-control input-rounded" placeholder="masukan Jabatan (ex:Guru)">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary " >Update</button>
                    </div>
                </form>
            </div>
          </div>
  			</div>
  		  </div>
  	  </div>
      @endif
  	  <div>
  	    {{-- <a href="{{ route('exportguru') }} " class="btn btn-success">Export</a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Import</button> --}}
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Import File</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                      <h5 class="mb-4"><i class="fa fa-paperclip"></i> Letakan File Disini</h5>
                      <form id="upfile" role="form" enctype="multipart/form-data" action="{{ route('importguru') }}" method="POST">
                          {{ csrf_field() }}
                          <input type="file" id="file" name="file"/>
                      </form>
  					</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Batalkan</button>
                        <button type="submit" form="upfile" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </div>
      </div>
  	  </div>
      <table id="example2" data-toggle="table" data-search="true" data-pagination="true" class="mt-4">
        <thead class="bg-primary text-center align-center text-white">
          <tr>
            <th>Nama Siswa</th>
            <th>JK</th>
            <th>Kelas</th>
            <th>Tahun Akademik</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($hasil as $datas)
        <tr>
          <th>{{ $datas["nama_siswa"] }}</th>
         {{--  <th>{{ $datas['jk'] }}</th>
          <th>{{ $datas['kelas'] }}</th>
          <th>{{ $datas['tahun_akademik'] }}</th>
          <th>
            <a href='/admin/siswa/hapus?data={{ $datas["nama_siswa"] }}' class="badge bg-danger m-1">Hapus</a>
            <a href='/admin/siswa/edit?data={{ $datas["nama_siswa"] }}' class="badge bg-primary m-1">Edit Data Guru</a>
            <a href='/admin/siswa/editakun?data={{ $datas["nama_siswa"] }}' class="badge bg-warning m-1" {{ $datas['status'] == 'Buat Data' ? 'hidden' : 'hidden' }}>Edit Akun Guru</a>
            <a id="edit"  data-target="#BuatAkun" data-toggle="modal" data-nama="{{ $datas['nama_siswa'] }}" class="badge bg-success m-1 buatakun" {{ $datas['status'] == 'Buat Data' ? '' : 'hidden' }} >Buat Akun</a>
            <a href='/admin/guru/hapusakun?data={{ $datas["nama_siswa"] }}' class="badge bg-danger m-" {{ $datas['status'] == 'Buat Data' ? 'hidden' : '' }} >Hapus Akun</a>
          </th> --}}
        </tr>
        @endforeach
        </tbody>
      </table>
    	<!-- END CARD -->
    	
    	<!-- MODAL  -->
    	<div class="modal fade" id="BuatAkun">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Buat Akun</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                      
                      <div class="basic-form input-primary-o">
                          <form id="buatA" action="/admin/guru/buatakun" method="POST">
                            @csrf
                              <div class="mb-3">
                                  <span class="p-2" for="nama">Nama Guru</span>
                                  <input id="namadialog"  name="nama" type="text" class="form-control input-rounded" placeholder="masukan nama guru">
                              </div>
                              <div class="mb-3">
                                  <span class="p-2" for="username">username</span>
                                  <input id="username" name="username" type="text" class="form-control input-rounded" placeholder="masukan username">
                              </div>
                              <div class="mb-3">
                                  <span class="p-2" for="email">Email</span>
                                  <input id="email"  name="email" type="email" class="form-control input-rounded" placeholder="masukan Email">
                              </div>
                              <div class="mb-3">
                                  <span class="p-2" for="password">Password</span>
                                  <input id="password"  name="password" type="text" class="form-control input-rounded" placeholder="masukan password">
                              </div>
                              
                          </form>
                      </div>
  									</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Batalkan</button>
                        <button type="submit" form="buatA" class="btn btn-primary">Buat Akun</button>
                    </div>
                </div>
            </div>
      </div>


    </div>
  </div>
</div>

@endsection
@section('contentscript')
  

<script>
    $(document).on("click", "#edit", function () {
     var myBookId = $(this).data('nama');
     $(".modal-body .basic-form #namadialog").val( myBookId );
     // As pointed out in comments, 
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});

    $(document).ready(function(){
        $('#listkelas').hierarchySelect({
            hierarchy: false,
            width: 'auto',
            
        });
    });

    $("#listkelas .hs-menu-inner a").click(function(){
        var hasil = $(this).text();
        $("#kelas").val(hasil);
    });
</script>
@endsection

