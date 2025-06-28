<div class="modal fade" id="addIQ">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Test IQ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('testiq.create') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="siswa_id">Pilih Siswa</label>
                                <select type="text" class="form-control" id="siswa_id" name="siswa_id" required>
                                    <option value="" selected disabled>Select Siswa</option>
                                    @foreach ($siswa as $sis)
                                        <option value="{{ $sis->id }}">{{ $sis->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="aspek">Pilih Aspek</label>
                                <select type="text" class="form-control" id="aspek" name="aspek" required>
                                    <option value="" selected disabled>Select Aspek</option>
                                    <option value="Verbal">Verbal</option>
                                    <option value="Memori">Memori</option>
                                    <option value="Visuospatial">Visuospatial</option>
                                    <option value="Penalaran">Penalaran</option>
                                    <option value="Seni">Seni</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nilai">Nilai</label>
                                <input type="number" min="0" max="100" minlength="1" maxlength="3"
                                    class="form-control" placeholder="Masukan Nilai" id="nilai" name="nilai"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="catatan">Catatan</label>
                                <textarea type="text" class="form-control" placeholder="Masukan Catatan" id="catatan" name="catatan" required></textarea>
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
