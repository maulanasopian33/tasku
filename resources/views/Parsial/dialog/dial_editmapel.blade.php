<!-- MODAL  -->
  <div class="modal fade rounded-0" id="dial_editmapel">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header bg-primary text-white">
                  <h5 class="modal-title">Edit Data Mapel</h5>
                  <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                
                <div class="basic-form input-primary-o">
                    <form id="editM" action="/admin/mapel/edit" method="POST">
                      @csrf
                        <div class="mb-3">
                            <span class="p-2" for="namamapel">Nama Mapel</span>
                            <input type="text" id="idemapel" name="id" hidden>
                            <input id="editnamamapel"  name="nama_mapel" type="text" class="form-control input-rounded" placeholder="masukan nama mapel">
                        </div>
                        <div class="mb-3">
                            <span class="p-2" for="kelas">Kelas</span>
                            <select name="kelas" id="kelas" class="form-control">
                              <option value="null">Pilih kelas</option>
                              
                              @forelse ($kelas as $data)
                                <option value="{{ $data->nama }}">{{ $data->nama }}</option>
                              @empty
                                
                              @endforelse
                            </select>
                        </div>
                        <div class="mb-3">
                            <span class="p-2" for="kelas">Nama Guru</span>
                            <input type="text" id="fsnamaguru" hidden name="nama_guru">
                            <div class="dropdown hierarchy-select" id="namaguru2">
                                <button type="button" class="btn btn-secondary dropdown-toggle" id="example-two-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                <div class="dropdown-menu" aria-labelledby="example-two-button">
                                    <div class="hs-searchbox">
                                        <input type="text" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="hs-menu-inner">
                                        <a class="dropdown-item" data-value="" data-default-selected="" href="#">Pilih Nama Guru</a>

                                        {{-- looping data guru --}}
                                        
                                        @foreach ($guru as $hasil)
                                          <a class="dropdown-item" data-value="{{ $hasil->nama_guru }}" href="#">{{ $hasil->nama_guru }}</a>
                                        @endforeach

                                        {{-- endlooping --}}
                                    </div>
                                </div>
                                <input class="d-none" name="example_two" readonly="readonly" aria-hidden="true" type="text"/>
                            </div>

                        </div>
                        
                    </form>
                </div>
                              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger light"  data-dismiss="modal">Batalkan</button>
                  <button type="submit" form="editM" class="btn btn-primary">Update Mapel</button>
              </div>
          </div>
      </div>
</div>