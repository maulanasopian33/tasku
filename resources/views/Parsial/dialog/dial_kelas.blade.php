<!-- dialog tahun akademik  -->
  <div class="modal fade rounded-0" id="dial_kelas">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header bg-primary text-white">
                  <h5 class="modal-title">Pilih Kelas</h5>
                  <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="dropdown hierarchy-select w-100" id="skelas">
                      <button type="button" class="btn btn-secondary dropdown-toggle" id="example-two-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                      <div class="dropdown-menu" aria-labelledby="example-two-button">
                          <div class="hs-searchbox">
                              <input type="text" class="form-control" autocomplete="off">
                          </div>
                          <div class="hs-menu-inner">
                              <a class="dropdown-item" data-value="" data-default-selected="" href="#">Pilih Kelas</a>
                              <a class="dropdown-item" data-value="Tampilkan semua" href="#">Tampilkan semua</a>
                              
                              {{-- looping data kelas --}}
                              
                              @foreach ($kelas as $hasil)
                                <a class="dropdown-item" data-value="{{ $hasil->nama }}" href="#">{{ $hasil->nama }}</a>
                              @endforeach

                              {{-- endlooping --}}
                          </div>
                      </div>
                      <input class="d-none" name="example_two" readonly="readonly" aria-hidden="true" type="text"/>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger light"  data-dismiss="modal">Batalkan</button>
                  <a href="#" id="pilihkelas" class="btn btn-primary">Pilih Kelas</a>
              </div>
          </div>
      </div>
</div>