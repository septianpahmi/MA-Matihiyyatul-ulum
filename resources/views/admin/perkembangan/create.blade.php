<div class="modal fade" id="addPerkembangan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Aspek Perkembangan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('perkembangan.create') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kognitif">Nilai Kognitif</label>
                                <select type="text" class="form-control" id="kognitif" name="kognitif" required>
                                    <option value="" selected disabled>Select Nilai</option>
                                    <option value="BB">BB (Belum Berkembang)</option>
                                    <option value="MB">MB (Mulai Berkembang)</option>
                                    <option value="BSH">BSH (Berkembang Sesuai Harapan)</option>
                                    <option value="BSB">BSB (Berkembang Sangat Baik)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bahasa">Nilai Bahasa</label>
                                <select type="text" class="form-control" id="bahasa" name="bahasa" required>
                                    <option value="" selected disabled>Select Nilai</option>
                                    <option value="BB">BB (Belum Berkembang)</option>
                                    <option value="MB">MB (Mulai Berkembang)</option>
                                    <option value="BSH">BSH (Berkembang Sesuai Harapan)</option>
                                    <option value="BSB">BSB (Berkembang Sangat Baik)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nam">Nilai NAM</label>
                                <select type="text" class="form-control" id="nam" name="nam" required>
                                    <option value="" selected disabled>Select Nilai</option>
                                    <option value="BB">BB (Belum Berkembang)</option>
                                    <option value="MB">MB (Mulai Berkembang)</option>
                                    <option value="BSH">BSH (Berkembang Sesuai Harapan)</option>
                                    <option value="BSB">BSB (Berkembang Sangat Baik)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="motorik">Nilai Motorik</label>
                                <select type="text" class="form-control" id="motorik" name="motorik" required>
                                    <option value="" selected disabled>Select Nilai</option>
                                    <option value="BB">BB (Belum Berkembang)</option>
                                    <option value="MB">MB (Mulai Berkembang)</option>
                                    <option value="BSH">BSH (Berkembang Sesuai Harapan)</option>
                                    <option value="BSB">BSB (Berkembang Sangat Baik)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="seni">Nilai Seni</label>
                                <select type="text" class="form-control" id="seni" name="seni" required>
                                    <option value="" selected disabled>Select Nilai</option>
                                    <option value="BB">BB (Belum Berkembang)</option>
                                    <option value="MB">MB (Mulai Berkembang)</option>
                                    <option value="BSH">BSH (Berkembang Sesuai Harapan)</option>
                                    <option value="BSB">BSB (Berkembang Sangat Baik)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fisik">Nilai Fisik</label>
                                <select type="text" class="form-control" id="fisik" name="fisik" required>
                                    <option value="" selected disabled>Select Nilai</option>
                                    <option value="BB">BB (Belum Berkembang)</option>
                                    <option value="MB">MB (Mulai Berkembang)</option>
                                    <option value="BSH">BSH (Berkembang Sesuai Harapan)</option>
                                    <option value="BSB">BSB (Berkembang Sangat Baik)</option>
                                </select>
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
