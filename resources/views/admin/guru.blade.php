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
    </script>
    <h4 class="mb-0">MANANGE GURU</h4>
    <p class="mt-0 mb-4"><code>Manajemen</code> Data Guru</p>
      <div class="card rounded-0">
          @if($data['status'] === '')
            <div class="card-header">
                <h6 class="card-title">Tambahkan Data Guru</h6>
            </div>
            <div class="card-body">
                <div class="basic-form input-danger-o">
                    <form action="/admin/prosesguru" method="POST">
                      @csrf
                        <div class="mb-3">
                            <span class="p-2" for="nama">Nama Guru</span>
                            <input id="nama"  name="nama" type="text" class="form-control input-rounded" placeholder="masukan nama guru">
                        </div>
                        <div class="mb-3">
                            <span class="p-2" for="nama">Jenis Kelamin</span>
                            <input id="jk" name="jk" type="text" class="form-control input-rounded" placeholder="masukan jenis kelamin (ex:L/P)">
                        </div>
                        <div class="mb-3">
                            <span class="p-2" for="nama">Jabatan</span>
                            <input id="jabatan" name="jabatan" type="text" class="form-control input-rounded" placeholder="masukan Jabatan (ex:Guru)">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-danger  w-50 m-2"{{--  {{ $tahun == 'null' ? 'disabled' : '' }} --}}>Tambah</button>
                            <a href="{{ route('exportguru') }} " class="btn btn-success m-2">Export</a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#importmodal">Import</button>
                        </div>
{{--                         @if($tahun === 'null')
                            <div  class="alert alert-danger"> <i class="fa fa-error"></i> Silahkan mengatur tahun akademik sebelum menambahkan Data</div>
                        @endif --}}
                    </form>
                </div>
          @else
            <div class="card-header">
                <h6 class="card-title">Edit Data Guru</h6>
            </div>
            <div class="card-body">
                <div class="basic-form input-primary-o">
                    <form action="/admin/guru/update" method="POST">
                      @csrf
                        <div class="mb-3">
                            <span class="p-2" for="nama">Nama Guru</span>
                            <input type="hidden" name='id' value="{{ $data['nama_guru'] }}">
                            <input type="hidden" name='akun' value="{{ $akun }}">
                            <input id="nama" value="{{ $data['nama_guru'] }}" name="nama" type="text" class="form-control input-rounded" placeholder="masukan nama guru">
                        </div>
                        <div class="mb-3">
                            <span class="p-2" for="nama">Jenis Kelamin</span>
                            <input id="jk" value="{{ $data['jk'] }}" name="jk" type="text" class="form-control input-rounded" placeholder="masukan jenis kelamin (ex:L/P)">
                        </div>
                        <div class="mb-3">
                            <span class="p-2" for="nama">Jabatan</span>
                            <input id="jabatan" value="{{ $data['jabatan'] }}" name="jabatan" type="text" class="form-control input-rounded" placeholder="masukan Jabatan (ex:Guru)">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-50 m-2" >Update</button>
                            <a href="{{ route('exportguru') }} " class="btn btn-success m-2">Export</a>
                            <!-- Button trigger modal -->
                            <button id="import" type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#importmodal">Import</button>
                        </div>
                    </form>
                </div>
          @endif
          <div>
            <div class="modal fade" id="importmodal">
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
          <table data-toggle="table" data-search="true" data-pagination="true" class="mt-4">
            <thead class="bg-danger text-center align-center text-white">
              <tr>
                <th>Nama Guru</th>
                <th>JK</th>
                <th>Jabatan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              
              @forelse($hasil as $datas)
            <tr>
              <th>{{ $datas['Nama_guru'] }}</th>
              <th>{{ $datas['Jk'] }}</th>
              <th>{{ $datas['Jabatan'] }}</th>
              <th>
                <a href='/admin/guru/hapus?data={{ $datas["Nama_guru"] }}' class="badge bg-danger m-1 p-2 text-white">Hapus</a>
                <a href='/admin/guru/edit?data={{ $datas["Nama_guru"] }}' class="badge bg-primary p-2 text-white m-1">Edit Data Guru</a>
                <a href='/admin/guru/editakun?data={{ $datas["Nama_guru"] }}' class="badge bg-warning m-1 p-2 text-white" {{ $datas['status'] == 'Buat Data' ? 'hidden' : '' }}>Edit Akun Guru</a>
                <a id="edit"  data-target="#BuatAkun" data-toggle="modal" data-nama="{{ $datas['Nama_guru'] }}" class="badge bg-success m-1 buatakun p-2 text-white" {{ $datas['status'] == 'Buat Data' ? '' : 'hidden' }} >Buat Akun</a>
                <a href='/admin/guru/hapusakun?data={{ $datas["Nama_guru"] }}' class="badge bg-danger m-1 p-2 text-white" {{ $datas['status'] == 'Buat Data' ? 'hidden' : '' }} >Hapus Akun</a>
              </th>
            </tr>
            @empty
            <tr>
              <th>Data Kosong</th>
              <th>Data Kosong</th>
              <th>Data Kosong</th>
              <th>Data Kosong</th>
            </tr>
            @endforelse
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
     $(document).on("click",'#edit', function () {
        console.log('a');
     var nama = $(this).data('nama');
     $(".modal-body .basic-form #namadialog").val( nama );
     // As pointed out in comments, 
     // it is unnecessary to have to manually call the modal.
    });
     // $(document).on("click",'#import', function () {
     //    $('#exampleModalCenter').modal('show');
     // });
</script>

@endsection

