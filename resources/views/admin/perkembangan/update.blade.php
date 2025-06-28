<div class="modal fade" id="editPerkembangan{{ $item->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Aspek Perkembangan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('perkembangan.update', ['id' => $item->id]) }}" enctype="multipart/form-data"
                method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nilai">Nilai
                                    {{ $item->aspek }}</label>
                                <select class="form-control" name="nilai" required>
                                    <option value="" disabled>Pilih
                                        nilai</option>
                                    <option value="BB" {{ $item->nilai == 'BB' ? 'selected' : '' }}>
                                        BB (Belum Berkembang)</option>
                                    <option value="MB" {{ $item->nilai == 'MB' ? 'selected' : '' }}>
                                        MB (Mulai Berkembang)</option>
                                    <option value="BSH" {{ $item->nilai == 'BSH' ? 'selected' : '' }}>
                                        BSH (Sesuai Harapan)</option>
                                    <option value="BSB" {{ $item->nilai == 'BSB' ? 'selected' : '' }}>
                                        BSB (Sangat Baik)</option>
                                </select>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save
                        changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
