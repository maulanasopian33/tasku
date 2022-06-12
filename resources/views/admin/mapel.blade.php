@extends('Parsial.admin-dashboardbase')

@section('contentdashboard')
<div class="container-fluid">
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Admin</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">manage mata pelajaran</a></li>
        </ol>
    </div>
    <script>
        @if(Session::has('success'))
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

    <h4 class="mb-0">MANANGE MATA PELAJARAN</h4>
    <p class="mt-0 mb-4"><code>Manajemen</code> Data Mapel sesuai kelas</p>
    
    <div class="card rounded-0">
        <div class="card-body">
            <div class="d-md-flex justify-content-between">
                <div class="text-dark mb-4">
                    <h4 class="mb-0">Daftar Mata Pelajaran</h4>
                    <p class="mt-0">Ditampilkan berdasarkan tahun ajaran <span class="text-black-50">2021/2022</span></p>
                </div>
                <div>
                    <button class="btn btn-outline-primary my-1"  data-target="#dial_kelas" data-toggle="modal"> Pilih Kelas</button>
                    <button class="btn btn-success my-1" data-target="#dial_mapel" data-toggle="modal"><i class="fa fa-plus"></i> Tambahkan Mapel</button>
                </div>
            </div>
            @include('Parsial.dialog.dial_mapel')
            @include('Parsial.dialog.dial_editmapel')
            @include('Parsial.dialog.dial_kelas')
            <table data-toggle="table" data-search="true" data-pagination="true" class="mt-4">
                <thead class="bg-primary text-center align-center text-white">
                  <tr>
                    <th>Nama Mapel</th>
                    <th>Kelas</th>
                    <th>Nama Guru</th>
                    <th>Tahun Akademik</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($mapel as $data)
                        <tr>
                            <td>{{ $data->nama_mapel }}</td>
                            <td>{{ $data->kelas }}</td>
                            <td>{{ $data->nama_guru }}</td>
                            <td>{{ $data->tahun_akademik }}</td>
                            <th>
                                <a href='/admin/managemapel/hapus?data={{ $data->nama_mapel }}' class="badge bg-danger m-1 p-2 text-white">Hapus</a>
                                <a href='#' id="edit" class="badge bg-primary p-2 text-white m-1" data-target="#dial_editmapel" data-toggle="modal" data-nama="{{ $data->nama_mapel }}"><i class="fa fa-pencil"></i>Edit Data Guru</a>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</div>
@endsection
@section('contentscript')
<script>
     $(document).ready(function(){
        $('#namaguru').hierarchySelect({
            hierarchy: false,
            width: 'auto',
            
        });
        $('#namaguru2').hierarchySelect({
            hierarchy: false,
            width: 'auto',
            
        });
        $('#skelas').hierarchySelect({
            hierarchy: false,
            width: 'auto',
            
        });
    });
     $("#namaguru .hs-menu-inner a").click(function(){
        var selText = $(this).text();
        $("#fnamaguru").val(selText);
    });
     $("#namaguru2 .hs-menu-inner a").click(function(){
        var sel = $(this).text();
        $("#fsnamaguru").val(sel);
    });

    $("#skelas .hs-menu-inner a").click(function(){
        var hasil = $(this).text();
        $("#pilihkelas").attr('href', '{{env('APP_URL')}}/admin/managemapel/sortbykelas/'+hasil);
    });
     $(document).on("click",'#edit', function () {
        //console.log('a');
        var nama = $(this).data('nama');
        $("#idemapel").val( nama );
        $("#editnamamapel").val( nama );
     // As pointed out in comments, 
     // it is unnecessary to have to manually call the modal.
    });
     
</script>

@endsection

