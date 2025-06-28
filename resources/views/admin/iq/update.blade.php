@foreach ($iq as $item)
    <div class="modal fade" id="editIQ{{ $item->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Test IQ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('testiq.update', ['id' => $item->id]) }}" enctype="multipart/form-data"
                    method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nilai">Nilai</label>
                                    <input type="number" min="0" max="100" minlength="1" maxlength="3"
                                        class="form-control" placeholder="Masukan Nilai" value="{{ $item->nilai }}"
                                        id="nilai" name="nilai" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="catatan">Catatan</label>
                                    <textarea type="text" class="form-control" placeholder="Masukan Catatan" id="catatan" name="catatan" required>{{ $item->catatan }}</textarea>
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
@endforeach
