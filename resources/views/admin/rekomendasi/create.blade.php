<div class="modal fade" id="addRekomendasi">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Rekomendasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('rekomendasi.create') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="siswa_id">Pilih Siswa</label>
                                <select type="text" class="form-control" id="siswa_id" name="siswa_id" required>
                                    <option value="" selected disabled>Select Siswa</option>
                                    @foreach ($perkembangan as $siswa)
                                        <option value="{{ $siswa->siswa->id }}">
                                            {{ $siswa->siswa->user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="aspek">Pilih Aspek</label>
                                <select type="text" class="form-control" id="aspek" name="aspek" required>
                                    <option value="" selected disabled>Select Aspek</option>
                                    <option value="kognitif">Kognitif</option>
                                    <option value="bahasa">Bahasa</option>
                                    <option value="nam">NAM</option>
                                    <option value="motorik">Motorik</option>
                                    <option value="seni">Seni</option>
                                    <option value="fisik">Fisisk</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="catatan">Catatan</label>
                                <textarea type="text" class="form-control" id="catatan" placeholder="Masukan Catatan" name="catatan" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
